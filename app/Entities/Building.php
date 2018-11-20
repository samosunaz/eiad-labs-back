<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Building.
 *
 * @package namespace App\Entities;
 */
class Building extends Model implements Presentable, Transformable
{
  use PresentableTrait, TransformableTrait;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id',
    'name'
  ];
  public $incrementing = false;
  protected $table = 'building';

  public function floors()
  {
    return $this->hasMany(Floor::class);
  }

}
