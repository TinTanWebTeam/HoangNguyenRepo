<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProductType
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ProductType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductType whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductType extends Model
{
    protected $table = 'productTypes';
}
