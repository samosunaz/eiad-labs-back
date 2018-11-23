<?php
/**
 * @var $router \Laravel\Lumen\Routing\Router
 */
$router->group(['prefix' => 'auth'], function () use ($router) {
  $router->post('/login', 'AuthenticationController@authenticate');
  $router->get('/authenticated_user', [
    'middleware' => 'jwt.auth',
    'uses' => 'AuthenticationController@getAuthenticatedUser'
  ]);
});