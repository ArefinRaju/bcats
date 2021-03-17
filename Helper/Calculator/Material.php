<?php


namespace Helper\Calculator;


use App\Models\MaterialHistory;
use Helper\Repo\MaterialHistoryRepository;
use Helper\Transform\Objects;
use Illuminate\Http\Request;

final class Material implements Calculator
{
    private Request                   $request;
    private MaterialHistoryRepository $repo;
    private MaterialHistory           $oldRecord;
    private int                       $amount;
    public int                        $payee_id;
    public int                        $user_id;
    public int                        $material_id;
    public int                        $total;
    public int                        $required;
    public int                        $credit;
    public int                        $debit;
    public string                     $comment;
    public int                        $project_id;

    final private function __construct(Request $request)
    {
        $this->request    = $request;
        $this->repo       = new MaterialHistoryRepository();
        $this->user_id    = $request->user()->id;
        $this->project_id = $request->user()->project_id;
        $this->oldRecord  = $this->getLastRecord();
        return $this;
    }

    private function getLastRecord()
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
            $materialHistory->comment     = $this->comment ?? '';
            $materialHistory->project_id  = $this->project_id;
            $lastRecord                   = $this->repo->save($materialHistory);
        }
        return $lastRecord;
    }

    public static function credit(Request $request, int $materialId, int $amount, int $payeeId, string $comment = ''): Material
    {
        $instance              = new Material($request);
        $instance->material_id = $materialId;
        $instance->amount      = $amount;
        $instance->credit      = $instance->amount;
        $instance->payee_id    = $payeeId;
        $instance->comment     = $comment;
        $instance->total       = $instance->oldRecord->total + $instance->credit;
        $instance->required    = $instance->negativeChecker($instance->oldRecord->required - $instance->amount);
        $instance->assignAndSave($instance);
        return $instance;
    }

    public static function debit(Request $request, int $materialId, int $amount, string $comment = ''): Material
    {
        $instance              = new Material($request);
        $instance->material_id = $materialId;
        $instance->amount      = $amount;
        $instance->debit       = $instance->amount;
        $instance->comment     = $comment;
        $instance->total       = $instance->oldRecord->total - $instance->debit;
        $instance->required    = $instance->oldRecord->required;
        $instance->assignAndSave($instance);
        return $instance;
    }

    public static function demand(Request $request, int $materialId, int $amount, string $comment = ''): Material
    {
        $instance              = new Material($request);
        $instance->material_id = $materialId;
        $instance->amount      = $amount;
        $instance->comment     = $comment;
        $instance->total       = $instance->oldRecord->total;
        $instance->required    = $instance->amount;
        $instance->assignAndSave($instance);
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

    private function negativeChecker(int $amount): int
    {
        if ($amount < 0) {
            return 0;
        }
        return $amount;
    }
}