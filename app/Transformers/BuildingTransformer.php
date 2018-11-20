<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Building;

/**
 * Class BuildingTransformer.
 *
 * @package namespace App\Transformers;
 */
class BuildingTransformer extends TransformerAbstract
{
  /**
   * Transform the Building entity.
   *
   * @param \App\Entities\Building $model
   *
   * @return array
   */
  public function transform(Building $model)
  {
    return [
      'id' => (int)$model->id,
      'name' => $model->name,
      'floors' => $model->floors,
    ];
  }
}
