<?php

$router->group(['prefix' => 'labs'], function () use ($router) {
    $router->get('', 'LabController@all');
    $router->get('/{lab_id}', 'LabController@findById');
});