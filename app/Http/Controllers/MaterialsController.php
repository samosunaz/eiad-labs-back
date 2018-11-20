<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialCreateRequest;
use App\Http\Requests\MaterialUpdateRequest;
use App\Repositories\MaterialRepository;
use App\Validators\MaterialValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class MaterialsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MaterialsController extends Controller
{
  /**
   * @var MaterialRepository
   */
  protected $repository;

  /**
   * @var MaterialValidator
   */
  protected $validator;

  /**
   * MaterialsController constructor.
   *
   * @param MaterialRepository $repository
   * @param MaterialValidator $validator
   */
  public function __construct(MaterialRepository $repository, MaterialValidator $validator)
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
    $materials = $this->repository->all();

    return response()->json($materials);
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

      $material = $this->repository->create($request->all());

      return response()->json($material->presenter());
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
    $material = $this->repository->find($id);

    return response()->json($material->presenter());
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param  string $id
   *
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    try {

      $material = $this->repository->update($request->all(), $id);

      return response()->json($material->presenter());

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

  public function materials($id, $status)
  {
    $material = $this->repository->find($id);
    $reservations = $material->reservations;
    return response()->json($reservations);
  }
}
