<?php

namespace App\Presenters;

use App\Transformers\BuildingTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BuildingPresenter.
 *
 * @package namespace App\Presenters;
 */
class BuildingPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BuildingTransformer();
    }
}
