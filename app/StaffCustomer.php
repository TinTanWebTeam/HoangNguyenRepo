<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffCustomer extends Model
{

    protected $table = 'staffCustomers';
    protected $fillable = [
        'fullName',
        'phone'

    ];
}
