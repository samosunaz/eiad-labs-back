<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Lab;

/**
 * Class LabTransformer.
 *
 * @package namespace App\Transformers;
 */
class LabTransformer extends TransformerAbstract
{
  protected $defaultIncludes = [
    'classes'
  ];

  /**
   * Transform the Lab entity.
   *
   * @param \App\Entities\Lab $model
   *
   * @return array
   */
  public function transform(Lab $model)
  {
    return [
      'id' => (int)$model->id,
      'name' => $model->name,
      'floor' => $model->floor->name,
      'building' => $model->floor->building->name,
      'classes' => $model->labClasses,
      'materials' => $model->materials

      /* place your other model properties here */
    ];
  }

  public function includeClasses(Lab $model)
  {
    $classes = $model->classes;

    return $this->collection($classes, new LabClassTransformer);
  }
}
