<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeFloorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('floor', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->integer('active')->default(0);
      $table->timestamps();
      $table->integer('building_id')->unsigned();
      $table->foreign('building_id')->references('id')->on('building');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('floor');
    }
}
