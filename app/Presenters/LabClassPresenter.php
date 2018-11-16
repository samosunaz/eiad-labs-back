<?php

namespace App\Presenters;

use App\Transformers\LabClassTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LabClassPresenter.
 *
 * @package namespace App\Presenters;
 */
class LabClassPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LabClassTransformer();
    }
}
