<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TransportFormulaDetail
 *
 * @property integer $id
 * @property string $name Tên trường trong FormulaDetails
 * @property string $value Giá trị trong FormulaDetails
 * @property string $rule Rule trong FormulaDetails
 * @property integer $transport_id Mã transport
 * @property boolean $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\TransportFormulaDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportFormulaDetail whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportFormulaDetail whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportFormulaDetail whereRule($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportFormulaDetail whereTransportId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportFormulaDetail whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportFormulaDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\TransportFormulaDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TransportFormulaDetail extends Model
{
    protected $table = 'transportFormulaDetails';
}
