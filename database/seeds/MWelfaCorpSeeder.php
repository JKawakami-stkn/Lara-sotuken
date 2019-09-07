<?php

use Illuminate\Database\Seeder;

class MWelfaCorpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('M_WELFA_CORP')->insert([
            [
                'WC_CD' => '0000',                 			
                'CRE_DTTIME' => '2009/06/04',
                'UPD_DTTIME' => '2009/06/04',
                'UPD_ID' => '000000000001' ,
                'DAT_VALID_KBN' => 'Y',
                'WC_NM' => '社会福祉法人 音羽福祉会',
                'WC_NM_BS64' => 'null'
            ],

            [
                'WC_CD' => '0014',	                 			
                'CRE_DTTIME' => '2017/09/25 14:23:00.590',
                'UPD_DTTIME' => '2017/09/25 14:23:00.590',
                'UPD_ID' => 'ETCHEADM',
                'DAT_VALID_KBN' => 'Y',
                'WC_NM' => '株式会社イートン',
                'WC_NM_BS64' => 'null',
            ]
        ]);
        
        
    }


    /*
    
    
    */ 
}
