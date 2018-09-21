<?php

$router->group(['prefix' => 'lab_classes'], function () use ($router) {
    $router->get('', 'LabClassesController@all');
    $router->get('/{class_id}', 'LabClassesController@findById');
});