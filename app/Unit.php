<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Unit
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property boolean $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Unit whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Unit whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Unit whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Unit whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Unit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Unit extends Model
{
    //
}
