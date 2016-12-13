<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CustomerType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\CustomerType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CustomerType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CustomerType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CustomerType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CustomerType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CustomerType extends Model
{
    protected $table = 'customerTypes';
}
