<?php


namespace App\Http\Controllers;

use App\Models\MaterialHistory;
use Helper\Calculator\Material;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\MaterialHistoryRepository;
use Helper\Repo\MaterialRepository;
use Helper\Repo\PayeeRepository;
use Helper\Repo\UserRepository;
use Helper\Transform\Arrays;
use Illuminate\Http\Request;

class MaterialHistoryController extends HelperController
{
    protected array                   $commonValidationRules;
    private MaterialHistoryRepository $repo;
    private MaterialRepository        $materialRepo;
    private UserRepository            $userRepo;
    private PayeeRepository           $payeeRepo;

    public function __construct(MaterialHistoryRepository $repo, MaterialRepository $materialRepo, UserRepository $userRepo, PayeeRepository $payeeRepo)
    {
        $this->repo         = $repo;
        $this->materialRepo = $materialRepo;
        $this->userRepo     = $userRepo;
        $this->payeeRepo    = $payeeRepo;
        $this->setResource(MaterialHistory::class);
        $this->commonValidationRules = [
            'credit' => [V::SOMETIMES, V::REQUIRED, V::NUMBER],
            'debit'  => [V::SOMETIMES, V::REQUIRED, V::NUMBER]
        ];
    }

    public function creditForm(Request $request)
    {
        $materials = $this->materialRepo->materialList($request);
        $payees    = $this->payeeRepo->supplierList();
        return view('admin.pages.material_history.credit.create', compact('materials', 'payees'));
    }

    public function debitForm(Request $request)
    {
        $materials = $this->materialRepo->materialList($request);
        return view('admin.pages.material_history.debit.create', compact('materials'));
    }

    public function demandForm(Request $request)
    {
        $materials = $this->materialRepo->materialList($request);
        return view('admin.pages.material_history.demand.create', compact('materials'));
    }

    public function stockForm(Request $request)
    {
        $materials = $this->materialRepo->materialList($request);
        return view('admin.pages.material_history.stock.create', compact('materials'));
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */

    public function credit(Request $request)
    {
        $rules = [
            'materialId' => [V::REQUIRED, V::NUMBER],
            'amount'     => [V::REQUIRED, V::NUMBER],
            'payeeId'    => [V::REQUIRED, V::NUMBER],
        ];
        $this->validate($request, $rules);
        $log = Material::credit($request, $request->input('materialId'), $request->input('amount'), $request->input('payeeId'));
        if (!$this->isAPI()) {
            $pagination = $this->paginationManager($request);
            $log        = $this->repo->list($pagination->per_page, $pagination->page);
        }
        return $this->respond($log, [], 'admin.pages.material_history.credit.index');
    }
 /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function creditList(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $creditList  = $this->repo->creditList($pagination->per_page, $pagination->page);
        return $this->respond($creditList, [], 'admin.pages.material_history.credit.index');
    }
    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function debit(Request $request)
    {
        $rules = [
            'materialId' => [V::REQUIRED, V::NUMBER],
            'amount'     => [V::REQUIRED, V::NUMBER]
        ];
        $this->validate($request, $rules);
        $log = Material::debit($request, $request->input('materialId'), $request->input('amount'));
        if (!$this->isAPI()) {
            $pagination = $this->paginationManager($request);
            $log        = $this->repo->debitList($pagination->per_page, $pagination->page);
        }
        return $this->respond($log, [], 'admin.pages.material_history.debit.index');
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function debitList(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $debitList  = $this->repo->debitList($pagination->per_page, $pagination->page);
        return $this->respond($debitList, [], 'admin.pages.material_history.debit.index');
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function demand(Request $request)
    {
        $rules = [
            'materialId' => [V::REQUIRED, V::NUMBER],
            'amount'     => [V::REQUIRED, V::NUMBER]
        ];
        $this->validate($request, $rules);
        $log = Material::demand($request, $request->input('materialId'), $request->input('amount'));
        if (!self::isAPI()) {
            $log = $this->getStockList($request);
        }
        return $this->respond($log, [], 'admin.pages.material_history.demand.index');
    }

    public function demandList(Request $request)
    {
        $log = $this->getStockList($request);
        return $this->respond($log, [], 'admin.pages.material_history.demand.index');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function stock(Request $request)
    {
        $stockList = $this->getStockList($request);
        return $this->respond($stockList, [], 'admin.pages.material.current_stock');
    }

    private function getStockList(Request $request): array
    {
        $stockList = [];
        $materials = $this->materialRepo->materialList($request);
        foreach ($materials as $material) {
            $log = $this->repo->getLatestById($request, $material->id);
            if (empty($log)) {
                continue;
            }
            $item             = [];
            $item['id']       = $material->id;
            $item['name']     = $material->name;
            $item['enum']     = $material->enum;
            $item['total']    = $log->total;
            $item['credit']   = $log->credit;
            $item['debit']    = $log->debit;
            $item['required'] = $log->required;
            $item['used']     = $log->used;
            $stockList[]      = Arrays::toObject($item);
        }
        return $stockList;
    }

    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $materials  = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($materials, [], 'admin.pages.material_history.credit.index');
    }
}
