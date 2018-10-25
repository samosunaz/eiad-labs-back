<?php
/** @var $router \Laravel\Lumen\Routing\Router */
$router->group(['prefix' => 'floors'], function () use ($router) {

  $router->get('', 'FloorController@all');

  $router->group(['prefix' => '{floor_id}'], function () use ($router) {
    $router->get('', 'FloorController@findById');

    $router->get('/labs', 'FloorController@labs');
  });
});