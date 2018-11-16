<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LabClassRepository;
use App\Entities\LabClass;
use App\Validators\LabClassValidator;

/**
 * Class LabClassRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LabClassRepositoryEloquent extends BaseRepository implements LabClassRepository
{
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
    
}
