<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Fuel
 *
 * @property integer $id
 * @property float $price
 * @property string $type
 * @property string $applyDate
 * @property string $note
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Fuel whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fuel wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fuel whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fuel whereApplyDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fuel whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fuel whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fuel whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fuel whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fuel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Fuel extends Model
{
    protected $table = 'fuels';
}
