<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabClassCreateRequest;
use App\Http\Requests\LabClassUpdateRequest;
use App\Repositories\LabClassRepository;
use App\Validators\LabClassValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class LabClassesController.
 *
 * @package namespace App\Http\Controllers;
 */
class LabClassesController extends Controller
{
  /**
   * @var LabClassRepository
   */
  protected $repository;

  /**
   * @var LabClassValidator
   */
  protected $validator;

  /**
   * LabClassesController constructor.
   *
   * @param LabClassRepository $repository
   * @param LabClassValidator $validator
   */
  public function __construct(LabClassRepository $repository, LabClassValidator $validator)
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
    $labClasses = $this->repository->all();

    return response()->json($labClasses);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  LabClassCreateRequest $request
   *
   * @return \Illuminate\Http\Response
   *
   */
  public function store(LabClassCreateRequest $request)
  {
    try {

      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $labClass = $this->repository->create($request->all());

      return response()->json($labClass->presenter());

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
    $labClass = $this->repository->find($id);

    return response()->json($labClass->presenter());
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  LabClassUpdateRequest $request
   * @param  string $id
   *
   * @return \Illuminate\Http\Response
   *
   */
  public function update(LabClassUpdateRequest $request, $id)
  {
    try {

      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $labClass = $this->repository->update($request->all(), $id);

      return response()->json($labClass->presenter());

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
