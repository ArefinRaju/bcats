<?php


namespace App\Http\Controllers;


use App\Models\Account as Model;
use Helper\ACL\Acl;
use Helper\ACL\Permission;
use Helper\ACL\Roles;
use Helper\Calculator\Account;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Core\UserFriendlyException;
use Helper\Repo\AccountRepository;
use Helper\Repo\PayeeRepository;
use Helper\Repo\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class AccountController extends HelperController
{
    protected array           $commonValidationRules;
    private AccountRepository $repo;
    private PayeeRepository   $payeeRepo;
    private UserRepository    $userRepo;

    public function __construct(AccountRepository $repo, PayeeRepository $payeeRepo, UserRepository $userRepo)
    {
        $this->repo      = $repo;
        $this->payeeRepo = $payeeRepo;
        $this->userRepo  = $userRepo;
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
        return view('admin.pages.account.fund.create', compact('payees', 'projects'));
    }

    public function creditForm(Request $request)
    {
        $users = $this->userRepo->getByType($request, Roles::FUND_COLLECTOR);

        $projects = $request->user()->project_id;
        return view('admin.pages.account.credit.create', compact('users', 'projects'));
    }

    public function demandForm(Request $request)
    {
        $payees   = $this->payeeRepo->payeeList($request);
        $projects = $request->user()->project_id;
        return view('admin.pages.account.demand.create', compact('payees', 'projects'));
    }

    public function payeePaymentForm(Request $request)
    {
        $payees   = $this->payeeRepo->payeeList($request);
        $projects = $request->user()->project_id;
        return view('admin.pages.payment.create', compact('payees', 'projects'));
    }


    /**
     * @param  Request  $request
     * @return Application|Factory|JsonResponse|View
     * @throws UserFriendlyException
     */
    public function payPayee(Request $request)
    {
        $rules = [
            'payeeId' => [V::REQUIRED, V::NUMBER],
            'amount'  => [V::REQUIRED, V::NUMBER],
            'comment' => [V::SOMETIMES, V::REQUIRED, V::TEXT],
            'image'   => [V::SOMETIMES, 'mimes:jpg,bmp,png|max:10240']
        ];
        $this->validate($request, $rules);
        $log = Account::payPayee($request, $request->input('amount'), $request->input('payeeId'), $request->input('comment') ?? '');
        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $log        = $this->repo->list($pagination->per_page, $pagination->page);
        }
        return $this->respond($log, [], 'admin.pages.building_accounts.balance_overview');
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|JsonResponse|View
     * @throws UserFriendlyException
     */
    public function addFund(Request $request)
    {
        $rules = [
            'emiId'   => [V::REQUIRED, V::NUMBER],
            'amount'  => [V::REQUIRED, V::NUMBER],
            'byUser'  => [V::REQUIRED, V::NUMBER],
            'image'   => [V::SOMETIMES, 'mimes:jpg,bmp,png|max:10240'],
            'comment' => [V::SOMETIMES, V::TEXT]
        ];
        $this->validate($request, $rules);
        $log = Account::fund($request, $request->input('amount'), $request->input('emiId'), $request->input('byUser'));
        if (!$this->isAPI()) {
            return redirect('/memberTransactions');
        }
        return $this->respond($log, [], 'admin.pages.account.fund.index');
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|JsonResponse|View
     * @throws UserFriendlyException
     */
    public function credit(Request $request)
    {
        $rules = [
            'amount'        => [V::REQUIRED, V::NUMBER],
            'fundCollector' => [V::REQUIRED, V::NUMBER],
            'image'         => [V::SOMETIMES, 'mimes:jpg,bmp,png']
        ];
        $this->validate($request, $rules);
        Acl::authorize($request, Permission::PAY_BILLS);
        $log = Account::credit($request, $request->input('amount'), $request->input('fundCollector'));
        if (!self::isAPI()) {
            $log = $this->repo->getTransactionOfUser($request);
        }
        return $this->respond($log, [], 'admin.pages.account.credit.index');
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|JsonResponse|View
     * @throws UserFriendlyException
     */
    public function creditList(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $log        = $this->repo->getTransactionOfUser($request, $pagination->per_page, $pagination->page);
        return $this->respond($log, [], 'admin.pages.account.credit.index');
    }

    /**
     * @throws UserFriendlyException
     */
    public function debitList(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $log        = $this->repo->debitList($request, $pagination->per_page, $pagination->page);
        return $this->respond($log, [], 'admin.pages.account.credit.index');
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|JsonResponse|View
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
     * @return Application|Factory|JsonResponse|View
     * @throws UserFriendlyException
     */
    public function list(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $accounts   = $this->repo->list($pagination->per_page, $pagination->page);
        return $this->respond($accounts, [], 'admin.pages.building_accounts.balance_overview');
    }

    /**
     * @throws UserFriendlyException
     */
    public function transactionList(Request $request, int $payee_id)
    {
        $pagination   = $this->paginationManager($request);
        $transactions = $this->repo->listByPayee($request, $payee_id, $pagination->per_page, $pagination->page);
        return $this->respond($transactions, [], 'admin.pages.payee.transaction');
    }

    /**
     * @throws UserFriendlyException
     */
    public function memberTransactionList(Request $request)
    {
        $pagination   = $this->paginationManager($request);
        $transactions = $this->repo->memberTransactions($request, $pagination->per_page, $pagination->page);
        return $this->respond($transactions, [], 'admin.pages.payee.allTransaction');
    }

    /**
     * @throws UserFriendlyException
     */
    public function userTransactionList(Request $request, $userId)
    {
        $transactions = $this->repo->memberTransactionsByUserId($request, $userId);
        return $this->respond($transactions);
    }

    /**
     * @throws UserFriendlyException
     */
    public function supplierTransactionList(Request $request)
    {
        $pagination   = $this->paginationManager($request);
        $transactions = $this->repo->supplierTransactions($request, $pagination->per_page, $pagination->page);
        // dd($transactions);
        return $this->respond($transactions, [], 'admin.pages.payee.allTransaction');
    }

    /**
     * @throws UserFriendlyException
     */
    public function supplierTransactionListBySupplierId(Request $request, int $supplierId)
    {
        $pagination   = $this->paginationManager($request);
        $transactions = $this->repo->supplierTransactionListBySupplierId($request, $supplierId, $pagination->per_page, $pagination->page);
        return $this->respond($transactions);
    }

    /**
     * For individual-user-transaction...
     * @throws UserFriendlyException
     */
    public function individualTransactionList(Request $request)
    {
        $pagination   = $this->paginationManager($request);
        $transactions = $this->repo->userTransactions($request, $pagination->per_page, $pagination->page);
        return $this->respond($transactions, [], 'admin.pages.profile.my_transaction');
    }

    public function payEmployeeForm(Request $request)
    {
        return $this->respond($this->payeeRepo->emoloyeeList($request), [], 'admin.pages.account.balance_transfer.index');
    }

    /**
     * @throws UserFriendlyException
     */
    public function payEmployee(Request $request)
    {
        $rules = [
            'employeeId' => [V::REQUIRED, V::INTEGER],
            'amount'     => [V::REQUIRED, V::NUMBER],
            'comment'    => [V::SOMETIMES, V::TEXT]
        ];
        $this->validate($request, $rules);
        $log = Account::payEmployee($request, $request->input('amount'), $request->input('employeeId'));

        if (!self::isAPI()) {
            $pagination = $this->paginationManager($request);
            $list       = $this->repo->getListOfAmountDebitedByEmployee($request, $pagination->per_page, $pagination->page);
            return $this->respond($list, [], 'admin.pages.payment.index');
        }
        return $this->respond($log, [], 'admin.pages.payment.index');
    }

    /**
     * @throws UserFriendlyException
     */
    public function employeePaymentList(Request $request)
    {
        $pagination = $this->paginationManager($request);
        $list       = $this->repo->getListOfAmountDebitedByEmployee($request, $pagination->per_page, $pagination->page);
        return $this->respond($list, [], 'admin.pages.payment.index');
    }

    public function accountOverview(Request $request)
    {
    }
}
