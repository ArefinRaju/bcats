<?php


namespace Helper\Repo;


use App\Models\Account;

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
            ->latest()
            ->paginate($perPage, ['*'], 'page', $page);
    }
}