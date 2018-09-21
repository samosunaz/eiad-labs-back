<?php

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('', 'UsersController@all');
    $router->get('/{user_id}', 'UsersController@findById');
});