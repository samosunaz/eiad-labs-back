<?php

namespace App\Repositories;

use App\Entities\Material;
use App\Presenters\MaterialPresenter;
use App\Validators\MaterialValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class MaterialRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MaterialRepositoryEloquent extends BaseRepository implements MaterialRepository
{

  protected $skipPresenter = true;

  /**
   * Specify Model class name
   *
   * @return string
   */
  public function model()
  {
    return Material::class;
  }

  /**
   * Specify Validator class name
   *
   * @return mixed
   */
  public function validator()
  {

    return MaterialValidator::class;
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
    return MaterialPresenter::class;
  }

}
