<?php
/**@var $router \Laravel\Lumen\Routing\Router */
$router->group(['prefix' => 'materials'], function () use ($router) {
  $router->get('', 'MaterialController@all');
  $router->get('/{material_id}', 'MaterialController@findById');
});