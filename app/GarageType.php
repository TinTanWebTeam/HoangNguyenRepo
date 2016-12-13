<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GarageType
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\GarageType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GarageType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GarageType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GarageType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GarageType extends Model
{
    protected $table = 'garageTypes';
}
