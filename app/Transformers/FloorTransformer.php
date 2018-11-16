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
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
