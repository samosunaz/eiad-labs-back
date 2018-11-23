<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Material.
 *
 * @package namespace App\Entities;
 */
class Material extends Model implements Presentable, Transformable
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
    'brand',
    'model',
    'lab_id'
  ];
  public $incrementing = false;
  protected $table = 'material';

  public function lab()
  {
    return $this->belongsTo(Lab::class);
  }

  public function memos()
  {
    return $this->hasMany(Memo::class);
  }
}
