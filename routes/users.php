<?php

/**
 * @var \Laravel\Lumen\Routing\Router $router
 */
$router->group(['prefix' => 'users'], function () use ($router) {
  $router->group(['prefix' => ''], function () use ($router) {
    $router->get('', 'UsersController@index');
    $router->post('', 'UsersController@store');
  });
  $router->group(['prefix' => '{user_id}'], function () use ($router) {
    $router->delete('', 'UsersController@destroy');
    $router->get('', 'UsersController@show');
    $router->put('', 'UsersController@update');
  });
});