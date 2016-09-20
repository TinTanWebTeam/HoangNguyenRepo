<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
