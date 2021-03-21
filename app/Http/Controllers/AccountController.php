<?php


namespace App\Http\Controllers;


use App\Models\Account as Model;
use Helper\Calculator\Account;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\AccountRepository;
use Helper\Repo\PayeeRepository;
use Illuminate\Http\Request;

class AccountController extends HelperController
{
    protected array           $commonValidationRules;
    private AccountRepository $repo;
    private PayeeRepository   $payeeRepo;

    public function __construct(AccountRepository $repo, PayeeRepository $payeeRepo)
    {
        $this->repo      = $repo;
        $this->payeeRepo = $payeeRepo;
        $this->setResource(Model::class);
        $this->commonValidationRules = [
            'credit' => [V::SOMETIMES, V::REQUIRED, V::NUMBER],
            'debit'  => [V::SOMETIMES, V::REQUIRED, V::NUMBER]
        ];
    }

    public function addFundForm(Request $request)
    {
        $payees   = $this->payeeRepo->payeeList($request);
        $projects = $request->user()->project_id;
        return view('admin.pages.fund.create', compact('payees', 'projects'));
    }

    public function creditForm(Request $request)
    {
        $payees   = $this->payeeRepo->payeeList($request);
        $projects = $request->user()->project_id;
        return view('admin.pages.credit.create', compact('payees', 'projects'));
    }

    public function demandForm(Request $request)
    {
        $payees   = $this->payeeRepo->payeeList($request);
        $projects = $request->user()->project_id;
        return view('admin.pages.demand.create', compact('payees', 'projects'));
    }

    public function payeePaymentForm(Request $request)
    {
        $payees   = $this->payeeRepo->payeeList($request);
        $projects = $request->user()->project_id;
        return view('admin.pages.payment.create', compact('payees', 'projects'));
    }


    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function payPayee(Request $request)
    {
        $rules = [
            'payeeId' => [V::REQUIRED, V::NUMBER],
            'amount'  => [V::REQUIRED, V::NUMBER],
            'comment' => [V::SOMETIMES, V::REQUIRED, V::TEXT]
        ];
        $this->validate($request, $rules);
        $log = Account::debit($request, $request->input('amount'), $request->input('payeeId'), $request->input('comment'));
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $log        = $this->repo->list($pagination->per_page, $pagination->page);
        }
        return $this->respond($log, [], 'admin.pages.building_accounts.balance_overview');
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function addFund(Request $request)
    {
        $rules = [
            'emiId'  => [V::REQUIRED, V::NUMBER],
            'amount' => [V::REQUIRED, V::NUMBER],
            'byUser' => [V::REQUIRED, V::NUMBER]
        ];
        $this->validate($request, $rules);
        $log = Account::fund($request, $request->input('amount'), $request->input('emiId'), $request->input('byUser'));
        return $this->respond($log, [], 'admin.pages.fund.index');
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function credit(Request $request)
    {
        $rules = ['amount' => [V::REQUIRED, V::NUMBER]];
        $this->validate($request, $rules);
        $log = Account::credit($request, $request->input('amount'));
        return $this->respond($log, [], 'admin.pages.credit.index');
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function demand(Request $request)
    {
        $rules = ['amount' => [V::REQUIRED, V::NUMBER]];
        $this->validate($request, $rules);
        $log = Account::demand($request, $request->input('amount'));
        return $this->respond($log, [], 'admin.pages.demand.index');
    }

    /**
     * @param  Request  $request
     * @return mixed
     * @throws UserFriendlyException
     */
    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $accounts   = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($accounts, [], 'admin.pages.building_accounts.balance_overview');
    }
}