<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemoUpdateRequest;
use App\Repositories\MemoRepository;
use App\Validators\MemoValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class MemosController.
 *
 * @package namespace App\Http\Controllers;
 */
class MemosController extends Controller
{
  /**
   * @var MemoRepository
   */
  protected $repository;

  /**
   * @var MemoValidator
   */
  protected $validator;

  /**
   * MemosController constructor.
   *
   * @param MemoRepository $repository
   * @param MemoValidator $validator
   */
  public function __construct(MemoRepository $repository, MemoValidator $validator)
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
    $memos = $this->repository->all();

    return response()->json($memos);
  }

  /**
   * Store a newly created resource in storage.
   *
   *
   * @param Request $request
   * @return \Illuminate\Http\Response
   *
   */
  public function store(Request $request)
  {
    try {

      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $memo = $this->repository->create(array_merge($request->all(), ['status' => 'pending']));

      return response()->json($memo);

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
    $memo = $this->repository->find($id);

    return response()->json($memo);
  }

  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param  string $id
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $memo = $this->repository->update($request->all(), $id);

      return response()->json($memo);

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

    if (request()->wantsJson()) {

      return response()->json([
        'message' => 'Memo deleted.',
        'deleted' => $deleted,
      ]);
    }

    return redirect()->back()->with('message', 'Memo deleted.');
  }
}
