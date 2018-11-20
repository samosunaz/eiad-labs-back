<?php

namespace App\Repositories;

use App\Presenters\MemoPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MemoRepository;
use App\Entities\Memo;
use App\Validators\MemoValidator;

/**
 * Class MemoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MemoRepositoryEloquent extends BaseRepository implements MemoRepository
{

  protected $fieldSearchable = [
    'status'
  ];
  /**
   * Specify Model class name
   *
   * @return string
   */
  public function model()
  {
    return Memo::class;
  }

  /**
   * Specify Validator class name
   *
   * @return mixed
   */
  public function validator()
  {

    return MemoValidator::class;
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
    return MemoPresenter::class;
  }

}
