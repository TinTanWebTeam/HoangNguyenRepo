<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SubRole
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_id
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @method static \Illuminate\Database\Query\Builder|\App\SubRole whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SubRole whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SubRole whereRoleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SubRole whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SubRole whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SubRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\SubRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
