<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuildingCreateRequest;
use App\Http\Requests\BuildingUpdateRequest;
use App\Repositories\BuildingRepository;
use App\Validators\BuildingValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class BuildingsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BuildingsController extends Controller
{
  /**
   * @var BuildingRepository
   */
  protected $repository;

  /**
   * @var BuildingValidator
   */
  protected $validator;

  /**
   * BuildingsController constructor.
   *
   * @param BuildingRepository $repository
   * @param BuildingValidator $validator
   */
  public function __construct(BuildingRepository $repository, BuildingValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    $buildings = $this->repository->all();

    return response()->json($buildings);

  }

  /**
   * Store a newly created resource in storage.
   *
   *
   * @param Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $building = $this->repository->create($request->all());

      return response()->json($building->presenter());

    } catch (ValidatorException $e) {

      return response()->json([
        'error' => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $building = $this->repository->find($id);

    return response()->json($building);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param  string $id
   *
   * @return Response
   */
  public function update(Request $request, $id)
  {
    try {
      
      $building = $this->repository->update($request->all(), $id);

      return response()->json($building->presenter());

    } catch (ValidatorException $e) {

      return response()->json([
        'error' => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   *
   * @return Response
   */
  public function destroy($id)
  {
    $deleted = $this->repository->delete($id);

    return response()->json($deleted);
  }
}
