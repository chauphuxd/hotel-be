<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phongs')->delete();

        DB::table('phongs')->insert([
            ['id' => '1', 'ten_phong' => 'Phòng 203', 'gia_mac_dinh' => '300000', 'tinh_trang' => '1', 'id_loai_phong' => '1' ],
            ['id' => '2', 'ten_phong' => 'Phòng 204', 'gia_mac_dinh' => '400000', 'tinh_trang' => '1', 'id_loai_phong' => '1' ],
            ['id' => '3', 'ten_phong' => 'Phòng 205', 'gia_mac_dinh' => '500000', 'tinh_trang' => '1', 'id_loai_phong' => '1' ],
            ['id' => '4', 'ten_phong' => 'Phòng 303', 'gia_mac_dinh' => '300000', 'tinh_trang' => '1', 'id_loai_phong' => '2' ],
            ['id' => '5', 'ten_phong' => 'Phòng 304', 'gia_mac_dinh' => '400000', 'tinh_trang' => '1', 'id_loai_phong' => '2' ],
            ['id' => '6', 'ten_phong' => 'Phòng 305', 'gia_mac_dinh' => '400000', 'tinh_trang' => '1', 'id_loai_phong' => '2' ],
            ['id' => '7', 'ten_phong' => 'Phòng 401', 'gia_mac_dinh' => '300000', 'tinh_trang' => '1', 'id_loai_phong' => '3' ],
            ['id' => '8', 'ten_phong' => 'Phòng 402', 'gia_mac_dinh' => '400000', 'tinh_trang' => '1', 'id_loai_phong' => '3' ],
            ['id' => '9', 'ten_phong' => 'Phòng 403', 'gia_mac_dinh' => '400000', 'tinh_trang' => '1', 'id_loai_phong' => '3' ],
            ['id' => '10', 'ten_phong' => 'Phòng 404', 'gia_mac_dinh' => '500000', 'tinh_trang' => '1', 'id_loai_phong' => '3' ],
            ['id' => '11', 'ten_phong' => 'Phòng 405', 'gia_mac_dinh' => '500000', 'tinh_trang' => '1', 'id_loai_phong' => '3' ],
            ['id' => '12', 'ten_phong' => 'Phòng 505', 'gia_mac_dinh' => '300000', 'tinh_trang' => '1', 'id_loai_phong' => '4' ],
            ['id' => '13', 'ten_phong' => 'Phòng 505', 'gia_mac_dinh' => '500000', 'tinh_trang' => '0', 'id_loai_phong' => '4' ],
            ['id' => '14', 'ten_phong' => 'Phòng 505', 'gia_mac_dinh' => '500000', 'tinh_trang' => '1', 'id_loai_phong' => '4' ],
            ['id' => '15', 'ten_phong' => 'Phòng 605', 'gia_mac_dinh' => '500000', 'tinh_trang' => '1', 'id_loai_phong' => '5' ],
            ['id' => '16', 'ten_phong' => 'Phòng 605', 'gia_mac_dinh' => '500000', 'tinh_trang' => '1', 'id_loai_phong' => '5' ],
            ['id' => '17', 'ten_phong' => 'Phòng 705', 'gia_mac_dinh' => '200000', 'tinh_trang' => '1', 'id_loai_phong' => '6' ],
            ['id' => '18', 'ten_phong' => 'Phòng 705', 'gia_mac_dinh' => '200000', 'tinh_trang' => '1', 'id_loai_phong' => '6' ],
            ['id' => '19', 'ten_phong' => 'Phòng 705', 'gia_mac_dinh' => '500000', 'tinh_trang' => '1', 'id_loai_phong' => '6' ],
        ]);
    }
}
