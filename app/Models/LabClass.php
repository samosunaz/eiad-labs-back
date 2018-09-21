<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 20/09/18
 * Time: 19:04
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class LabClass extends Model
{
    protected $table = 'lab_class';

    protected $fillable = [
        'id',
        'name',
        'starts_at',
        'ends_at',
        'days',
        'lab_id'
    ];
}