<?php


namespace Helper\Repo;


use App\Models\Payee;

class PayeeRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Payee::class);
    }
}