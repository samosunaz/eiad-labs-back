<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 11/17/18
 * Time: 5:42 PM
 */

namespace App\Providers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RouteRegistryServiceProvider extends ServiceProvider
{
  private $routesDir = __DIR__ . '/../../routes';


  public function boot()
  {
    $this->parseRouteFiles();
  }

  private function parseRouteFiles()
  {
    $routeFiles = scandir($this->routesDir);
    $this->app->router->group([
      'namespace' => 'App\Http\Controllers'
    ], function ($router) use ($routeFiles) {
      for ($i = 2; $i < sizeof($routeFiles); $i++) {
        require_once $this->routesDir . '/' . $routeFiles[$i];
      };
    });
  }
}