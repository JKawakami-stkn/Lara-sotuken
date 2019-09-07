<?php

use Illuminate\Database\Seeder;

class MWfStaffPosiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('M_WF_STAFF_POSI')->insert([
            [
                'WC_CD' => '0014',				          				                     			
                'WF_CD' => '0001',
                'GP_CD' => '0037',
                'WF_YEAR' => 2019,
                'STAF_ID' => '20190730001400010002',
                'STAF_GP_FR_DT' => '2019/07/01',
                'CRE_DTTIME' => '2019/07/30 13:11:51',
                'UPD_DTTIME' => '2019/07/30 13:11:51',
                'UPD_ID' => 'ETCHSTAFF',
                'DAT_VALID_KBN' => 'Y',
                'DUTY_CD' => '06',
                'STAF_GP_TO_DT' => '1111/11/11 11:11:11', 
            ]
        ]);

    }
}
