<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CostPrice
 *
 * @property integer $id
 * @property string $name
 * @property string $note
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\CostPrice whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CostPrice whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CostPrice whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CostPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CostPrice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CostPrice extends Model
{
    protected $table = 'costPrices';
}
