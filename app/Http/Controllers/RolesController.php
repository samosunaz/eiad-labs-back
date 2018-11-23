<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Repositories\RoleRepository;
use App\Validators\RoleValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class RolesController.
 *
 * @package namespace App\Http\Controllers;
 */
class RolesController extends Controller
{
  /**
   * @var RoleRepository
   */
  protected $repository;

  /**
   * @var RoleValidator
   */
  protected $validator;

  /**
   * RolesController constructor.
   *
   * @param RoleRepository $repository
   * @param RoleValidator $validator
   */
  public function __construct(RoleRepository $repository, RoleValidator $validator)
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
    $roles = $this->repository->all();
    return response()->json($roles);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  RoleCreateRequest $request
   *
   * @return \Illuminate\Http\Response
   *
   */
  public function store(RoleCreateRequest $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $role = $this->repository->create($request->all());

      return response()->json($role->presenter());

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
    $role = $this->repository->find($id);

    return response()->json($role->presenter());
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  RoleUpdateRequest $request
   * @param  string $id
   *
   * @return \Illuminate\Http\Response
   *
   */
  public function update(RoleUpdateRequest $request, $id)
  {
    try {

      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $role = $this->repository->update($request->all(), $id);

      return response()->json($role->presenter());

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

  public function users($id)
  {
    return $this->repository->find($id)->users;
  }
}
