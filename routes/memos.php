<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 11/19/18
 * Time: 5:49 PM
 */

/**
 * @var \Laravel\Lumen\Routing\Router $router
 */

$router->group(['prefix' => 'memos'], function() use ($router){

  $router->group(['prefix' => ''], function () use ($router) {
    $router->get('', 'MemosController@index');
    $router->post('', 'MemosController@store');
  });

  $router->group(['prefix' => '{memo_id}'], function() use ($router){

  });

});