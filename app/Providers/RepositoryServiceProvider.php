<?php

namespace App\Providers;

use App\Entities\Floor;
use App\Entities\LabClass;
use App\Entities\Material;
use App\Repositories\BuildingRepository;
use App\Repositories\BuildingRepositoryEloquent;
use App\Repositories\FloorRepository;
use App\Repositories\FloorRepositoryEloquent;
use App\Repositories\LabClassRepository;
use App\Repositories\LabClassRepositoryEloquent;
use App\Repositories\LabRepository;
use App\Repositories\LabRepositoryEloquent;
use App\Repositories\MaterialRepository;
use App\Repositories\MaterialRepositoryEloquent;
use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryEloquent;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
    App::bind(BuildingRepository::class, BuildingRepositoryEloquent::class);
    App::bind(FloorRepository::class, FloorRepositoryEloquent::class);
    App::bind(LabRepository::class, LabRepositoryEloquent::class);
    App::bind(LabClassRepository::class, LabClassRepositoryEloquent::class);
    App::bind(MaterialRepository::class, MaterialRepositoryEloquent::class);
    App::bind(RoleRepository::class, RoleRepositoryEloquent::class);
    App::bind(UserRepository::class, UserRepositoryEloquent::class);
  }
}