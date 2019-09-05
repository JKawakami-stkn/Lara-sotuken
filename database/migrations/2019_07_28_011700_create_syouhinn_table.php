<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSyouhinnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syouhinn', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('syouhinn_name', 30);
            $table->integer('tannka');
            $table->integer('kubunn_id');
            $table->integer('torihikisaki_id');
            $table->boolean('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('syouhinn');
    }
}
