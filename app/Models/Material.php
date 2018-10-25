<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 20/09/18
 * Time: 21:08
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  protected $connection = 'mysql';

  public $incrementing = false;

  protected $table = 'material';

  protected $fillable = [
    'id',
    'name',
    'model',
    'description',
    'lab_id',
    'brand'
  ];
}