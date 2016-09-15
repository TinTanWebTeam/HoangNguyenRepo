<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubRole extends Model
{
    protected $table = 'subRoles';
    protected $fillable = [
        'user_id',
        'role_id',
        'created_by',
        'updated_by'
    ];

    public function users()
    {
        return $this->hasMany('\App\User');
    }

    public function roles()
    {
        return $this->hasMany('\App\Role');
    }
}
