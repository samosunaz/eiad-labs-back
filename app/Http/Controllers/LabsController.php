<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabCreateRequest;
use App\Http\Requests\LabUpdateRequest;
use App\Repositories\LabRepository;
use App\Validators\LabValidator;
use Illuminate\Http\Request;
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

    return response()->json($labs);
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
      $lab = $this->repository->create($request->all());

      return response()->json($lab);

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

    return response()->json($lab);
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

      return response()->json($lab->presenter());

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

    return response()->json($deleted);
  }
}
