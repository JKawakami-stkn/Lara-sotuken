<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMWfStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_WF_STAFF', function (Blueprint $table) {
          $table->char('STAF_ID',30)->nullable(false);
          $table->timestamp('CRE_DTTIME')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(false);
          $table->timestamp('UPD_DTTIME')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(false);
          $table->char('UPD_ID',30)->nullable(false);
          $table->char('DAT_VALID_KBN',1)->default('Y')->nullable(false);
          $table->char('STAF_NM_KJ',100)->nullable(false);
          $table->char('STAF_NM_KN',100)->nullable(false);

          $table->primary('STAF_ID');


        });
    }
    /*
    職員
create table FUKUSHI.M_WF_STAFF (
STAF_ID CHARACTER(30) not null/
, CRE_DTTIME TIMESTAMP not null/
, UPD_DTTIME TIMESTAMP not null/
, UPD_ID CHARACTER(30) not null/
, DAT_VALID_KBN VARCHAR(1) default 'Y' not null/
, USER_CD CHARACTER(10) default NULL
, STAF_NM_KJ VARCHAR(100) not null
, STAF_NM_KN VARCHAR(100) not null
, STAF_BIR_DT DATE default NULL
, STAF_SEX CHARACTER(1) default NULL
, STAF_ADR VARCHAR(600) default NULL
, STAF_TEL CHARACTER(13) default NULL
, BK_ACNT_NUM_BK_CD CHARACTER(4) default NULL
, BK_ACNT_NUM_ROUT_NUM CHARACTER(3) default NULL
, BK_ACNT_NUM_CLS CHARACTER(1) default NULL
, BK_ACNT_NUM CHARACTER(7) default NULL
, BK_ACNT_NUM_NM_KJ VARCHAR(100) default NULL
, BK_ACNT_NUM_NM_KN VARCHAR(100) default NULL
, YU_ACNT_NUM_CD CHARACTER(7) default NULL
, YU_ACNT_NUM CHARACTER(8) default NULL
, YU_ACNT_NUM_NM_KJ VARCHAR(100) default NULL
, YU_ACNT_NUM_NM_KN VARCHAR(100) default NULL
, STAF_CD VARCHAR(30) default NULL
, POST_T3_CD CHARACTER(3) default NULL
, POST_B4_CD CHARACTER(4) default NULL
, TDFK_CD CHARACTER(2) default NULL
, SKCS_CD CHARACTER(5) default NULL
, ADD_DETAL1 VARCHAR(200) default NULL
, ADD_DETAL2 VARCHAR(100) default NULL
, TRNSF_FR_DT DATE default NULL
, TRNSF_TO_DT DATE default NULL
, STAF_MEMO VARCHAR(600) default NULL
, E_MAIL_ADR VARCHAR(100) default NULL
, STAF_INITIAL VARCHAR(10) default NULL
, primary key (STAF_ID)
);


    */



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('M_WF_STAFF');
    }
}
