<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\VoucherTransport
 *
 * @property integer $id
 * @property integer $voucher_id
 * @property integer $transport_id
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property integer $quantity
 * @property boolean $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherTransport whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherTransport whereVoucherId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherTransport whereTransportId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherTransport whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherTransport whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherTransport whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherTransport whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherTransport whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherTransport whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VoucherTransport extends Model
{
    protected $table = 'voucherTransports';
}
