<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\LabClass;

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
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
