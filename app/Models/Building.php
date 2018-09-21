<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 12/09/18
 * Time: 16:52
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table ='building';

    protected $fillable = [
        'id',
        'name'
    ];
}