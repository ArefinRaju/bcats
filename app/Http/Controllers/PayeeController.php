<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use App\Models\Payee;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Errors;
use Helper\Constants\Messages;
use Helper\Constants\PayeeType;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\AccountRepository;
use Helper\Repo\PayeeRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PayeeController extends HelperController
{
    protected array         $commonValidationRules;
    private PayeeRepository $repo;

    public function __construct(PayeeRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(Payee::class);
        $this->commonValidationRules = [
            'name'    => [V::REQUIRED, V::TEXT],
            'address' => [V::REQUIRED, V::TEXT],
            'mobile'  => [V::REQUIRED, ...V::PHONE],
            'type'    => [V::REQUIRED, Rule::in(PayeeType::values())],
        ];
    }

    public function validation(): array
    {
        $rules = $this->commonValidationRules;
        unset($rules['type'][1]);
        $rules['type'] = [
            'rules' => $rules['type'],
            'types' => PayeeType::values()
        ];
        return $rules;
    }

    public function constants()
    {
        return $this->respond(['type' => PayeeType::values()]);
    }

    public function createForm()
    {
        $data = [
            'payeeType' => PayeeType::toArray()
        ];
        return view('admin.pages.payee.create', $data);
    }

    public function editForm(Request $request, int $id)
    {
        $payee = $this->repo->getById($request, $id);
        return view('admin.pages.payee.edit', compact('payee'));
    }

    public function create(Request $request, string $action = null)
    {
        if ($this->repo->isExist($request)) {
            return $this->respond([], [Errors::DATA_EXIST], '', ResponseType::UNPROCESSABLE_ENTITY);
        }
        $payee             = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new Payee());
        $payee->project_id = $request->user()->project_id;
        $this->repo->save($payee);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $payees     = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.payee.index')->with('data', $payees);
        }
        return $this->respond($payee, [], 'admin.pages.payee.suppliersList');
    }

    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $payees     = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($payees, [], 'admin.pages.payee.index');
    }

    public function update(Request $request, string $id = null)
    {
        $payee = $this->repo->getById($request, $id);
        $payee = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, $payee, ['paid', 'due']);
        $this->repo->save($payee);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $payees     = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.payee.suppliersList')->with('data', $payees);
        }
        return $this->respond($payee, []);
    }

    public function destroy(Request $request, string $id)
    {
        $this->repo->destroyById($id);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $payees     = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.payee.index')->with('data', $payees);
        }
        return $this->respond(null, [], 'admin.pages.payee.suppliersList', Messages::DESTROYED, ResponseType::NO_CONTENT);
    }

    public function viewSupplier(Request $request, int $id)
    {
        $categories      = Category::all();
        $supplierRecords = $this->repo->getSupplier($request, $id);
        $supplier        = $supplierRecords[0] ?? null;
        if (empty($supplier)) {
            if (!$this->isAPI()) {
                return back()->withErrors([Errors::RESOURCE_NOT_FOUND]);
            }
            return $this->respond([], [Errors::RESOURCE_NOT_FOUND]);
        }
        $invoiceCount     = $supplierRecords->count();
        $transactionCount = $this->accountRepo()->getAccountCountByPayee($request, $id);
        return $this->respond(compact('categories', 'supplier', 'invoiceCount', 'transactionCount'), [], 'admin.pages.profile.payee');
    }

    public function viewMember(Request $request, int $id)
    {
        return view('admin.pages.profile.member');
    }

    private function accountRepo(): AccountRepository
    {
        return new AccountRepository();
    }

    public function supplierSearch(Request $request)
    {
        $projectId = $request->user()->project_id;
        return view('admin.pages.payee.supplier_search', compact('projectId'));
    }

    public function memberSearch(Request $request)
    {
        $projectId = $request->user()->project_id;
        return view('admin.pages.payee.member_search', compact('projectId'));
    }

    public function member()
    {
        $categories = Category::all();
        return view('admin.pages.profile.member', compact('categories'));
    }

    public function fetchSubCategory($id): array
    {
        $subCategory = Material::where('category_id', $id)->get();
        return ['subCategory' => $subCategory,];
    }

    /**
     * @throws UserFriendlyException
     */
    public function search(Request $request)
    {
        $rules = [
            'query'      => [V::REQUIRED, V::TEXT],
            'project_id' => [V::REQUIRED, V::NUMBER]
        ];
        $this->validate($request, $rules);
        $result = $this->repo->searchSupplier($request);
        return $this->respond($result->toArray(), [], '');
    }

    /**~
     * @throws UserFriendlyException
     */
    public function listByType(Request $request, string $payeeType = null)
    {
        if(isset($payeeType)){
        if (!PayeeType::search(strtoupper($payeeType))) {
            throw new UserFriendlyException(Errors::VALIDATION_FAILED, ResponseType::UNPROCESSABLE_ENTITY);
            }
        }
        $data = $this->repo->getByType($request, $payeeType);
        return $this->respond($data, [], 'admin.pages.payee.suppliersList');
    }

}
