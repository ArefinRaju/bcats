<?php


namespace Helper\Repo;


use App\Models\MaterialHistory;

class MaterialHistoryRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(MaterialHistory::class);
    }
}