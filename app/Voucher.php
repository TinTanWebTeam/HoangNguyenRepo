<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Voucher
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Voucher extends Model
{
    protected $table = 'vouchers';
}
