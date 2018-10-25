<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('lab', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->int('active')->default(0);
      $table->integer('floor_id');
      $table->int('user_id')->default(1);
      $table->timestamps();
      $table->foreign('floor_id')->references('id')->on('floor')->onUpdate('cascade');
      $table->foreign('user_id')->references('id')->on('user');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab');
    }
}
