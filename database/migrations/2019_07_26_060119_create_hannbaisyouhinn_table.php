<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHannbaisyouhinnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hannbaisyouhinn', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('syouhinn_id');
            $table->integer('hannbaikai_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hanbaiyouhinn');
    }
}
