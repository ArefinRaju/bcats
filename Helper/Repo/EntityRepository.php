<?php


namespace Helper\Repo;


use Illuminate\Database\Eloquent\Model;

class EntityRepository
{
    protected Model $entity;

    protected function setEntity(Model $entity): void
    {
        $this->entity = $entity;
    }
}