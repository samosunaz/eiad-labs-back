<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Lab.
 *
 * @package namespace App\Entities;
 */
class Lab extends Model implements Presentable, Transformable
{
  use PresentableTrait, TransformableTrait;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id',
    'name',
    'floor_id',
    'user_id'
  ];
  protected $table = 'lab';
  public $incrementing = false;
  protected $with = [
    'classes'
  ];

  public function classes()
  {
    return $this->hasMany(LabClass::class);
  }

  public function floor()
  {
    return $this->belongsTo(Floor::class);
  }

  public function materials()
  {
    return $this->hasMany(Material::class);
  }
}
