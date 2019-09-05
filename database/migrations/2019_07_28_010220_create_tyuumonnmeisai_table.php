<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTyuumonnmeisaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyuumonnmeisai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tyuumonn_id');
            $table->integer('hannbaikai_id');
            $table->integer('sku_id');
            $table->integer('suuryou');
            $table->integer('zidou_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tyuumonnmeisai');
    }
}
