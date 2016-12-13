<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Status
 *
 * @property integer $id
 * @property string $tableName
 * @property string $status
 * @property boolean $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Status whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Status whereTableName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Status whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Status whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Status whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Status extends Model
{
    protected $table = 'statuses';
    protected $fillable = [
        'tableName',
        'status',
        'active'
    ];
}
