<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\File
 *
 * @property integer $id
 * @property string $fileName
 * @property string $fileExtension
 * @property string $mimeType
 * @property string $filePath
 * @property integer $size
 * @property integer $id_type
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\File whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereFileExtension($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereMimeType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereFilePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereIdType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class File extends Model
{
    //
}
