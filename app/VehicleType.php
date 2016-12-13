<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\VehicleType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\VehicleType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VehicleType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VehicleType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VehicleType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VehicleType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VehicleType extends Model
{
    protected $table = 'vehicleTypes';
}
