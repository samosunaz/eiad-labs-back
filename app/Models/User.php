<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 20/09/18
 * Time: 19:13
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models
 */
class User extends Model
{

  /**
   * @var string
   */
  protected $table = 'user';

  /**
   * @var array
   */
  protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'password'
  ];

  /**
   * @var array
   */
  protected $dates = [
    'created_at',
    'updated_at'
  ];

  /**
   * @var array
   */
  protected $hidden = [
    'password'
  ];

  /**
   * @var array
   */
  protected $with = ['roles'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function roles()
  {
    return $this->belongsToMany('App\Models\Role');
  }

}