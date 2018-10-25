<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('role_user', function (Blueprint $table) {
      $table->string('user_id');
      $table->string('role_id');
      $table->foreign('role_id')->references('id')->on('role')->onUpdate('cascade');
      $table->foreign('user_id')->references('id')->on('user')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('role_user');
    }
}
