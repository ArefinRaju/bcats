<?php


namespace App\Models;


use Helper\Repo\Entity;

/**
 * @method static orderBy(string $string, string $string1)
 */
class Emis extends Entity
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');  
    }
    public function project()
    {
        return $this->belongsTo('App\Models\Project');  
    }
}