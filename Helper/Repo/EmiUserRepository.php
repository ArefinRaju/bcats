<?php


namespace Helper\Repo;


use App\Models\EmiUser;

class EmiUserRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(EmiUser::class);
    }
}