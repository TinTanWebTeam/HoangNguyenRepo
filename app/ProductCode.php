<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProductCode
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $code
 * @property int $product_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\ProductCode whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductCode whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductCode whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ProductCode whereUpdatedAt($value)
 */
class ProductCode extends Model
{
    protected $table = 'productCodes';
}
