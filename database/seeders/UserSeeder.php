<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'ngaysinh' => Carbon::create(1989,3,19),
                'idphong' => 2,
                'email' => 'admin.sgtvt@quangbinh.gov.vn',
                'password' => Hash::make('sgtvt2021'),
                'password2' => 'sgtvt2021',
                'idcapbac' => 1,
                'trangthai' => 1,
            ],
            [
                'name' => 'Ngô Đức Thịnh',
                'ngaysinh' => Carbon::create(1984,8,20),
                'idphong' => 2,
                'email' => 'thinhnd.sgtvt@quangbinh.gov.vn',
                'password' => Hash::make('sgtvt2021'),
                'password2' => 'sgtvt2021',
                'idcapbac' => 1,
                'trangthai' => 1,
            ],
            [
                'name' => 'Tester',
                'ngaysinh' => Carbon::create(1990,1,1),
                'idphong' => 1,
                'email' => 'tester.sgtvt@quangbinh.gov.vn',
                'password' => Hash::make('12345678'),
                'password2' => '12345678',
                'idcapbac' => 2,
                'trangthai' => 1,
            ],            
        ]);
    }
}
