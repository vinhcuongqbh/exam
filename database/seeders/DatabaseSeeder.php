<?php

namespace Database\Seeders;

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
            CapbacSeeder::class,
            PhongSeeder::class,
            //KythiSeeder::class,
            //UserSeeder::class,
            //CauhoiSeeder::class,
        ]);
    }
}