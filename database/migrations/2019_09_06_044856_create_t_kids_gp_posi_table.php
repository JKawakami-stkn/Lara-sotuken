<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTKidsGpPosiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_KIDS_GP_POSI', function (Blueprint $table) {
            $table->char('KIDS_ID', 30)->nullable(false);
            $table->char('WC_CD', 4)->nullable(false);
            $table->char('WF_CD', 4)->nullable(false);
            $table->char('GP_CD', 4)->nullable(false);
            $table->integer('WF_YEAR')->nullable(false);
            $table->date('KIDS_GP_FR_DT')->nullable(false);
            $table->timestamp('CRE_DTTIME')->nullable(false)->useCurrent();
            $table->timestamp('UPD_DTTIME')->nullable(false)->useCurrent();
            $table->char('UPD_ID', 30)->nullable(false);
            $table->char('DAT_VALID_KBN', 1)->default('Y')->nullable(false);
            $table->date('KIDS_GP_TO_DT')->nullable(false);
            $table->primary(['KIDS_ID','WC_CD','WF_CD','GP_CD','WF_YEAR','KIDS_GP_FR_DT'])
            ->name('t_kids_gp_posi_kids_id_wc_cd_wf_cd_gp_cd_wf_year_kids_gp_fr_dt_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('T_KIDS_GP_POSI');
    }
}
