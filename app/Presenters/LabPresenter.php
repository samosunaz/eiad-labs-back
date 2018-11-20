<?php

namespace App\Presenters;

use App\Transformers\LabTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LabPresenter.
 *
 * @package namespace App\Presenters;
 */
class LabPresenter extends FractalPresenter
{
  /**
   * Transformer
   *
   * @return \League\Fractal\TransformerAbstract
   */
  public function getTransformer()
  {
    return new LabTransformer();
  }
}
