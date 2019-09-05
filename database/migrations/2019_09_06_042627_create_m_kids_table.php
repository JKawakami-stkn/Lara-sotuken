<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_KIDS', function (Blueprint $table) {

            $table->char('KIDS_ID', 30)->nullable(false);
            $table->timestamp('CRE_DTTIME')->useCurrent();
            $table->timestamp('UPD_DTTIME')->useCurrent();
            $table->char('UPD_ID', 30)->nullable(false);
            $table->char('DAT_VALID_KBN', 1)->default('Y')->nullable(false);
            $table->char('LEDG_NUM', 30)->nullable(false);
            $table->char('KIDS_NM_KJ', 100)->nullable(false);
            $table->char('KIDS_NM_KN', 100)->nullable(false);
            $table->date('KIDS_BIR_DT')->nullable(false);
            $table->char('KIDS_SEX', 1)->nullable(false);
            $table->integer('KIDS_AGE')->nullable(false);
            $table->integer('KIDS_AGE_MONTH')->nullable(false);
            $table->char('KIDS_AGE_KBN', 3)->nullable(false);
            $table->primary('KIDS_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('M_KIDS');
    }
}
