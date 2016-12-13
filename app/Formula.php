<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Formula
 *
 * @property integer $id
 * @property string $formulaCode Mã công thức
 * @property float $unitPrice Đơn giá
 * @property string $unit Đơn vị tính
 * @property integer $customer_id Mã khách hàng
 * @property string $extendData Dữ liệu mở rộng
 * @property float $postageBase
 * @property string $createdDate
 * @property string $applyDate
 * @property string $receivePlace
 * @property string $deliveryPlace
 * @property float $cashDelivery
 * @property string $note
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property boolean $changeByFuel Thay đổi do giá dầu
 * @property integer $fuel_id
 * @property boolean $status Trạng thái để làm mốc cộng dồn % thay đổi giá dầu
 * @property boolean $active Khi đc thêm do giá dầu active = 0
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereFormulaCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereUnitPrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereUnit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereExtendData($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula wherePostageBase($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereCreatedDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereApplyDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereReceivePlace($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereDeliveryPlace($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereCashDelivery($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereChangeByFuel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereFuelId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Formula whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Formula extends Model
{
    //
}
