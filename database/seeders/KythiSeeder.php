<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KythiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kythis')->insert([
            [
                'idkythi' => 1,
                'tenkythi' => 'Kỳ thi năm 2020',
                'trangthai' => '1',
            ],
            [
                'idkythi' => 2,
                'tenkythi' => 'Kỳ thi năm 2021',
                'trangthai' => '1',
            ]
        ]);
    }
}
