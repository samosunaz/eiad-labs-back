<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Memo.
 *
 * @package namespace App\Entities;
 */
class Memo extends Model implements Transformable
{
  use TransformableTrait;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'student_id',
    'student_name',
    'student_email',
    'material_id',
    'starts_at',
    'ends_at',
    'status'
  ];
  protected $table = 'memo';

  public function material()
  {
    return $this->belongsTo(Material::class);
  }

}
