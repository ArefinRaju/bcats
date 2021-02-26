<?php


namespace Helper\Repo;


use App\Models\Material;

class MaterialRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Material::class);
    }
}