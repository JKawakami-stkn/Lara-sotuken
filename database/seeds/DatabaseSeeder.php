<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        // エラーが出たら[ composer dump-autoload ]
        
        KubunnSeeder::class,
        MkidsSeeder::class,
        TKidsGpPosiSeeder::class,
        MWfGroupSeeder::class,

      ]);
    }
}
