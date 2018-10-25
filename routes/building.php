<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 12/09/18
 * Time: 19:03
 */

$router->group(['prefix' => 'buildings'], function () use ($router) {

  $router->group(['prefix' => ''], function () use ($router) {
    $router->get('', 'BuildingController@all');
    $router->post('', 'BuildingController@create');
  });

  $router->group(['prefix' => '{building_id}'], function () use ($router) {
    $router->get('', 'BuildingController@findById');
    $router->delete('', 'BuildingController@delete');
  });
});