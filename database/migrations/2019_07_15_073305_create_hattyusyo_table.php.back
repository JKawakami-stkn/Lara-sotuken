<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHattyusyoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hattyusyo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hattyusyo_id');
            $table->integer('sku_id');
            $table->integer('suuryou');
            $table->integer('torihikisaki_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hattyusyo');
    }
}
