<?php

use Illuminate\Database\Seeder;

class KubunnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('kubunn')->insert([
        [
          'kubunn_name' => '寝具',
          'delete' => 1
        ],
        [
          'kubunn_name' => '衣類',
          'delete' => 1
        ],
        [
          'kubunn_name' => 'ノート',
          'delete' => 1
        ],
        [
          'kubunn_name' => '筆記用具',
          'delete' => 1
        ],
        [
          'kubunn_name' => '教具',
          'delete' => 1
        ],
        [
          'kubunn_name' => 'その他',
          'delete' => 1
        ]

      ]);
    }
}
