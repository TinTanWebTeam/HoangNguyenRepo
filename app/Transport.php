<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Transport
 *
 * @property integer $id
 * @property string $transportCode Mã đơn hàng
 * @property float $weight Trọng tải
 * @property float $quantumProduct Số lượng hàng
 * @property float $cashRevenue Doanh thu
 * @property float $cashDelivery Tiền phải giao cho nhà xe
 * @property float $cashPreDelivery Tiền đã giao trước cho nhà xe
 * @property float $cashReceive Tiền đã nhận
 * @property float $cashProfit Lợi nhuận lý tưởng
 * @property string $voucherNumber Số chứng từ
 * @property string $voucherQuantumProduct Số lượng hàng trên chứng từ
 * @property string $receiver Người nhận
 * @property string $receiveDate Ngày nhận
 * @property string $receivePlace Nơi nhận
 * @property string $deliveryPlace Nơi giao
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property string $note
 * @property string $costNote
 * @property boolean $active
 * @property integer $vehicle_id
 * @property integer $product_id
 * @property integer $customer_id
 * @property integer $status_transport Trạng thái đơn hàng
 * @property integer $status_customer Trạng thái công nợ khách hàng
 * @property integer $status_garage Trạng thái công nợ nhà xe
 * @property float $carrying Bốc xếp
 * @property float $parking Neo đêm
 * @property float $fine Công an
 * @property float $phiTangBo Phí tăng bo
 * @property boolean $transportType Loại đơn hàng
 * @property string $vehicle_name Số xe cho đơn hàng khống
 * @property string $product_name Sản phẩm cho đơn hàng khống
 * @property string $customer_name Khách hàng cho đơn hàng khống
 * @property integer $formula_id Mã công thức
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereTransportCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereQuantumProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereCashRevenue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereCashDelivery($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereCashPreDelivery($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereCashReceive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereCashProfit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereVoucherNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereVoucherQuantumProduct($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereReceiver($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereReceiveDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereReceivePlace($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereDeliveryPlace($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereCostNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereVehicleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereStatusTransport($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereStatusCustomer($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereStatusGarage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereCarrying($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereParking($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereFine($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport wherePhiTangBo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereTransportType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereVehicleName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereProductName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereCustomerName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereFormulaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $transportDate Ngày vận chuyển
 * @property float $addScore Thêm điểm
 * @property boolean $direction 1 Chiều/2 Chiều
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereTransportDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereAddScore($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereDirection($value)
 * @property string $productCode
 * @property int $status_invoice Trạng thái phương thức thanh toán đơn hàng cho khác hàng
 * @property int $status_invoice_garage Trạng thái phương thức thanh toán đơn hàng cho nhà xe
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereProductCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereStatusInvoice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Transport whereStatusInvoiceGarage($value)
 */
class Transport extends Model
{
    protected $table = 'transports';
    protected $fillable = [
        'status_invoice'
    ];
}
