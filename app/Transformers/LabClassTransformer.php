<?php

namespace App\Transformers;

use App\Entities\LabClass;
use League\Fractal\TransformerAbstract;

/**
 * Class LabClassTransformer.
 *
 * @package namespace App\Transformers;
 */
class LabClassTransformer extends TransformerAbstract
{
  /**
   * Transform the LabClass entity.
   *
   * @param \App\Entities\LabClass $model
   *
   * @return array
   */
  public function transform(LabClass $model)
  {
    return [
      'id' => (int)$model->id,
      'title' => $model->name,
      'lab_id' => $model->lab_id,
      'dow' => explode(',', $model->days),
      'start' => $model->starts_at,
      'end' => $model->ends_at,
      'color' => 'gray'
    ];
  }
}
