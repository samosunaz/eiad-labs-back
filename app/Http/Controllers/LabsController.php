<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabCreateRequest;
use App\Http\Requests\LabUpdateRequest;
use App\Repositories\LabRepository;
use App\Validators\LabValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class LabsController.
 *
 * @package namespace App\Http\Controllers;
 */
class LabsController extends Controller
{
  /**
   * @var LabRepository
   */
  protected $repository;

  /**
   * @var LabValidator
   */
  protected $validator;

  /**
   * LabsController constructor.
   *
   * @param LabRepository $repository
   * @param LabValidator $validator
   */
  public function __construct(LabRepository $repository, LabValidator $validator)
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
    $labs = $this->repository->all();

    return response()->json([
      'data' => $labs,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  LabCreateRequest $request
   *
   * @return \Illuminate\Http\Response
   *
   */
  public function store(LabCreateRequest $request)
  {
    try {

      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $lab = $this->repository->create($request->all());

      $response = [
        'message' => 'Lab created.',
        'data' => $lab->toArray(),
      ];

      return response()->json($response);

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
    $lab = $this->repository->find($id);

    return response()->json([
      'data' => $lab,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  LabUpdateRequest $request
   * @param  string $id
   *
   * @return \Illuminate\Http\Response
   *
   */
  public function update(LabUpdateRequest $request, $id)
  {
    try {

      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $lab = $this->repository->update($request->all(), $id);

      $response = [
        'message' => 'Lab updated.',
        'data' => $lab->toArray(),
      ];

      return response()->json($response);

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
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $deleted = $this->repository->delete($id);

    return response()->json([
      'message' => 'Lab deleted.',
      'deleted' => $deleted,
    ]);
  }
}
