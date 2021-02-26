<?php


namespace Helper\Repo;


use App\Models\ProjectUser;

class ProjectUserRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(ProjectUser::class);
    }
}