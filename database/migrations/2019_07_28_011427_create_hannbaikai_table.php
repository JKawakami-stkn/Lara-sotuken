<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHannbaikaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hannbaikai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hannbaikai_name',30);
            $table->date('sakuseibi');
            $table->date('simekiri');
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
        Schema::dropIfExists('hanbaikai');
    }
}
