<?php

namespace App\Transformers;

use App\Entities\Floor;
use League\Fractal\TransformerAbstract;

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
      'building_id' => $model->building_id,
      'building' => $model->building,
    ];
  }
}
