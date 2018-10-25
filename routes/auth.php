<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 10/18/18
 * Time: 8:52 PM
 */

/**@var $router \Laravel\Lumen\Routing\Router */
$router->group(['prefix' => 'auth'], function () use ($router) {
  $router->post('/authenticate', 'AuthenticationController@authenticate');
  $router->post('/login', 'AuthenticationController@login');
});