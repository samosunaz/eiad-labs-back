<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 20/09/18
 * Time: 19:14
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $fillable = [
        'id',
        'type'
    ];
}