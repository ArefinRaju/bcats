<?php


namespace App\Http\Controllers;

use App\Models\Payee;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\PayeeRepository;
use Illuminate\Http\Request;

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
            'type'    => [V::REQUIRED, V::TEXT],
        ];
    }

    public function createForm()
    {
        return view('admin.pages.payee.create');
    }

    public function create(Request $request, string $action = null)
    {
        $payee = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new Payee());
        $this->repo->save($payee);
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $payees     = $this->repo->list($pagination->per_page, $pagination->page);
            return view('admin.pages.payee.index')->with('data', $payees);
        }
        return $this->respond($payee, [], 'admin.pages.payee.index');
    }
}