<?php


namespace Helper\Repo;


use App\Models\Project;

class ProjectRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Project::class);
    }
}