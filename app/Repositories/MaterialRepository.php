<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 20/09/18
 * Time: 21:10
 */

namespace App\Repositories;


class MaterialRepository extends Repository
{

  /**
   * Specify Model class name
   *
   * @return mixed
   */
  function model()
  {
    // TODO: Implement model() method.
    return 'App\Models\Material';
  }
}