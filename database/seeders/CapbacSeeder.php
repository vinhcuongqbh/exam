<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapbacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('capbacs')->insert([
            [
            	'idcapbac' => 1,
                'tencapbac' => 'Quản trị',               
            ],
            [
                'idcapbac' => 2,
                'tencapbac' => 'Thí sinh',               
            ],          
        ]);
    }
}
