<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
  /**
   * @var UserRepository
   */
  protected $repository;

  /**
   * @var UserValidator
   */
  protected $validator;

  /**
   * UsersController constructor.
   *
   * @param UserRepository $repository
   * @param UserValidator $validator
   */
  public function __construct(UserRepository $repository, UserValidator $validator)
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
    $users = $this->repository->all();

    return response()->json($users);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  UserCreateRequest $request
   *
   * @return \Illuminate\Http\Response
   *
   */
  public function store(UserCreateRequest $request)
  {
    try {

      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $user = $this->repository->create($request->all());

      return response()->json($user->presenter());

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
    $user = $this->repository->find($id);

    return response()->json($user->presenter());
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  UserUpdateRequest $request
   * @param  string $id
   *
   * @return \Illuminate\Http\Response
   *
   */
  public function update(UserUpdateRequest $request, $id)
  {
    try {

      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $user = $this->repository->update($request->all(), $id);

      return response()->json($user->presenter());
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
