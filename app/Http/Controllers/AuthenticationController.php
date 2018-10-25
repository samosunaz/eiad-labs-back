<?php

/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 12/09/18
 * Time: 19:00
 */

namespace App\Http\Controllers;

use App\Repositories\BuildingRepository;
use App\Repositories\Repository;
use App\Repositories\UserRepository;
use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthenticationController extends Controller
{

  protected $request;
  protected $building;

  public function __construct(Request $request, UserRepository $repository)
  {
    parent::__construct($request, $repository);
  }

  public function login()
  {
    $body = $this->request->all();
    $email = $body['email'];
    $password = $body['password'];

    $user = $this->repository->findBy('email', $email)->first();
    if (!$user) {
      throw new UnauthorizedHttpException('');
    }

    if ($user->password != $password) {
      throw new UnauthorizedHttpException('');
    }

    $token = JWT::encode($user, getenv('JWT_KEY'), getenv('JWT_ALGO'));


    $payload = [
      'token' => $token,
      '$user' => $user
    ];

    return new Response($payload, Response::HTTP_OK);
  }

  public function authenticate()
  {
    $body = $this->request->all();
    if (!$body->jwt) {
      throw new UnauthorizedHttpException('');
    }

    $jwt = $body->jwt;

    try {
      $decoded = JWT::decode($jwt, getenv('JWT_KEY'), [getenv('JWT_ALGO')]);
      if ($decoded->id) {
        $user = $this->repository->find($decoded->id);
      }
    } catch (SignatureInvalidException $exception) {
      throw new UnauthorizedHttpException('');
    }
    return new Response($user, Response::HTTP_OK);
  }
}