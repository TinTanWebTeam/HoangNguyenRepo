<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\InvoiceGarage
 *
 * @property integer $id Mã
 * @property string $invoiceCode Mã hóa đơn
 * @property float $totalTransport Tổng tiền thật sự của các đơn hàng
 * @property float $VAT Phần trăm VAT
 * @property float $notVAT Tổng tiền chưa VAT
 * @property float $hasVAT Tổng tiền có VAT
 * @property float $totalPay Tổng tiền sẽ trả trên hóa đơn
 * @property float $prePaid Đã trả trước
 * @property float $totalPaid Tổng tiền đã trả
 * @property string $exportDate Ngày xuất
 * @property string $invoiceDate Ngày hóa đơn
 * @property string $payDate Ngày trả
 * @property integer $createdBy Người tạo
 * @property integer $updatedBy Người cập nhật
 * @property string $note Ghi chú
 * @property boolean $active Trạng thái
 * @property boolean $invoiceType Loại hóa đơn Khống hay Thường
 * @property float $money
 * @property string $sendToPerson Người nhận hóa đơn
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereInvoiceCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereTotalTransport($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereVAT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereNotVAT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereHasVAT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereTotalPay($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage wherePrePaid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereTotalPaid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereExportDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereInvoiceDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage wherePayDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereInvoiceType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereMoney($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereSendToPerson($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property float $debt Tiền nợ
 * @property float $paidAmt tiền đã trả
 * @property int $status_invoice Trạng thái phương thức thanh toán hóa đơn
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereDebt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage wherePaidAmt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereStatusInvoice($value)
 * @property float $totalCost Tổng tiền chi phí
 * @method static \Illuminate\Database\Query\Builder|\App\InvoiceGarage whereTotalCost($value)
 */
class InvoiceGarage extends Model
{
    protected $table = 'invoiceGarages';
}
