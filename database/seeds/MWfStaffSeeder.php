<?php

use Illuminate\Database\Seeder;

class MWfStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('M_WF_STAFF')->insert([
            [
                'STAF_ID' => '20180816100000010001', 
                'CRE_DTTIME' => '2018/08/15 20:57:47',
                'UPD_DTTIME' => '2018/08/16 12:10:21',
                'UPD_ID' => 'OTWA0001',
                'DAT_VALID_KBN' => 'Y',
                'STAF_NM_KJ' => '音羽　太郎',
                'STAF_NM_KN' => 'おとわ　たろう',
            ],
            [
                'STAF_ID' => '20190730001400010001',		
                'CRE_DTTIME' => '2019/07/30 13:10:06',
                'UPD_DTTIME' => '2019/07/30 13:10:06',
                'UPD_ID' => 'ETCHSTAFF',
                'DAT_VALID_KBN' => 'Y',
                'STAF_NM_KJ' => '田中　花子',
                'STAF_NM_KN' => 'たなか　はなこ',
            ]
        ]);
    }
}
