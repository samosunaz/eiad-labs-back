<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 11/17/18
 * Time: 8:20 PM
 */

namespace App\Http\Middleware;


use App\Presenters\UserPresenter;
use App\Repositories\UserRepository;
use Closure;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class JwtMiddleware
{

  private $userRepository;

  public function __construct(UserRepository $repository)
  {
    $this->userRepository = $repository;
    $this->userRepository->setPresenter(UserPresenter::class);
  }

  public function handle(Request $request, Closure $next)
  {
    if (!$request->hasHeader('Authorization')) {
      throw new UnauthorizedHttpException('');
    }
    $auth = $request->headers->get('Authorization');
    $components = explode(' ', $auth);
    if (sizeof($components) !== 2) {
      throw new UnauthorizedHttpException('');
    }

    $token = $components[1];

    try {
      $credentials = JWT::decode($token, env('JWT_KEY'), [env('JWT_ALGO')]);
    } catch (ExpiredException $exception) {
      throw new UnauthorizedHttpException('', 'Token is expired');
    } catch (\Exception $exception) {
      throw new BadRequestHttpException('An error ocurred while decoding token');
    }

    $user = $this->userRepository->find($credentials->sub);

    $request->auth = $user;

    return $next($request);
  }
}