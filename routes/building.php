<?php
/**
 * @var \Laravel\Lumen\Routing\Router $router
 */
$router->group(['prefix' => 'buildings'], function () use ($router) {
  $router->group(['prefix' => ''], function () use ($router) {
    $router->get('', 'BuildingsController@index');
    $router->post('', 'BuildingsController@store');
  });
  $router->group(['prefix' => '{building_id}'], function () use ($router) {
    $router->delete('', 'BuildingsController@destroy');
    $router->get('', 'BuildingsController@show');
    $router->put('', 'BuildingsController@update');
  });
});