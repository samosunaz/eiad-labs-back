<?php

namespace App\Presenters;

use App\Transformers\FloorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FloorPresenter.
 *
 * @package namespace App\Presenters;
 */
class FloorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FloorTransformer();
    }
}
