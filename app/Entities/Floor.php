<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Floor.
 *
 * @package namespace App\Entities;
 */
class Floor extends Model implements Presentable, Transformable
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
    'building_id'
  ];
  protected $table = 'floor';
  public $incrementing = false;
  protected $with = [
    'building',
    'labs'
  ];

  public function building()
  {
    return $this->belongsTo(Building::class);
  }

  public function labs() {
    return $this->hasMany(Lab::class);
  }

}
