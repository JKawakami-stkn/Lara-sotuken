<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullAbleSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //nullを許可する
        Schema::table('sku', function (Blueprint $table) {
            $table->string('saizu')->nullable()->change();
            $table->string('color')->nullable()->change();

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
        Schema::table('sku', function (Blueprint $table) {
          $table->string('saizu')->change();
          $table->string('color')->change();
        });
    }
}
