<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTyuumonnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyuumonn', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hannbaikai_id');
            $table->integer('zidou_id');
            $table->integer('goukeikinngaku');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tyuumonn');
    }
}
