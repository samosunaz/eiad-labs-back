<?php

namespace App\Repositories;

use App\Entities\LabClass;
use App\Presenters\LabClassPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class LabClassRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LabClassRepositoryEloquent extends BaseRepository implements LabClassRepository
{

  protected $skipPresenter = true;

  /**
   * Specify Model class name
   *
   * @return string
   */
  public function model()
  {
    return LabClass::class;
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
    return LabClassPresenter::class;
  }

}
