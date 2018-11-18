<?php

namespace App\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;

class User extends Model implements AuthenticatableContract, AuthorizableContract, Presentable, Transformable
{
  use Authenticatable, Authorizable, PresentableTrait, TransformableTrait;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [];
  protected $table = 'user';
  protected $with = [
    'role'
  ];

  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  /**
   * Determine if the entity has a given ability.
   *
   * @param  string $ability
   * @param  array|mixed $arguments
   * @return bool
   */
  public function can($ability, $arguments = [])
  {
    // TODO: Implement can() method.
  }
}
