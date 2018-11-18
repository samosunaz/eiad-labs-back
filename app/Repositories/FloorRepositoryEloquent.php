<?php

namespace App\Repositories;

use App\Entities\Floor;
use App\Presenters\FloorPresenter;
use App\Validators\FloorValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class FloorRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FloorRepositoryEloquent extends BaseRepository implements FloorRepository
{

  protected $skipPresenter = true;

  /**
   * Specify Model class name
   *
   * @return string
   */
  public function model()
  {
    return Floor::class;
  }

  /**
   * Specify Validator class name
   *
   * @return mixed
   */
  public function validator()
  {

    return FloorValidator::class;
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
    return FloorPresenter::class;
  }
}
