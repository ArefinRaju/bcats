<?php

namespace Helper\Calculator;

use App\Models\Material as Model;
use App\Models\MaterialHistory;
use Helper\Constants\Errors;
use Helper\Constants\ResponseType;
use Helper\Core\UserFriendlyException;
use Helper\Repo\CategoryRepository;
use Helper\Repo\InvoiceRepository;
use Helper\Repo\MaterialHistoryRepository;
use Helper\Repo\MaterialRepository;
use Helper\Repo\PayeeRepository;
use Helper\Transform\Objects;
use Illuminate\Http\Request;

/**
 * @property int invoice_id
 * @property mixed category_id
 * @property string category_name // commit
 */
final class Material implements Calculator
{
    private Request                   $request;
    private MaterialHistoryRepository $repo;
    private MaterialHistory           $oldRecord;
    private int                       $amount;
    public int                        $payee_id;
    public string                     $payee_name;
    public int                        $user_id;
    public string                     $user_name;
    public int                        $material_id;
    public string                     $material_name;
    private Model                     $material;
    public int                        $total;
    public int                        $required;
    public int                        $credit;
    public int                        $debit;
    public int                        $used;
    public string                     $comment;
    public int                        $project_id;

    /**
     * @throws UserFriendlyException
     */
    final private function __construct(Request $request, int $materialId)
    {
        if (empty($request->user()->project_id)) {
            throw new UserFriendlyException(Errors::FORBIDDEN, ResponseType::BAD_REQUEST);
        }
        $this->request       = $request;
        $this->material_id   = $materialId;
        $this->material      = $this->getMaterial($request, $materialId);
        $this->material_name = $this->material->name;
        $this->repo          = new MaterialHistoryRepository();
        $this->user_id       = $request->user()->id;
        $this->user_name     = $request->user()->name;
        $this->project_id    = $request->user()->project_id;
        $this->oldRecord     = $this->getLastRecord();
        return $this;
    }

    private function getLastRecord(): MaterialHistory
    {
        $lastRecord = $this->repo->getLastRecord($this->request, $this->material_id, $this->project_id);
        if (empty($lastRecord)) {
            $materialHistory              = new MaterialHistory();
            $materialHistory->payee_id    = $this->payee_id ?? null;
            $materialHistory->user_id     = $this->user_id;
            $materialHistory->material_id = $this->material_id ?? null;
            $materialHistory->total       = 0;
            $materialHistory->required    = 0;
            $materialHistory->credit      = 0;
            $materialHistory->debit       = 0;
            $materialHistory->used        = 0;
            $materialHistory->comment     = $this->comment ?? '';
            $materialHistory->project_id  = $this->project_id;
            $this->repo->save($materialHistory);
            return $materialHistory;
        }
        return $lastRecord;
    }

    /**
     * @throws UserFriendlyException
     */
    public static function credit(Request $request, int $payeeId, int $materialId, int $quantity): Material
    {
        $invoice              = (new InvoiceRepository())->create($request);
        $instance             = new Material($request, $materialId);
        $instance->invoice_id = $invoice->id;
        $instance->amount     = $quantity;
        $instance->credit     = $instance->amount;
        $instance->payee_id   = $payeeId;
        $instance->payee_name = $instance->getPayee($request, $payeeId)->name;
        $instance->comment    = $request->input('comment') ?? '';
        $instance->total      = $instance->oldRecord->total + $instance->credit;
        $instance->required   = $instance->negativeChecker($instance->oldRecord->required - $instance->amount);
        Account::payPayee($request, $request->input('paidAmount'), $instance->payee_id, $instance->comment, $invoice->id);
        $instance->assignAndSave($instance);
        $instance->assignCategory($request, $instance);
        return $instance;
    }

    /**
     * @throws UserFriendlyException
     */
    public static function debit(Request $request, int $materialId, int $quantity, string $comment = ''): Material
    {
        $instance           = new Material($request, $materialId);
        $instance->amount   = $quantity;
        $instance->debit    = $instance->amount;
        $instance->comment  = $comment;
        $instance->total    = $instance->oldRecord->total - $instance->debit;
        $instance->used     = $instance->oldRecord->used + $instance->debit;
        $instance->required = $instance->oldRecord->required;
        $instance->assignAndSave($instance);
        $instance->assignCategory($request, $instance);
        return $instance;
    }

    /**
     * @throws UserFriendlyException
     */
    public static function demand(Request $request, int $materialId, int $quantity, string $comment = ''): Material
    {
        $instance           = new Material($request, $materialId);
        $instance->amount   = $quantity;
        $instance->comment  = $comment;
        $instance->total    = $instance->oldRecord->total;
        $instance->required = $instance->amount;
        $instance->assignAndSave($instance);
        $instance->assignCategory($request, $instance);
        return $instance;
    }

    private function assignAndSave(Material $instance): void
    {
        $MaterialHistory = new MaterialHistory();
        foreach (Objects::toArray($instance) as $key => $value) {
            $MaterialHistory->{$key} = $value;
        }
        $instance->repo->save($MaterialHistory);
    }

    private function getPayee(Request $request, int $id)
    {
        $payeeRepo = new PayeeRepository();
        return $payeeRepo->getById($request, $id);
    }

    private function getMaterial(Request $request, int $id)
    {
        $material = new MaterialRepository();
        return $material->getById($request, $id);
    }

    private function negativeChecker(int $quantity): int
    {
        if ($quantity < 0) {
            return 0;
        }
        return $quantity;
    }

    public function toArray(): array
    {
        return Objects::toArray($this);
    }

    private function assignCategory(Request $request, Material $instance): void
    {
        $instance->category_id   = $instance->material->category_id;
        $materialCategory        = (new CategoryRepository())->getById($request, $instance->category_id);
        $instance->category_name = $materialCategory->name;
    }
}