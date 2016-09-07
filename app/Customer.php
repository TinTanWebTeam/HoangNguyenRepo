<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = [
        'code',
        'name',
        'address',
        'phone',
        'email',
        'note',
        'createdBy',
        'updatedBy',
        'active'
    ];
}