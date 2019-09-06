<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKumiMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('組マスタ', function (Blueprint $table) {
        $table->integer('法人コード');
        $table->integer('園コード');
        $table->integer('組コード');
        $table->integer('園年度');
        $table->string('組名称', 30);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
