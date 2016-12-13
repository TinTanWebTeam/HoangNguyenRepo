<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Rule
 *
 * @property integer $id
 * @property string $name Tên rule
 * @property string $shortName Viết tắt
 * @property string $description Mô tả
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Rule whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rule whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rule whereShortName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rule whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rule whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Rule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Rule extends Model
{
    //
}
