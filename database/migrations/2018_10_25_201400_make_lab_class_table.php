<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeLabClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('lab_class', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->time('starts_at');
      $table->time('ends_at')->nullable();
      $table->string('days');
      $table->integer('lab_id')->unsigned();
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
        Schema::dropIfExists('lab_class');
    }
}
