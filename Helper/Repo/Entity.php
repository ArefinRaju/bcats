<?php


namespace Helper\Repo;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

/**
 * @mixin Collection
 */
class Entity extends Model
{
    public static function findOrLogAndFail(int $id): Collection
    {
        try {
            $model = static::findOrFail('id', $id);
        } catch (ModelNotFoundException $exception) {
            Log::warning(get_called_class()." doesn't have any record related to this ID ".$id);
            throw $exception;
        }
        return $model;
    }
}