<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chuc_nangs')->delete();

        DB::table('chuc_nangs')->truncate();

        DB::table('chuc_nangs')->insert([
            ["id" => 1, "ten_chuc_nang" => "Xem Thông Tin Loại Phòng"],
            ["id" => 2, "ten_chuc_nang" => "Tạo Mới Loại Phòng"],
            ["id" => 3, "ten_chuc_nang" => "Tìm Kiếm Loại Phòng"],
            ["id" => 4, "ten_chuc_nang" => "Xoá Loại Phòng"],
            ["id" => 5, "ten_chuc_nang" => "Cập Nhật Loại Phòng"],
            ["id" => 6, "ten_chuc_nang" => "Thay Đổi Trạng Thái Loại Phòng"],
            ["id" => 7, "ten_chuc_nang" => "Xem Thông Tin Dịch Vụ"],
            ["id" => 8, "ten_chuc_nang" => "Tạo Mới Dịch Vụ"],
            ["id" => 9, "ten_chuc_nang" => "Xoá Dịch Vụ"],
            ["id" => 10, "ten_chuc_nang" => "Cập Nhật Dịch Vụ"],
            ["id" => 11, "ten_chuc_nang" => "Đổi Trạng Thái Dịch Vụ"],
            ["id" => 12, "ten_chuc_nang" => "Tìm Kiếm Dịch Vụ"],
        ]);
    }
}
