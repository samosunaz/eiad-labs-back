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
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
