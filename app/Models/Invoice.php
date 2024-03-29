<?php


namespace App\Models;


use Helper\Repo\Entity;


/**
 * @property int payee_id
 * @property int material_id
 * @property mixed quantity
 * @property mixed paid
 * @property mixed due
 * @property int project_id
 * @property int id
 * @property string payee_name
 * @property string material_name
 * @method static orderBy(string $string, string $string1)
 */
class Invoice extends Entity
{

}