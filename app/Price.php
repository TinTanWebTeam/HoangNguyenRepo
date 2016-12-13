<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Price
 *
 * @property integer $id
 * @property float $price
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property string $note
 * @property boolean $active
 * @property integer $costPrice_id
 * @property integer $vehicleType_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Price whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Price wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Price whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Price whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Price whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Price whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Price whereCostPriceId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Price whereVehicleTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Price whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Price extends Model
{
    protected $table = 'prices';
}
