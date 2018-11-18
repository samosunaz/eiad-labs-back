<?php

/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 12/09/18
 * Time: 19:00
 */

namespace App\Http\Controllers;

use App\Entities\User;
use App\Repositories\UserRepository;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthenticationController extends Controller
{

  private $request;
  private $repository;

  public function __construct(Request $request, UserRepository $repository)
  {
    $this->request = $request;
    $this->repository = $repository;
  }

  public function getAuthenticatedUser()
  {
    return $this->request->auth->presenter();
  }

  public function authenticate()
  {
    $this->validate($this->request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);

    $user = $this->repository->findWhere([
      'email' => $this->request->get('email')
    ])->first();

    if (!$user) {
      throw new NotFoundHttpException();
    }

    if (Hash::check($this->request->get('password'), $user->password)) {
      return response()->json(
        [
          'token' => $this->jwt($user),
          'user' => $user->presenter()
        ]
      );
    }

    throw new UnauthorizedHttpException('');
  }

  private function jwt(User $user)
  {
    $payload = [
      'iss' => 'lumen-jwt',
      'sub' => $user->id,
      'iat' => time(),
      'exp' => time() + 60 * 60
    ];

    return JWT::encode($payload, env('JWT_KEY'));
  }

}