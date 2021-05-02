<?php


namespace Helper\Repo;


use App\Models\Category;

class CategoryRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Category::class);
    }
}