<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 13/09/18
 * Time: 09:40
 */

namespace App\Repositories;


class LabRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Lab';
    }
}