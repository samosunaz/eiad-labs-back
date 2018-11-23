<?php
/**
 * @var \Laravel\Lumen\Routing\Router $router
 */
$router->group(['prefix' => 'materials'], function () use ($router) {
  $router->group(['prefix' => ''], function () use ($router) {
    $router->get('', 'MaterialsController@index');
    $router->post('', 'MaterialsController@store');
  });

  $router->group(['prefix' => '{material_id}'], function () use ($router) {
    $router->delete('', 'MaterialsController@destroy');
    $router->get('', 'MaterialsController@show');
    $router->put('', 'MaterialsController@update');
  });
});