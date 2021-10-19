<?php


namespace App\Models;


use Helper\Repo\Entity;

/**
 * @method static latest()
 * @property float total
 * @property float required
 * @property float due
 * @property float credit
 * @property float debit
 * @property mixed|string type
 * @property false is_fund
 * @property int user_id
 * @property int project_id
 * @property float employee
 * @property string comment
 * @method static leftJoin(string $table, string $primaryKey, string $foreignKey)
 * @method static select(string ...$string)
 */
class Account extends Entity
{

}
