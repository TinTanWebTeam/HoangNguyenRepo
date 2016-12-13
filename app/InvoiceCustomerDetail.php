<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\InvoiceCustomerDetail
 *
 * @property integer $id
 * @property integer $invoiceCustomer_id
 * @property float $paidAmt Số tiền trả có VAT
 * @property float $paidAmtNotVat Số tiền trả không VAT
 * @property string $payDate Ngày trả
 * @property boolean $modify Có chỉnh sửa hay không
 * @property integer $createdBy Người tạo
 * @property integer $updatedBy Người cập nhật
 * @property string $fileName Tên tập tin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomerDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomerDetail whereInvoiceCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomerDetail wherePaidAmt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomerDetail wherePaidAmtNotVat($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomerDetail wherePayDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomerDetail whereModify($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomerDetail whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomerDetail whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomerDetail whereFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomerDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomerDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class InvoiceCustomerDetail extends Model
{
    protected $table = 'invoiceCustomerDetails';
}
