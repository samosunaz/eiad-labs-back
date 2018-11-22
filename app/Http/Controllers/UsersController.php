<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Presenters\MemoPresenter;
use App\Repositories\UserRepository;
use App\Transformers\MemoTransformer;
use App\Validators\UserValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
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
   *
   * @param Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $userData = $request->all();
      $userData['password'] = Hash::make($userData['password']);

      $user = $this->repository->create($userData);

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

  public function materials($id)
  {
    return response()->json($this->repository->find($id)->materials);
  }

  public function memos(Request $request, $id)
  {
    $status = $request->query->get('status') ?? '';
    $materials = $this->repository->find($id)->materials()
      ->whereHas('memos', function ($query) use ($status) {
        return $query->where('status', 'like', $status);
      })
      ->get()
      ->pluck('memos')
      ->flatten();

    $col = new \League\Fractal\Resource\Collection($materials, new MemoTransformer);
    $fractal = new Manager();
    $fractal->parseIncludes('material');
    $data = $fractal->createData($col);
    return response()->json($data->toArray());
  }
}
