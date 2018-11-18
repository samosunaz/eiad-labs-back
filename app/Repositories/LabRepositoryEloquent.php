<?php

namespace App\Repositories;

use App\Entities\Lab;
use App\Presenters\LabPresenter;
use App\Validators\LabValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class LabRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LabRepositoryEloquent extends BaseRepository implements LabRepository
{

  protected $skipPresenter = true;

  /**
   * Specify Model class name
   *
   * @return string
   */
  public function model()
  {
    return Lab::class;
  }

  /**
   * Specify Validator class name
   *
   * @return mixed
   */
  public function validator()
  {

    return LabValidator::class;
  }


  /**
   * Boot up the repository, pushing criteria
   */
  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }

  public function presenter()
  {
    return LabPresenter::class;
  }

}
