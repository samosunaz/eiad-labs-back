<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 20/09/18
 * Time: 19:18
 */

namespace App\Repositories;


class RoleRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        // TODO: Implement model() method.
        return 'App\Models\Role';
    }
}