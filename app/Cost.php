<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Cost
 *
 * @property integer $id
 * @property float $cost
 * @property float $hasVat
 * @property float $vat
 * @property float $literNumber
 * @property string $dateCheckIn
 * @property string $dateCheckOut
 * @property integer $totalDate
 * @property float $totalHour
 * @property string $dateRefuel
 * @property integer $createdBy
 * @property integer $updatedBy
 * @property string $note
 * @property boolean $active
 * @property integer $transport_id
 * @property integer $price_id
 * @property integer $vehicle_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereCost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereHasVat($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereVat($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereLiterNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereDateCheckIn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereDateCheckOut($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereTotalDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereTotalHour($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereDateRefuel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereTransportId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost wherePriceId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereVehicleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Cost whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cost extends Model
{
    protected $table = 'costs';
}
