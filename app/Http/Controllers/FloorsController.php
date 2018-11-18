<?php

namespace App\Http\Controllers;

use App\Http\Requests\FloorCreateRequest;
use App\Http\Requests\FloorUpdateRequest;
use App\Repositories\FloorRepository;
use App\Validators\FloorValidator;
use Illuminate\Http\Response;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class FloorsController.
 *
 * @package namespace App\Http\Controllers;
 */
class FloorsController extends Controller
{
  /**
   * @var FloorRepository
   */
  protected $repository;

  /**
   * @var FloorValidator
   */
  protected $validator;

  /**
   * FloorsController constructor.
   *
   * @param FloorRepository $repository
   * @param FloorValidator $validator
   */
  public function __construct(FloorRepository $repository, FloorValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
    $floors = $this->repository->all();


    return response()->json($floors);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  FloorCreateRequest $request
   *
   * @return Response
   *
   */
  public function store(FloorCreateRequest $request)
  {
    try {

      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $floor = $this->repository->create($request->all());

      return response()->json($floor->presenter());

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
    $floor = $this->repository->find($id);

    return response()->json($floor);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  FloorUpdateRequest $request
   * @param  string $id
   *
   * @return Response
   *
   */
  public function update(FloorUpdateRequest $request, $id)
  {
    try {

      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $floor = $this->repository->update($request->all(), $id);

      return response()->json($floor->presenter());

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
