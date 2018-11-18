<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Floor;

/**
 * Class FloorTransformer.
 *
 * @package namespace App\Transformers;
 */
class FloorTransformer extends TransformerAbstract
{
  /**
   * Transform the Floor entity.
   *
   * @param \App\Entities\Floor $model
   *
   * @return array
   */
  public function transform(Floor $model)
  {
    return [
      'id' => (int)$model->id,
      'name' => $model->name,
      'building' => $model->building->name,
    ];
  }
}
