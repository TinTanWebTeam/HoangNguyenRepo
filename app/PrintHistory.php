<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PrintHistory
 *
 * @property integer $id
 * @property integer $invoiceCustomerDetail_id
 * @property integer $invoiceGarageDetail_id
 * @property string $printDate
 * @property string $sendToPerson
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\PrintHistory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PrintHistory whereInvoiceCustomerDetailId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PrintHistory whereInvoiceGarageDetailId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PrintHistory wherePrintDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PrintHistory whereSendToPerson($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PrintHistory whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PrintHistory whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PrintHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PrintHistory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PrintHistory extends Model
{
    protected $table = 'printHistories';
}
