<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 20/09/18
 * Time: 19:03
 */

namespace App\Http\Controllers;


use App\Repositories\Repository;
use Illuminate\Http\Request;

class LabClassController extends Controller
{
    public function __construct(Request $request, LabClassRepository $repository)
    {
        parent::__construct($request, $repository);
    }
}