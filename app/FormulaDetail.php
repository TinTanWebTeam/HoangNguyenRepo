<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FormulaDetail
 *
 * @property integer $id
 * @property integer $formula_id Mã công thức
 * @property string $rule Loại rule: khoảng(R) hoặc giá trị(S)
 * @property string $name Tên trường
 * @property float $from Từ
 * @property float $to Đến
 * @property string $value Giá trị
 * @property integer $index
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereFormulaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereRule($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereFrom($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereTo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereIndex($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $fromPlace Từ
 * @property string $toPlace Đến
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereFromPlace($value)
 * @method static \Illuminate\Database\Query\Builder|\App\FormulaDetail whereToPlace($value)
 */
class FormulaDetail extends Model
{
    protected $table = 'formulaDetails';
}
