<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phongs')->insert([
            [
            	'idphong' => 1,
                'tenphong' => 'Phòng Kế hoạch Tổng hợp',               
            ],
            [
            	'idphong' => 2,
                'tenphong' => 'Phòng Kỹ thuật Thẩm định',               
            ],   
            [
            	'idphong' => 3,
                'tenphong' => 'Phòng Điều hành Dự án 1',               
            ],
            [
            	'idphong' => 4,
                'tenphong' => 'Phòng Điều hành Dự án 2',               
            ],       
        ]);
    }
}
