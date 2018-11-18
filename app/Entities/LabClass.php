<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LabClass.
 *
 * @package namespace App\Entities;
 */
class LabClass extends Model implements Presentable, Transformable
{
  use PresentableTrait, TransformableTrait;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [];
  protected $table = 'lab_class';

}
