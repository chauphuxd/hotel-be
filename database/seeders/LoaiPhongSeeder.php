<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiPhongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loai_phongs')->delete();
        DB::table('loai_phongs')->insert([
            ['id' => '1','ten_loai_phong'=>'Phòng Standard','dien_tich'=>'20','so_giuong'=>'1','tinh_trang'=>'1','hinh_anh'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1MZRx0qcE5VbxzbB8BzOYSGOwBBIG_5REcg&s'],
            ['id' => '2','ten_loai_phong'=>'Phòng Superior','dien_tich'=>'25','so_giuong'=>'2','tinh_trang'=>'1','hinh_anh'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiW9hAc-ojYOaBFdMn_XANGtMzdQpjaf0GHA&s'],
            ['id' => '3','ten_loai_phong'=>'Phòng Deluxe','dien_tich'=>'15','so_giuong'=>'2','tinh_trang'=>'1','hinh_anh'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0mopMYOMbDyrJfY4Qmk9m9_WtztJ9S0j7sA&s'],
            ['id' => '4','ten_loai_phong'=>'Phòng Suite','dien_tich'=>'30','so_giuong'=>'1','tinh_trang'=>'1','hinh_anh'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJjeblI2tX5PmPy6hcpTeqH1lDadIg_98pDw&s'],
            ['id' => '5','ten_loai_phong'=>'Phòng View Biển','dien_tich'=>'20','so_giuong'=>'1','tinh_trang'=>'1','hinh_anh'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTO8fbcJQaaAlXIwjcAtBh-LmplKf_9mMnE8w&s'],
            ['id' => '6','ten_loai_phong'=>'Phòng VIP','dien_tich'=>'22','so_giuong'=>'1','tinh_trang'=>'1','hinh_anh'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQl6cJhgsnx6MXM7B3nFmNIGyy0RqrbxIh4CQ&s'],
        ]);
    }
}
