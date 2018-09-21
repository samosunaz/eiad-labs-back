<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 20/09/18
 * Time: 19:12
 */

namespace App\Repositories;


class LabClassRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\LabClass';
    }
}