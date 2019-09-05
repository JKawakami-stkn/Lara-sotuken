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
        KumiSeeder::class,
        KubunnSeeder::class,

        EnnjiMasterSeeder::class,
        EnnjiKumiSyozokuJouhou2018Seeder::class,
        EnnjiKumiSyozokuJouhou2019Seeder::class,
        KumiMasterSeeder::class,
        SyokuinnMasterSeeder::class,
        SyokuinnSyozokuJouhouSeeder::class,
        HoujinnMasterSeeder::class,
        EnnMasterSeeder::class

      ]);
    }
}
