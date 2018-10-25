<?php
/**@var $router \Laravel\Lumen\Routing\Router */
$router->group(['prefix' => 'labs'], function () use ($router) {
  $router->get('', 'LabController@all');

  $router->group(['prefix' => '{lab_id}'], function () use ($router) {
    $router->get('', 'LabController@findById');

    $router->get('/classes', 'LabController@classes');

    $router->get('/materials', 'LabController@materials');
  });
});