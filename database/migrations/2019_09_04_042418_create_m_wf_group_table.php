<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMWfGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_WF_GROUP', function (Blueprint $table) {
          $table->char('WC_CD',4)->nullable(false);
          $table->char('WF_CD',4)->nullable(false);
          #$table->char('GP_CD',4)->nullable(false);
          $table->integer('id')->nullable(false);
          $table->integer('WF_YEAR')->nullable(false);
          $table->timestamp('CRE_DTTIME')->nullable(false)->useCurrent();
          $table->timestamp('UPD_DTTIME')->nullable(false)->useCurrent();
          $table->char('UPD_ID',30)->nullable(false);
          $table->char('DAT_VALID_KBN',1)->default('Y')->nullable(false);
          $table->string('GP_NM',60)->nullable(false);
          $table->string('GP_AGE_KBN',3)->nullable(true);

          $table->primary(['WC_CD','WF_CD','GP_CD','WF_YEAR']);
        });
    }
    /*
    組
create table FUKUSHI.M_WF_GROUP (
 WC_CD CHARACTER(4) not null/
 , WF_CD CHARACTER(4) not null/
 , GP_CD CHARACTER(4) not null/
 , WF_YEAR INTEGER not null/
 , CRE_DTTIME TIMESTAMP not null/
 , UPD_DTTIME TIMESTAMP not null/
 , UPD_ID CHARACTER(30) not null/
 , DAT_VALID_KBN CHARACTER(1) default 'Y' not null/
 , GP_NM VARCHAR(60) not null/
 , GP_AGE_KBN VARCHAR(3) not null/
 , CLR_ID VARCHAR(30) default NULL
 , IMPL_GR_IN_MAIL_KBN CHARACTER(1) default NULL
 , IMPL_GR_OUT_MAIL_KBN CHARACTER(1) default NULL
 , WF_DAYS_AUT_CRE_FLG CHARACTER(1) default '1'
 , IMPL_BRG_FMLY_KBN CHARACTER(1) default NULL
 , IMPL_BED_AWK_TIME_KBN CHARACTER(1) default NULL
 , IMPL_LCK_SLP_KBN CHARACTER(1) default NULL
 , IMPL_BRKFST_KBN CHARACTER(1) default NULL
 , IMPL_DFCTN_KBN CHARACTER(1) default NULL
 , IMPL_POOL_KBN CHARACTER(1) default NULL
 , IMPL_TPER_KBN CHARACTER(1) default NULL
 , IMPL_CNDT_KBN CHARACTER(1) default NULL
 , IMPL_PICK_UP_TIME_KBN CHARACTER(1) default NULL
 , IMPL_PICK_UP_FMLY_KBN CHARACTER(1) default NULL
 , IMPL_PICK_UPJ_FMLY_KBN CHARACTER(1) default NULL
 , IMPL_SNC_KBN CHARACTER(1) default NULL
 , IMPL_CARE_STD_IN_KBN CHARACTER(1) default NULL
 , IMPL_SPLSH_KBN CHARACTER(1) default NULL
 , IMPL_SHWR_KBN CHARACTER(1) default NULL
 , IMPL_POOL2_KBN CHARACTER(1) default NULL
 , IMPL_SPLSH2_KBN CHARACTER(1) default NULL
 , IMPL_SHWR2_KBN CHARACTER(1) default NULL
 , IMPL_BBY_FOOD_KBN CHARACTER(1) default NULL
 , MTHLY_SNC_LST_KBN CHARACTER(1) default NULL
 , GP_NM_SRT VARCHAR(60) default NULL
 , AFTN_SLP_CHK_TIME TIME default NULL
 , primary key (WC_CD,WF_CD,GP_CD,WF_YEAR)
);


    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('M_WF_GROUP');
    }
}
