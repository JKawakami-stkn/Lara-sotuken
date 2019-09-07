<?php

use Illuminate\Database\Seeder;

class MWelfaFacilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('M_WELFA_FACIL')->insert([
            [

                'WC_CD' => '0014',				                     
                'WF_CD' => '0001',
                'CRE_DTTIME' => '2017/09/25 14:23:12.574',
                'UPD_DTTIME' => '2017/09/25 14:23:12.574',
                'UPD_ID' => 'ETCHEADM',
                'DAT_VALID_KBN' => 'Y',
                'KIDS_GP_TO_DT' => '1111/11/11 11:11:11.111',
                'WF_NM' => 'イートンちどり保育園'

            ]
        
        ]);

    }
}
