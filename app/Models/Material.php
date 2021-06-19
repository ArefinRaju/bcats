<?php


namespace App\Models;


use Helper\Repo\Entity;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static find($id)
 * @method static leftJoin(string $string, string $string1, string $string2)
 * @property mixed name
 */
class Material extends Entity
{
    public function category(){

        return $this->belongsTo('App\Models\Category', 'category_id');

    }
}