<?php


namespace Helper\Repo;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

/**
 * @method static Collection where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Collection create(array $attributes = [])
 * @method static Collection findOrFail(string $attributes, $value = null)
 * @method public Builder update(array $values)
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