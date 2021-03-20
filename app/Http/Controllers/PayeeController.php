<?php


namespace App\Http\Controllers;

use App\Models\Payee;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Messages;
use Helper\Constants\PayeeType;
use Helper\Constants\ResponseType;
use Helper\Core\HelperController;
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
        $payee = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, $payee);
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
}