<?php


namespace App\Models;


use Helper\Repo\Entity;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static rightJoin(string $string, string $string1, string $string2, string $string3)
 * @method static leftJoin(string $string, string $string1, string $string2, string $string3)
 * @method count()
 * @property string type
 * @property float due
 * @property float paid
 * @property bool status
 */
class Payee extends Entity
{

}
