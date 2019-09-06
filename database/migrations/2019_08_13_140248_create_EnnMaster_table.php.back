<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnnMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('園マスタ', function (Blueprint $table) {
        $table->integer('法人コード');
        $table->integer('園コード');
        $table->integer('都道府県コード');
        $table->integer('市区町村コード');
        $table->string('住所', 30);
        $table->string('電話番号', 30);
        $table->string('メールアドレス一般', 30);
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
