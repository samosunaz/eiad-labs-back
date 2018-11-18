<?php
/**
 * @var \Laravel\Lumen\Routing\Router $router
 */
$router->group(['prefix' => 'labs'], function () use ($router) {
  $router->group(['prefix' => ''], function () use ($router) {
    $router->get('', 'LabsController@index');
    $router->post('', 'LabsController@store');
  });

  $router->group(['prefix' => '{lab_id}'], function () use ($router) {
    $router->delete('', 'LabsController@destroy');
    $router->get('', 'LabsController@show');
    $router->put('', 'LabsController@update');
  });
});