<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Role;

/**
 * Class RoleTransformer.
 *
 * @package namespace App\Transformers;
 */
class RoleTransformer extends TransformerAbstract
{
  /**
   * Transform the Role entity.
   *
   * @param \App\Entities\Role $model
   *
   * @return array
   */
  public function transform(Role $model)
  {
    return [
      'id' => (int)$model->id,
      'type' => $model->type,
    ];
  }
}
