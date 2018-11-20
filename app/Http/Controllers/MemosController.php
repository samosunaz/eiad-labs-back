<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MemoCreateRequest;
use App\Http\Requests\MemoUpdateRequest;
use App\Repositories\MemoRepository;
use App\Validators\MemoValidator;

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

    if (request()->wantsJson()) {

      return response()->json([
        'data' => $memo,
      ]);
    }

    return view('memos.show', compact('memo'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $memo = $this->repository->find($id);

    return view('memos.edit', compact('memo'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  MemoUpdateRequest $request
   * @param  string $id
   *
   * @return Response
   *
   * @throws \Prettus\Validator\Exceptions\ValidatorException
   */
  public function update(MemoUpdateRequest $request, $id)
  {
    try {

      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $memo = $this->repository->update($request->all(), $id);

      $response = [
        'message' => 'Memo updated.',
        'data' => $memo->toArray(),
      ];

      if ($request->wantsJson()) {

        return response()->json($response);
      }

      return redirect()->back()->with('message', $response['message']);
    } catch (ValidatorException $e) {

      if ($request->wantsJson()) {

        return response()->json([
          'error' => true,
          'message' => $e->getMessageBag()
        ]);
      }

      return redirect()->back()->withErrors($e->getMessageBag())->withInput();
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
