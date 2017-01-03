<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\InvoiceCustomer
 *
 * @property integer $id Mã
 * @property string $invoiceCode Mã hóa đơn
 * @property float $totalTransport Tổng tiền thật sự của các đơn hàng
 * @property float $prePaid Đã trả trước
 * @property float $totalPay Tổng tiền sẽ trả trên hóa đơn
 * @property float $totalPaid Tổng tiền đã trả
 * @property float $VAT Phần trăm VAT
 * @property float $notVAT Tổng tiền chưa VAT
 * @property float $hasVAT Tổng tiền có VAT
 * @property string $exportDate Ngày xuất
 * @property string $invoiceDate Ngày hóa đơn
 * @property string $payDate Ngày trả
 * @property integer $createdBy Người tạo
 * @property integer $updatedBy Người cập nhật
 * @property string $note Ghi chú
 * @property boolean $active Trạng thái
 * @property boolean $statusPrePaid Trạng thái có dùng tiền trả trước hay không?
 * @property boolean $invoiceType Loại hóa đơn Khống hay Thường
 * @property float $money
 * @property string $sendToPerson Người nhận hóa đơn
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereInvoiceCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereTotalTransport($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer wherePrePaid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereTotalPay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereTotalPaid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereVAT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereNotVAT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereHasVAT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereExportDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereInvoiceDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer wherePayDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereStatusPrePaid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereInvoiceType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereMoney($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereSendToPerson($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $status_invoice Trạng thái phương thức thanh toán hóa đơn
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceCustomer whereStatusInvoice($value)
 */
class InvoiceCustomer extends Model
{
    protected $table = 'invoiceCustomers';
}
