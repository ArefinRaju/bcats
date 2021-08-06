<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MaterialHistory;
use Helper\Calculator\Material;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\CategoryRepository;
use Helper\Repo\MaterialHistoryRepository;
use Helper\Repo\MaterialRepository;
use Helper\Repo\PayeeRepository;
use Helper\Transform\Arrays;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MaterialHistoryController extends HelperController
{
    protected array                   $commonValidationRules;
    private MaterialHistoryRepository $repo;
    private MaterialRepository        $materialRepo;
    private PayeeRepository           $payeeRepo;

    public function __construct(MaterialHistoryRepository $repo, MaterialRepository $materialRepo, PayeeRepository $payeeRepo)
    {
        $this->repo         = $repo;
        $this->materialRepo = $materialRepo;
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
        $categories      = Category::all();
//        $materials = $this->materialRepo->materialList($request);
        return view('admin.pages.material_history.debit.create', compact('categories'));
    }

    public function demandForm(Request $request)
    {
        $categoryRepo=new CategoryRepository();
        $category=$categoryRepo->list();
        return $this->respond($category,[],'admin.pages.material_history.demand.create');
    }

    public function stockForm(Request $request)
    {
        $materials = $this->materialRepo->materialList($request);
        return view('admin.pages.material_history.stock.create', compact('materials'));
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View|JsonResponse
     * @throws UserFriendlyException
     */

    public function credit(Request $request)
    {
        $rules = [
            'materialId' => [V::REQUIRED, V::NUMBER],
            'quantity'   => [V::REQUIRED, V::NUMBER],
            'amount'     => [V::REQUIRED, V::NUMBER],
            'paidAmount' => [V::REQUIRED, V::NUMBER],
            'payeeId'    => [V::REQUIRED, V::NUMBER],
            'comment'    => [V::SOMETIMES],
            'image'      => [V::SOMETIMES, 'mimes:jpg,bmp,png']
        ];
        $this->validate($request, $rules);
        $log = Material::credit($request, $request->input('payeeId'), $request->input('materialId'), $request->input('quantity'));
        if (!$this->isAPI()) {
            $pagination = $this->paginationManager($request);
            $log        = $this->repo->list($pagination->per_page, $pagination->page);
        }

        return $this->respond($log, [], 'admin.pages.material_history.credit.index');
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View|JsonResponse
     * @throws UserFriendlyException
     */
    public function creditList(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $creditList = $this->repo->creditList($pagination->per_page, $pagination->page);
        return $this->respond($creditList, [], 'admin.pages.material_history.credit.index');
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View|JsonResponse
     * @throws UserFriendlyException
     */
    public function debit(Request $request)
    {
        $rules = [
            'materialId' => [V::REQUIRED, V::NUMBER],
            'quantity'   => [V::REQUIRED, V::NUMBER]
        ];
        $this->validate($request, $rules);
        $log = Material::debit($request, $request->input('materialId'), $request->input('quantity'));
        if (!$this->isAPI()) {
            $pagination = $this->paginationManager($request);
            $log        = $this->repo->debitList($pagination->per_page, $pagination->page);
        }
        return $this->respond($log, [], 'admin.pages.material_history.debit.index');
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View|JsonResponse
     * @throws UserFriendlyException
     */
    public function debitList(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $debitList  = $this->repo->debitList($pagination->per_page, $pagination->page);
        dd($debitList);
        return $this->respond($debitList, [], 'admin.pages.material_history.debit.index');
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View|JsonResponse
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
     * @return Application|Factory|View|JsonResponse
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
            $item              = [];
            $item['id']        = $material->id;
            $item['name']      = $material->name;
            $item['enum']      = $material->enum;
            $item['total']     = $log->total;
            $item['required']  = $log->required;
            $item['used']      = $log->used;
            $item['user_name'] = $log->user_name;
            $item['comment']   = $log->comment;
            $stockList[]       = Arrays::toObject($item);
        }
        return $stockList;
    }

    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $materials  = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($materials, [], 'admin.pages.material_history.credit.index');
    }

    /**
     * @throws UserFriendlyException
     */
    public function usedMaterials(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $materials  = $this->repo->materialsListWithCategory($pagination->per_page, $pagination->page);

        return $this->respond($materials, [], 'admin.pages.material.use_material');
    }
}
