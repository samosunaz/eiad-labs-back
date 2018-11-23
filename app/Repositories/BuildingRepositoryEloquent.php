<?php

namespace App\Repositories;

use App\Entities\Building;
use App\Presenters\BuildingPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class BuildingRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BuildingRepositoryEloquent extends BaseRepository implements BuildingRepository
{

  protected $skipPresenter = true;

  /**
   * Specify Model class name
   *
   * @return string
   */
  public function model()
  {
    return Building::class;
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
    return BuildingPresenter::class;
  }

}
