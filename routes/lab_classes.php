<?php
/**
 * @var \Laravel\Lumen\Routing\Router $router
 */
$router->group(['prefix' => 'lab_classes'], function () use ($router) {
  $router->group(['prefix' => ''], function () use ($router) {
    $router->get('', 'LabClassesController@index');
    $router->post('', 'LabClassesController@store');
  });

  $router->group(['prefix' => '{lab_class_id}'], function () use ($router) {
    $router->delete('', 'LabClassesController@destroy');
    $router->get('', 'LabClassesController@show');
    $router->put('', 'LabClassesController@update');
  });
});