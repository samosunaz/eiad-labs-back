<?php
/** @var $router \Laravel\Lumen\Routing\Router */
$router->group(['prefix' => 'floors'], function () use ($router) {
  $router->group(['prefix' => '{floor_id}'], function () use ($router) {
    $router->get('', 'FloorsController@index');
    $router->post('', 'FloorsController@store');
  });
  $router->group(['prefix' => '{floor_id}'], function () use ($router) {
    $router->delete('', 'FloorsController@destroy');
    $router->get('', 'FloorsController@show');
    $router->put('', 'FloorsController@update');
  });
});