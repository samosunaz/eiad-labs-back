<?php

namespace App\Transformers;

use App\Entities\Memo;
use League\Fractal\ParamBag;
use League\Fractal\TransformerAbstract;
use App\Entities\Material;

/**
 * Class MaterialTransformer.
 *
 * @package namespace App\Transformers;
 */
class MaterialTransformer extends TransformerAbstract
{
  protected $availableIncludes = [
    'memos'
  ];

  /**
   * Transform the Material entity.
   *
   * @param \App\Entities\Material $model
   *
   * @return array
   */
  public function transform(Material $model)
  {
    return [
      'id' => $model->id,
      'name' => $model->name,
      'brand' => $model->brand,
      'model' => $model->model,
      'lab_id' => $model->lab_id,
    ];
  }

  public function includeMemos(Material $material, ParamBag $params = null)
  {
    if (is_null($params)) {
      return $this->collection($material->memos, new MemoTransformer);
    }
    list($searchCol, $searchBy) = $params->get('search');

    $memos = $material->memos()->where($searchCol, $searchBy)->get();

    return $this->collection($memos, new MemoTransformer);
  }
}
