<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DriverVehicle
 *
 * @property integer $id
 * @property integer $driver_id
 * @property integer $vehicle_id
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property boolean $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\DriverVehicle whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DriverVehicle whereDriverId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DriverVehicle whereVehicleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DriverVehicle whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DriverVehicle whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DriverVehicle whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DriverVehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DriverVehicle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DriverVehicle extends Model
{
    protected $table = 'driverVehicles';
}
