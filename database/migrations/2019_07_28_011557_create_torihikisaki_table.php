<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorihikisakiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torihikisaki', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('torihikisaki_name',50);
            $table->string('denwabanngou',30);
            $table->string('zyuusyo',50);
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
        Schema::dropIfExists('torihikisaki');
    }
}
