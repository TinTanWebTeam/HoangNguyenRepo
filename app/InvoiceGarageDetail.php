<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\InvoiceGarageDetail
 *
 * @property integer $id
 * @property integer $invoiceGarage_id
 * @property float $paidAmt Số tiền trả có Vat
 * @property float $paidAmtNotVat Số tiền trả chưa Vat
 * @property string $payDate Ngày trả
 * @property boolean $modify Có chỉnh sửa hay không
 * @property integer $createdBy Người tạo
 * @property integer $updatedBy Người cập nhật
 * @property string $fileName Tên tập tin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarageDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarageDetail whereInvoiceGarageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarageDetail wherePaidAmt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarageDetail wherePaidAmtNotVat($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarageDetail wherePayDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarageDetail whereModify($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarageDetail whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarageDetail whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarageDetail whereFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarageDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarageDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InvoiceGarageDetail extends Model
{
    protected $table = 'invoiceGarageDetails';
}
