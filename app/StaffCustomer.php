<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\StaffCustomer
 *
 * @property integer $id
 * @property string $fullName
 * @property string $address
 * @property string $phone
 * @property string $birthday
 * @property string $email
 * @property string $note
 * @property boolean $active
 * @property string $position
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property integer $customer_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereFullName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereBirthday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer wherePosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\StaffCustomer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StaffCustomer extends Model
{

    protected $table = 'staffCustomers';
    protected $fillable = [
        'fullName',
        'phone'

    ];
}
