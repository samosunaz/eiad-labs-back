<?php
/**
 * @var \Laravel\Lumen\Routing\Router $router
 */
$router->group(['prefix' => 'roles'], function () use ($router) {
  $router->group(['prefix' => ''], function () use ($router) {
    $router->get('', 'RolesController@index');
    $router->post('', 'RolesController@store');
  });
  $router->group(['prefix' => '{role_id}'], function () use ($router) {
    $router->delete('', 'RolesController@destroy');
    $router->get('', 'RolesController@show');
    $router->put('', 'RolesController@update');
  });
});
