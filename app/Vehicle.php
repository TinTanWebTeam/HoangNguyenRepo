<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Vehicle
 *
 * @property integer $id
 * @property string $areaCode
 * @property string $vehicleNumber
 * @property string $size
 * @property float $weight
 * @property string $trademark
 * @property integer $yearOfProduction
 * @property string $owner
 * @property string $note
 * @property boolean $active
 * @property integer $vehicleType_id
 * @property integer $garage_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereAreaCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereVehicleNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereTrademark($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereYearOfProduction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereOwner($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereVehicleTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereGarageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property integer $status_id
 * @method static \Illuminate\Database\Query\Builder|\App\Vehicle whereStatusId($value)
 */
class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $fillable = [
        'vehicleType_id',
        'garage_id',
        'areaCode',
        'vehicleNumber',
        'size',
        'weight'
    ];
}
