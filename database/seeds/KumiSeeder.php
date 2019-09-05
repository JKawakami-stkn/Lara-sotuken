<?php

use Illuminate\Database\Seeder;

class KumiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('kumi')->insert([
        [
          'kumi_name' => 'ちゅーりっぷ　1組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'ちゅーりっぷ　2組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'ちゅーりっぷ　3組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'ばら　1組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'ばら　2組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'ばら　3組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'さくら　1組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'さくら　2組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'さくら　3組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'たんぽぽ　1組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'たんぽぽ　2組'
          ,'delete' => 1
        ],
        [
          'kumi_name' => 'たんぽぽ　3組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'あじさい　1組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'あじさい　2組',
          'delete' => 1
        ],
        [
          'kumi_name' => 'すみれ　1組'
          ,'delete' => 1
        ],
        [
          'kumi_name' => 'すみれ　2組',
          'delete' => 1
        ]

      ]);
    }
}
