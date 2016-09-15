<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    protected $fillable = [
        'code',
        'name',
        'description',
        'active'
    ];
}