<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 13/09/18
 * Time: 09:41
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $table = 'lab';

    protected $fillable = [
        'id',
        'name',
        'floor_id',
        'user_id'
    ];
}