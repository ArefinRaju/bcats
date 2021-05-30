<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use App\Models\Payee;
use Auth;
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
        return $this->respond($payee, [], 'admin.pages.payee.index');
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
            return view('admin.pages.payee.index')->with('data', $payees);
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
        return $this->respond(null, [], 'admin.pages.payees.index', Messages::DESTROYED, ResponseType::NO_CONTENT);
    }

    public function viewSupplier(Request $request, int $id)
    {
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
        return $this->respond(compact('supplier', 'invoiceCount', 'transactionCount'), [], 'admin.pages.profile.payee');
    }

    private function accountRepo(): AccountRepository
    {
        return new AccountRepository();
    }

    public function supplierSearch()
    {
        $categories = Category::all();
        return view('admin.pages.payee.payee_search', compact('categories'));
       
    }
    public function supplierSearchList($query)
    {
        return Payee::where('name', 'like', '%'.$query.'%')
        ->orWhere('mobile', 'like', '%'.$query.'%')
        ->where('type', PayeeType::SUPPLIER)
        ->where('project_id', Auth::user()->project_id)
        ->get();
       
    }
    public function memberD()
    {
        $categories = Category::all();
        return view('admin.pages.profile.member', compact('categories'));
    }

    public function fetch_sub_category_product_info($id)
    {
        $subCategory = Material::where('category_id', $id)->get();
        // if (count($subCategory) > 0) {
        //     $subCategory = [];
        // } else {
        //     $subCategory =$subCategory;
        // }

        $data = [

            'subCategory' => $subCategory,

        ];

        return $data;
    }

    /**
     * @throws UserFriendlyException
     */
    public function search(Request $request)
    {
        $this->validate($request, ['query' => [V::REQUIRED, V::TEXT]]);
        $result = $this->repo->searchSupplier($request);
        return $this->respond($result->toArray(), [], '');
    }
}