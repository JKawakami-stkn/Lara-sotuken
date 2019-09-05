<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnnjiKumiSyozokuJouhouTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('園児所属情報', function (Blueprint $table) {
        $table->integer('園児ID');
        $table->integer('法人コード');
        $table->integer('園コード');
        $table->integer('組コード');
        $table->integer('園年度');
        $table->date('所属開始日付');
        $table->date('所属終了日付')->nullable($value = true);
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
