<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Memo;

/**
 * Class MemoTransformer.
 *
 * @package namespace App\Transformers;
 */
class MemoTransformer extends TransformerAbstract
{

  protected $availableIncludes = [
    'material'
  ];

  /**
   * Transform the Memo entity.
   *
   * @param \App\Entities\Memo $model
   *
   * @return array
   */
  public function transform(Memo $model)
  {
    return [
      'id' => (int)$model->id,
      'title' => $model->student_id . '-' . $model->id,
      'start' => $model->starts_at,
      'end' => $model->ends_at,
      'status' => $model->status,
      'student_id' => $model->student_id,
      'student_name' => $model->student_name,
      'student_email' => $model->student_email,
      'color' => $model->status === 'approved' ? 'green' : 'orange'
    ];
  }

  public function includeMaterial(Memo $memo)
  {
    return $this->item($memo->material, new MaterialTransformer);
  }
}
