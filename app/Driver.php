<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Driver
 *
 * @property integer $id
 * @property string $fullName
 * @property string $address
 * @property string $permanetAddress
 * @property string $phone
 * @property string $birthday
 * @property string $identityCardNumber Số chứng minh thư
 * @property string $issueDate_identityCard Ngày cấp chứng minh thư
 * @property string $driverLicenseType Loại bằng lái
 * @property string $driverLicenseNumber Số bằng lái
 * @property string $issueDate_DriverLicense Ngày cấp bằng lái
 * @property string $expireDate_DriverLicense Ngày hết hạn bằng lái
 * @property string $startDate Ngày bắt đầu lái
 * @property string $finishDate Ngày kết thúc lái
 * @property string $note
 * @property boolean $active
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereFullName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver wherePermanetAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereBirthday($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereIdentityCardNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereIssueDateIdentityCard($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereDriverLicenseType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereDriverLicenseNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereIssueDateDriverLicense($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereExpireDateDriverLicense($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereStartDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereFinishDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Driver whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Driver extends Model
{
    protected $table = 'drivers';
}
