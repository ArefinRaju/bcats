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

    public function getTransactionByUser(Request $request, int $userId): int
    {
        return Account::where('by_user', $userId)
                      ->where('project_id', $request->user()->project_id)
                      ->count();
    }
}