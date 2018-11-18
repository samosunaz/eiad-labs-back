<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\User;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
  /**
   * Transform the User entity.
   *
   * @param \App\Entities\User $model
   *
   * @return array
   */
  public function transform(User $model)
  {
    return [
      'id' => (int)$model->id,
      'name' => $model->name,
      'email' => $model->email,
      'role' => $model->role->type,

      /* place your other model properties here */
    ];
  }
}
