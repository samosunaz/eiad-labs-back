<?php

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('', 'UserController@all');
    $router->post('', 'UserController@add');
    $router->get('/{user_id}', 'UserController@findById');
});