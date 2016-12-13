<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Customer
 *
 * @property integer $id
 * @property string $fullName
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $taxCode
 * @property string $note
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property boolean $active
 * @property integer $customerType_id
 * @property integer $percentOilPerPostage Phần trăm dầu trên cước phí
 * @property integer $percentOilLimitToChangePostage Phần trăm dầu giới hạn thay đổi giá cước phí
 * @property integer $percentLubePerPostage Phần trăm nhớt trên cước phí
 * @property integer $percentLubeLimitToChangePostage Phần trăm nhớt giới hạn thay đổi giá cước phí
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereFullName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereTaxCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereCustomerTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer wherePercentOilPerPostage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer wherePercentOilLimitToChangePostage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer wherePercentLubePerPostage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer wherePercentLubeLimitToChangePostage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
