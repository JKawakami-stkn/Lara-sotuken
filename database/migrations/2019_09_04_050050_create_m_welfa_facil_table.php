<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMWelfaFacilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_welfa_facil', function (Blueprint $table) {

            $table->char('WC_CD', 4)->nullable(false);
            $table->char('WF_CD', 4)->nullable(false);
            $table->timestamp('CRE_DTTIME')->useCurrent();
            $table->timestamp('UPD_DTTIME')->useCurrent();
            $table->char('UPD_ID', 30)->nullable(false);
            $table->char('DAT_VALID_KBN', 1)->default('Y')->nullable(false);
            $table->date('KIDS_GP_TO_DT')->nullable(false);
            $table->char('WF_NM', 100)->nullable(false);
            $table->primary(['WC_CD','WF_CD']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_welfa_facil');
    }
}
