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
            ['id' => '1', 'ten_chuc_nang' => 'Lấy Danh Sách Các Loại Phòng'],
            ['id' => '2', 'ten_chuc_nang' => 'Tạo Mới Loại Phòng'],
            ['id' => '3', 'ten_chuc_nang' => 'Xóa Loại Phòng'],
            ['id' => '4', 'ten_chuc_nang' => 'Cập Nhật Loại Phòng'],
            ['id' => '5', 'ten_chuc_nang' => 'Lấy Danh Sách Các Dịch Vụ'],
            ['id' => '6', 'ten_chuc_nang' => 'Tạo Mới Dịch Vụ'],
            ['id' => '7', 'ten_chuc_nang' => 'Xóa Dịch Vụ'],
            ['id' => '8', 'ten_chuc_nang' => 'Cập Nhật Dịch Vụ'],
            ['id' => '9', 'ten_chuc_nang' => 'Lấy Danh Sách Các Phòng'],
            ['id' => '10', 'ten_chuc_nang' => 'Tạo Mới Phòng'],
            ['id' => '11', 'ten_chuc_nang' => 'Xóa Phòng'],
            ['id' => '12', 'ten_chuc_nang' => 'Cập Nhật Phòng'],
            ['id' => '13', 'ten_chuc_nang' => 'Lấy Danh Sách Nhân Viên'],
            ['id' => '14', 'ten_chuc_nang' => 'Tạo Mới Nhân Viên'],
            ['id' => '15', 'ten_chuc_nang' => 'Xóa Nhân Viên'],
            ['id' => '16', 'ten_chuc_nang' => 'Cập Nhật Nhân Viên'],
            ['id' => '17', 'ten_chuc_nang' => 'Lấy Danh Sách Slide'],
            ['id' => '18', 'ten_chuc_nang' => 'Tạo Mới Slide'],
            ['id' => '19', 'ten_chuc_nang' => 'Cập Nhật Slide'],
            ['id' => '20', 'ten_chuc_nang' => 'Xóa Slide'],
            ['id' => '21', 'ten_chuc_nang' => 'Lấy Danh Sách Review'],
            ['id' => '22', 'ten_chuc_nang' => 'Tạo Mới Review'],
            ['id' => '23', 'ten_chuc_nang' => 'Cập Nhật Review'],
            ['id' => '24', 'ten_chuc_nang' => 'Xóa Review'],
            ['id' => '25', 'ten_chuc_nang' => 'Lấy Danh Sách Phân Quyền'],
            ['id' => '26', 'ten_chuc_nang' => 'Tạo Mới Phân Quyền'],
            ['id' => '27', 'ten_chuc_nang' => 'Cập Nhật Phân Quyền'],
            ['id' => '28', 'ten_chuc_nang' => 'Xóa Phân Quyền'],
            ['id' => '29', 'ten_chuc_nang' => 'Lấy Danh Sách Chức Năng'],
        ]);
    }
}
