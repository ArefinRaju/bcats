<?php


namespace Helper\Repo;


use App\Models\Account;
use Helper\Constants\Transaction;
use Illuminate\Http\Request;

class AccountRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Account::class);
    }

    public function getLatestRecord(int $project_id)
    {
        return Account::where('project_id', $project_id)
                      ->orderBy('id', 'desc')
                      ->first();
    }

    public function list(int $perPage = null, int $page = null)
    {
        return Account::where('project_id', Request()->user()->project_id)
                      ->orderBy('id', 'desc')
                      ->paginate($perPage, ['*'], 'page', $page);
    }

    public function getAccountCountByPayee(Request $request, int $payeeId): int
    {
        return Account::where('payee_id', $payeeId)->count();
    }

    public function listByPayee(Request $request, int $id, ?int $perPage = 10, ?int $page = null)
    {
        return Account::where('payee_id', $id)
                      ->where('project_id', $request->user()->project_id)
                      ->orderBy('id', 'desc')->paginate($perPage, ['*'], 'page', $page);
    }

    public function memberTransactions(Request $request, ?int $perPage = 10, ?int $page = null)
    {
        return Account::select('users.name', 'users.mobile', 'users.due', 'accounts.type', 'accounts.credit', 'accounts.created_at', 'accounts.is_fund', 'accounts.due as acDue')
                      ->leftJoin('users', 'users.id', 'accounts.by_user')
                      ->whereNotNull('accounts.by_user')
                      ->where('accounts.project_id', $request->user()->project_id)
                      ->orderBy('accounts.id', 'desc')
                      ->paginate($perPage, ['*'], 'page', $page);
    }

    public function memberTransactionsByUserId(Request $request, int $userId)
    {
        return Account::select('accounts.*')
                      ->leftJoin('users', 'users.id', 'accounts.by_user')
                      ->where('accounts.by_user', $userId)
                      ->orderBy('accounts.id', 'desc')
                      ->get();
    }

    public function supplierTransactions(Request $request, ?int $perPage = 10, ?int $page = null)
    {
        return Account::leftJoin('payees', 'payees.id', 'accounts.payee_id')
                      ->whereNotNull('accounts.payee_id')
                      ->where('accounts.project_id', $request->user()->project_id)
                      ->orderBy('accounts.id', 'desc')->paginate($perPage, ['*'], 'page', $page);
    }

    public function supplierTransactionListBySupplierId(Request $request, int $supplierId, ?int $perPage = 10, ?int $page = null)
    {
        return Account::leftJoin('payees', 'payees.id', 'accounts.payee_id')
                      ->where('accounts.payee_id', $supplierId)
                      ->where('accounts.project_id', $request->user()->project_id)
                      ->orderBy('accounts.id', 'desc')->paginate($perPage, ['*'], 'page', $page);
    }

    // For individual-user-transaction...
    public function userTransactions(Request $request, ?int $perPage = 10, ?int $page = null)
    {
        return Account::leftJoin('users', 'users.id', 'accounts.user_id')
                      ->whereNotNull('accounts.payee_id')
                      ->where('accounts.user_id', $request->user()->id) // We don't use auth as we use same query for api
                      ->orderBy('accounts.id', 'desc')->paginate($perPage, ['*'], 'page', $page);
    }

    public function getTransactionByUser(Request $request, int $userId): int
    {
        return Account::where('by_user', $userId)
                      ->where('project_id', $request->user()->project_id)
                      ->count();
    }

    public function getTransactionOfUser(Request $request, int $perPage = null, int $page = null)
    {
        return Account::leftJoin('users', 'accounts.user_id', 'users.id')
                      ->where('accounts.project_id', $request->user()->project_id)
                      ->paginate($perPage, ['*'], 'page', $page);
    }

    public function debitList(Request $request, int $perPage = null, int $page = null)
    {
        return Account::select('accounts.total', 'accounts.debit', 'accounts.id as account_id', 'user_id', 'accounts.comment', 'users.name', 'accounts.created_at as date')
                      ->leftJoin('users', 'accounts.user_id', 'users.id')
                      ->where('accounts.project_id', $request->user()->project_id)
                      ->where('accounts.type', Transaction::DEBIT)
                      ->orderBy('accounts.created_at', 'desc')
                      ->paginate($perPage, ['*'], 'page', $page);
    }

    public function getMainAccountBalance(Request $request, $role)
    {
        return Account::leftJoin('users', 'accounts.user_id', 'users.id')
                      ->where('accounts.project_id', $request->user()->project_id)
                      ->where('users.acl', $role)->latest('accounts.id')->first('accounts.total');
    }

    public function getEmployeeAccountBalance(Request $request, $role)
    {
        return Account::leftJoin('users', 'accounts.by_user', 'users.id')
                      ->where('accounts.project_id', $request->user()->project_id)
                      ->where('users.acl', $role)->latest('accounts.id')->first('accounts.employee');
    }

    public function getListOfAmountDebitedByEmployee(Request $request, int $perPage = null, int $page = null)
    {
        return Account::where('accounts.project_id', $request->user()->project_id)
                      ->select('accounts.total', 'accounts.due', 'accounts.employee', 'accounts.debit', 'accounts.id as account_id', 'user_id', 'accounts.by_user', 'accounts.project_id', 'users.name')
                      ->leftJoin('users', 'users.id', 'accounts.by_user')
                      ->whereNotIn('accounts.debit', [0.00])
                      ->whereNotNull('accounts.by_user')
                      ->orderBy('accounts.id', 'desc')->paginate($perPage, ['*'], 'page', $page);
    }

    public function createTransaction(Request $request, int $amount, int $projectId, string $comment = ''): Account
    {
        $account             = new Account();
        $account->total      = $amount;
        $account->due        = 0;
        $account->required   = 0;
        $account->employee   = 0;
        $account->credit     = $amount;
        $account->debit      = 0;
        $account->type       = Transaction::CREDIT;
        $account->is_fund    = false;
        $account->comment    = $comment;
        $account->user_id    = $request->user()->id;
        $account->project_id = $projectId;
        $this->save($account);
        return $account;
    }
}
