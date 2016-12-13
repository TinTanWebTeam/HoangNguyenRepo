<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Garage
 *
 * @property integer $id
 * @property string $name
 * @property string $contactor
 * @property string $address
 * @property string $phone
 * @property string $note
 * @property boolean $active
 * @property integer $garageType_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Garage whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Garage whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Garage whereContactor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Garage whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Garage wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Garage whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Garage whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Garage whereGarageTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Garage whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Garage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Garage extends Model
{
    protected $table = 'garages';
}
