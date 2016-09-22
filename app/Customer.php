<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'fullName',
        'address',
        'phone',
        'email',
        'note',
        'active',
        'createdBy'
    ];
}
