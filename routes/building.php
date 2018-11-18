<?php
/**
 * @var \Laravel\Lumen\Routing\Router $router
 */
$router->group(['prefix' => 'buildings'], function () use ($router) {
  $router->group(['prefix' => ''], function () use ($router) {
    $router->get('', 'BuildingsController@index');
    $router->post('', 'BuildingController@store');
  });
  $router->group(['prefix' => '{building_id}'], function () use ($router) {
    $router->delete('', 'BuildingController@destroy');
    $router->get('', 'BuildingController@show');
    $router->put('', 'BuildingController@update');
  });
});