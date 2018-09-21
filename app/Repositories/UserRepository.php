<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 20/09/18
 * Time: 19:17
 */

namespace App\Repositories;


class UserRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        // TODO: Implement model() method.
        return 'App\Models\User';
    }
}