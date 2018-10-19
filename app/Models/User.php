<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 20/09/18
 * Time: 19:13
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{

  protected $table = 'user';

  protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'password'
  ];

  protected $hidden = [
    'password'
  ];

  protected $with = ['roles'];

  public function roles()
  {
    return $this->belongsToMany('App\Models\Role');
  }

}