<?php

$router->group(['prefix' => 'floors'], function () use ($router) {
  $router->get('', 'FloorController@all');
  $router->get('/{floor_id}', 'FloorController@findById');
});