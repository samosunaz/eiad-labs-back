<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 12/09/18
 * Time: 16:52
 */

namespace App\Repositories;


class BuildingRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Building';
    }
}