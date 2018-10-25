<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('material', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('brand');
      $table->string('model');
      $table->string('description')->nullable();
      $table->int('lab_id');
      $table->timestamps();
      $table->foreign('lab_id')->references('id')->on('lab');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('material');
    }
}
