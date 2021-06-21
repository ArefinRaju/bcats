<?php


namespace Helper\Repo;


use App\Models\Account;
use Illuminate\Http\Request;

class AccountRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Account::class);
    }

    public function getLatestRecord(int $project_id)
    {
        return Account::where('project_id', $project_id)->latest()->first();
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
    public function memberTransections(Request $request, ?int $perPage = 10, ?int $page = null)
    {
        return Account::leftJoin('users', 'users.id', 'accounts.by_user',)
            ->whereNotNull('by_user')
            ->where('accounts.project_id', $request->user()->project_id)
            ->orderBy('accounts.id', 'desc')->paginate($perPage, ['*'], 'page', $page);
    }
    public function supplierTransections(Request $request, ?int $perPage = 10, ?int $page = null)
    {
        return Account::leftJoin('users', 'users.id', 'accounts.user_id',)
            ->whereNotNull('accounts.payee_id')
            ->where('accounts.project_id', $request->user()->project_id)
            ->orderBy('accounts.id', 'desc')->paginate($perPage, ['*'], 'page', $page);
    }

    public function getTransactionByUser(Request $request, int $userId): int
    {
        return Account::where('by_user', $userId)
            ->where('project_id', $request->user()->project_id)
            ->count();
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
}
