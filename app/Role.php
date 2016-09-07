<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
    	'name',
    	'description',
    	'active'
    ];
    public function sub_role()
    {
        return $this->belongsTo('App\SubRole');
    }
}
