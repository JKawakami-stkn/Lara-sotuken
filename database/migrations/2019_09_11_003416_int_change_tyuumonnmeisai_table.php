<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IntChangeTyuumonnmeisaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tyuumonnmeisai', function (Blueprint $table) {
            $table->string('zidou_id')->change();
            // $table->char('zidou_id', 30)->change();
            $table->boolean('h_flg');
            $table->dropColumn('tyuumonn_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //ロールバック時にしてもらう処理を記述
        Schema::table('tyuumonnmeisai', function (Blueprint $table) {
            $table->integer('zidou_id')->change();
            $table->dropColumn('h-flg');
            $table->integer('tyuumonn_id');
        });
    }
}
