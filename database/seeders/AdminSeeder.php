<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        DB::table('admins')->truncate();

        DB::table('admins')->insert([
            ['ho_lot' => 'Nguyen Van', 'ten' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('123123'), 'so_dien_thoai' => 1231231231, 'gioi_tinh' => 0, 'is_master' => 1, 'is_block' => 0],
        ]);
    }
}
