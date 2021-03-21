<?php


namespace App\Http\Controllers;

use App\Models\MaterialHistory;
use Helper\Calculator\Material;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\MaterialRepository;
use Helper\Repo\MaterialHistoryRepository;
use Illuminate\Http\Request;

class MaterialHistoryController extends HelperController
{
    protected array                   $commonValidationRules;
    private MaterialHistoryRepository $repo;
    private MaterialRepository        $materialRepo;

    public function __construct(MaterialHistoryRepository $repo, MaterialRepository $materialRepo)
    {
        $this->repo         = $repo;
        $this->materialRepo = $materialRepo;
        $this->setResource(MaterialHistory::class);
        $this->commonValidationRules = [
            'credit' => [V::SOMETIMES, V::REQUIRED, V::NUMBER],
            'debit'  => [V::SOMETIMES, V::REQUIRED, V::NUMBER]
        ];
    }

    public function creditForm(Request $request)
    {
        $materials = $this->materialRepo->materialList($request);
        return view('admin.pages.material_history.credit.create', compact('materials'));
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
        return $this->respond($log, [], '');
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
        return $this->respond($log, [], '');
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
        return $this->respond($log, [], '');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function stock(Request $request)
    {
        $stockList = [];
        $materials = $this->materialRepo->materialList($request);
        foreach ($materials as $material) {
            $log              = $this->repo->getLatestById($request, $material->id);
            $item             = [];
            $item['id']       = $material->id;
            $item['name']     = $material->name;
            $item['enum']     = $material->enum;
            $item['total']    = $log->total;
            $item['credit']   = $log->credit;
            $item['debit']    = $log->debit;
            $item['required'] = $log->required;
            $stockList[]      = $item;
        }
        return $this->respond($stockList, [], '');
    }

    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $materials  = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($materials, [], 'admin.pages.emi.index');
    }
}
