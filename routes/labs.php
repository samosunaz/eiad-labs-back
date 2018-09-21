<?php

$router->group(['prefix' => 'labs'], function () use ($router) {
    $router->get('', 'LabsController@all');
    $router->get('/{lab_id}', 'LabsController@findById');
});