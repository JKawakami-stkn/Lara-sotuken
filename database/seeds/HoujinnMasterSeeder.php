<?php

use Illuminate\Database\Seeder;

class HoujinnMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('法人マスタ')->insert([
        [
          '法人コード' => 1,
          '法人名称' => "イートン"
        ]


      ]);
    }
}
