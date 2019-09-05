<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMWfStaffPosiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_WF_STAFF_POSI', function (Blueprint $table) {
          $table->char('WC_CD',4)->nullable(false);
          $table->char('WF_CD',4)->nullable(false);
          $table->char('GP_CD',4)->nullable(false);
          $table->integer('WF_YEAR',4)->nullable(false);
          $table->char('STAF_ID',30)->nullable(false);
          $table->date('STAF_GP_FR_DT')->nullable(false);
          $table->timestamp('CRE_DTTIME')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(false);
          $table->timestamp('UPD_DTTIME')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(false);
          $table->char('UPD_ID',30)->nullable(false);
          $table->char('DAT_VALID_KBN',1)->default('Y')->nullable(false);
          $table->char('DUTY_CD',2)->nullable(false);
          $table->date('STAF_GP_TO_DT')->nullable(false);

          $table->primary(['WC_CD','WF_CD','GP_CD','WF_YEAR','STAF_ID','STAF_GP_FR_DT'])
          ->name('m_wf_staff_posi_wc_cd_wf_cd_gp_cd_wf_year_staf_id_staf_gp_fr_dt_primary');
        });
    }

    /*
    create table FUKUSHI.M_WF_STAFF_POSI (
WC_CD CHARACTER(4) not null/
, WF_CD CHARACTER(4) not null/
, GP_CD CHARACTER(4) not null/
, WF_YEAR INTEGER not null/
, STAF_ID CHARACTER(30) not null/
, STAF_GP_FR_DT DATE not null/
, CRE_DTTIME TIMESTAMP not null/
, UPD_DTTIME TIMESTAMP not null/
, UPD_ID CHARACTER(30) not null/
, DAT_VALID_KBN CHARACTER(1) default 'Y' not null/
, DUTY_CD CHARACTER(2) not null/
, STAF_GP_TO_DT DATE default NULL/
, primary key (WC_CD,WF_CD,GP_CD,WF_YEAR,STAF_ID,STAF_GP_FR_DT)
);




    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('M_WF_STAFF_POSI');
    }
}
