<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reservation', function (Blueprint $table) {
      $table->increments('id');
      $table->string('material_id');
      $table->integer('student_id')->unsigned();
      $table->string('status');
      $table->timestamp('starts_at');
      $table->timestamp('ends_at');
      $table->timestamps();
      $table->foreign('material_id')->references('id')->on('material');
      $table->foreign('student_id')->references('id')->on('user');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('reservation');
    }
}
