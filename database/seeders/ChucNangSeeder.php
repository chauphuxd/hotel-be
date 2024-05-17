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
            ['id' => '1', 'ten_chuc_nang' => 'Lấy Danh Sách Loại Phòng'],
            ['id' => '2', 'ten_chuc_nang' => 'Tạo Mới Loại Phòng'],
            ['id' => '3', 'ten_chuc_nang' => 'Xóa Loại Phòng'],
            ['id' => '4', 'ten_chuc_nang' => 'Cập Nhật Loại Phòng'],
            ['id' => '5', 'ten_chuc_nang' => 'Đổi Trạng Thái Loại Phòng'],
            ['id' => '6', 'ten_chuc_nang' => 'Lấy Danh Sách Dịch Vụ'],
            ['id' => '7', 'ten_chuc_nang' => 'Tạo Mới Dịch Vụ'],
            ['id' => '8', 'ten_chuc_nang' => 'Xóa Dịch Vụ'],
            ['id' => '9', 'ten_chuc_nang' => 'Cập Nhật Dịch Vụ'],
            ['id' => '10', 'ten_chuc_nang' => 'Đổi Trạng Thái Dịch Vụ'],
            ['id' => '11', 'ten_chuc_nang' => 'Lấy Danh Sách Phòng'],
            ['id' => '12', 'ten_chuc_nang' => 'Tạo Mới Phòng'],
            ['id' => '13', 'ten_chuc_nang' => 'Xóa Phòng'],
            ['id' => '14', 'ten_chuc_nang' => 'Cập Nhật Phòng'],
            ['id' => '15', 'ten_chuc_nang' => 'Đổi Trạng Thái Phòng'],
            ['id' => '16', 'ten_chuc_nang' => 'Lấy Danh Sách Nhân Viên'],
            ['id' => '17', 'ten_chuc_nang' => 'Tạo Mới Nhân Viên'],
            ['id' => '18', 'ten_chuc_nang' => 'Xóa Nhân Viên'],
            ['id' => '19', 'ten_chuc_nang' => 'Cập Nhật Nhân Viên'],
            ['id' => '20', 'ten_chuc_nang' => 'Đổi Trạng Thái Nhân Viên'],
            ['id' => '21', 'ten_chuc_nang' => 'Lấy Danh Sách Slide'],
            ['id' => '22', 'ten_chuc_nang' => 'Tạo Mới Slide'],
            ['id' => '23', 'ten_chuc_nang' => 'Xóa Slide'],
            ['id' => '24', 'ten_chuc_nang' => 'Cập Nhật Slide'],
            ['id' => '25', 'ten_chuc_nang' => 'Đổi Trạng Thái Slide'],
            ['id' => '26', 'ten_chuc_nang' => 'Lấy Danh Sách Review'],
            ['id' => '27', 'ten_chuc_nang' => 'Tạo Mới Review'],
            ['id' => '28', 'ten_chuc_nang' => 'Xóa Review'],
            ['id' => '29', 'ten_chuc_nang' => 'Cập Nhật Review'],
            ['id' => '30', 'ten_chuc_nang' => 'Lấy Danh Sách Phân Quyền'],
            ['id' => '31', 'ten_chuc_nang' => 'Tạo Mới Phân Quyền'],
            ['id' => '32', 'ten_chuc_nang' => 'Xóa Phân Quyền'],
            ['id' => '33', 'ten_chuc_nang' => 'Cập Nhật Phân Quyền'],
            ['id' => '34', 'ten_chuc_nang' => 'Lấy Danh Sách Chức Năng'],
            ['id' => '35', 'ten_chuc_nang' => 'Lấy Danh Sách Chi Tiết Thuê Phòng'],
            ['id' => '36', 'ten_chuc_nang' => 'Tạo Mới Chi Tiết Thuê Phòng'],
            ['id' => '37', 'ten_chuc_nang' => 'Cập Nhật Chi Tiết Thuê Phòng'],
            ['id' => '38', 'ten_chuc_nang' => 'Lấy Danh Sách Tình Trạng Phòng'],
            ['id' => '39', 'ten_chuc_nang' => 'Lấy Danh Sách Bài Viết'],
            ['id' => '40', 'ten_chuc_nang' => 'Tạo Mới Bài Viết'],
            ['id' => '41', 'ten_chuc_nang' => 'Xóa Bài Viết'],
            ['id' => '42', 'ten_chuc_nang' => 'Cập Nhật Bài Viết'],
            ['id' => '43', 'ten_chuc_nang' => 'Đổi Trạng Thái Bài Viết'],
            ['id' => '44', 'ten_chuc_nang' => 'Lấy Danh Sách Khách Hàng'],
            ['id' => '45', 'ten_chuc_nang' => 'Xóa Khách Hàng'],
            ['id' => '46', 'ten_chuc_nang' => 'Cập Nhật Khách Hàng'],
            ['id' => '47', 'ten_chuc_nang' => 'Đổi Trạng Thái Khách Hàng'],
        ]);
    }
}
