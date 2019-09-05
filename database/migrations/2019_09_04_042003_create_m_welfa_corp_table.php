<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMWelfaCorpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('M_WELFA_CORP', function (Blueprint $table) {
            $table->char('WC_CD',4)->nullable(false);
            $table->timestamp('CRE_DTTIME')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
            $table->timestamp('UPD_DTTIME')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
            $table->char('UPD_ID',30)->nullable(false);
            $table->char('DAT_VALID_KBN',1)->default('Y')->nullable(false);
            $table->string('WC_NM',100)->nullable(false);
            $table->string('WC_NM_BS64',150)->nullable(false);
            $table->primary('WC_CD');



        });
    }
    /*
    WC_CD CHARACTER(4) not null
 , CRE_DTTIME TIMESTAMP not null
 , UPD_DTTIME TIMESTAMP not null
 , UPD_ID CHARACTER(30) not null
 , DAT_VALID_KBN CHARACTER(1) default 'Y' not null
 , WC_NM VARCHAR(100) not null
 , WC_NM_BS64 VARCHAR(150) default NULL
 , primary key (WC_CD)
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('M_WELFA_CORP');
    }
}
