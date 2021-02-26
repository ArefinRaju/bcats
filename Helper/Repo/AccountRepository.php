<?php


namespace Helper\Repo;


use App\Models\Account;

class AccountRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Account::class);
    }
}