<?php
/**
 * Created by PhpStorm.
 * User: samosunaz
 * Date: 11/17/18
 * Time: 6:37 PM
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
  public function run()
  {
    factory(\App\Entities\User::class)->create([
        'name' => 'Admin Admin',
        'email' => 'admin@admin.com',
        'password' => Hash::make('admin'),
        'role_id' => factory(\App\Entities\Role::class)->create(['type' => 'Admin'])->id
      ]
    );
    factory(\App\Entities\Role::class)->create([
      'type' => 'Encargado'
    ]);
    factory(\App\Entities\Role::class)->create([
      'type' => 'Lector'
    ]);
  }
}