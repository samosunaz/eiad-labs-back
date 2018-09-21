<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Controller extends BaseController
{
    protected $repository;
    protected $request;

    public function __construct(Request $request, Repository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    public function add()
    {
        $modelToAdd = $this->request->all();
        try {
            $newModel = $this->repository->create($modelToAdd);
        } catch (\Exception $exception) {
            throw new BadRequestHttpException($exception->getMessage());
        }
        return new Response($newModel, Response::HTTP_CREATED);
    }

    public function all()
    {
        $models = $this->repository->all();
        return new Response($models, Response::HTTP_OK);
    }

    public function delete($id)
    {
        $model = $this->repository->find($id);
        if (!$model) {
            throw new NotFoundHttpException('Recurso no encontrado');
        }
        try {
            $model->delete();
        } catch (\Exception $exception) {
            throw new BadRequestHttpException($exception->getMessage());
        }
        return new Response(null, Response::HTTP_NO_CONTENT);
    }


    public function findById($id)
    {
        $model = $this->repository->find($id);
        if (!$model) {
            throw new NotFoundHttpException('Recurso no encontrado');
        }
        return new Response($model, Response::HTTP_OK);
    }

}
