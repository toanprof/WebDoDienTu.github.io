<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('danh_mucs')->delete();

        DB::table('danh_mucs')->truncate();

        DB::table('danh_mucs')->insert([
            ['ma_danh_muc' => 'DT', 'ten_danh_muc' => 'Điện thoại', 'slug_danh_muc' => 'dien-thoai', 'id_danh_muc_cha' => 0, 'is_open' => 1, 'hinh_anh' => '/assets_client_new/images/dienthoai.png' ],
            ['ma_danh_muc' => 'LAP', 'ten_danh_muc' => 'Laptop', 'slug_danh_muc' => 'laptop', 'id_danh_muc_cha' => 0, 'is_open' => 1, 'hinh_anh' => '/assets_client_new/images/laptop.png' ],
            ['ma_danh_muc' => 'KEYB', 'ten_danh_muc' => 'Bàn phím', 'slug_danh_muc' => 'ban-phim', 'id_danh_muc_cha' => 0, 'is_open' => 1, 'hinh_anh' => '/assets_client_new/images/banphim.png' ],
            ['ma_danh_muc' => 'WATCH', 'ten_danh_muc' => 'Đồng hồ', 'slug_danh_muc' => 'dong-ho', 'id_danh_muc_cha' => 0, 'is_open' => 1, 'hinh_anh' => 'https://cdn.tgdd.vn/Files/2021/02/02/1324942/aw6_1200x630.jpg' ],
            ['ma_danh_muc' => 'HEADPH', 'ten_danh_muc' => 'Tai nghe', 'slug_danh_muc' => 'tai-nghe', 'id_danh_muc_cha' => 0, 'is_open' => 1, 'hinh_anh' => '' ],
            ['ma_danh_muc' => 'DTAPPLE', 'ten_danh_muc' => 'Điện thoại Apple', 'slug_danh_muc' => 'dien-thoai-apple', 'id_danh_muc_cha' => 1, 'is_open' => 1, 'hinh_anh' => '' ],
            ['ma_danh_muc' => 'DTSAMSUNG', 'ten_danh_muc' => 'Điện thoại SamSung', 'slug_danh_muc' => 'dien-thoai-samsung', 'id_danh_muc_cha' => 1, 'is_open' => 1, 'hinh_anh' => '' ],
            ['ma_danh_muc' => 'LAPASUS', 'ten_danh_muc' => 'Laptop Asus', 'slug_danh_muc' => 'laptop-asus', 'id_danh_muc_cha' => 2, 'is_open' => 1, 'hinh_anh' => '' ],
            ['ma_danh_muc' => 'LAPDELL', 'ten_danh_muc' => 'Laptop Dell', 'slug_danh_muc' => 'laptop-dell', 'id_danh_muc_cha' => 2, 'is_open' => 1, 'hinh_anh' => '' ],
            ['ma_danh_muc' => 'KEYBAKKO', 'ten_danh_muc' => 'Bàn phím Akko', 'slug_danh_muc' => 'ban-phim-akko', 'id_danh_muc_cha' => 3, 'is_open' => 1, 'hinh_anh' => '' ],
            ['ma_danh_muc' => 'KEYBRAZER', 'ten_danh_muc' => 'Bàn phím Razer', 'slug_danh_muc' => 'ban-phim-razer', 'id_danh_muc_cha' => 3, 'is_open' => 1, 'hinh_anh' => '' ],
            ['ma_danh_muc' => 'WATCHXIAOMI', 'ten_danh_muc' => 'Đồng hồ Xiaomi', 'slug_danh_muc' => 'dong-ho-xiaomi', 'id_danh_muc_cha' => 4, 'is_open' => 1, 'hinh_anh' => '' ],
            ['ma_danh_muc' => 'WATCHAPPLE', 'ten_danh_muc' => 'Đồng hồ Apple', 'slug_danh_muc' => 'dong-ho-apple', 'id_danh_muc_cha' => 4, 'is_open' => 1, 'hinh_anh' => '' ],
            ['ma_danh_muc' => 'HEADPHSONY', 'ten_danh_muc' => 'Tai nghe Sony', 'slug_danh_muc' => 'tai-nghe-sony', 'id_danh_muc_cha' => 5, 'is_open' => 1, 'hinh_anh' => '' ],
            ['ma_danh_muc' => 'HEADPHSÁMUNG', 'ten_danh_muc' => 'Tai nghe SamSung', 'slug_danh_muc' => 'tai-nghe-samsung', 'id_danh_muc_cha' => 5, 'is_open' => 1, 'hinh_anh' => '' ],
        ]);
    }
}
