<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 12/09/18
 * Time: 19:00
 */

namespace App\Http\Controllers;

use App\Repositories\BuildingRepository;
use Illuminate\Http\Request;

class BuildingController extends Controller
{

    protected $request;
    protected $building;

    public function __construct(Request $request, BuildingRepository $building)
    {
        parent::__construct($request, $building);
    }

    public function add()
    {
        return parent::add();
    }

    public function all()
    {
        return parent::all();
    }

    public function delete($id)
    {
        return parent::delete($id);
    }

    public function findById($id)
    {
        return parent::findById($id);
    }
}