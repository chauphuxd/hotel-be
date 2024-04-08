<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhan_viens';

    protected $fillable = [
        'ma_nhan_vien',
        'ho_va_ten',
        'ngay_sinh',
        'luong_co_ban',
        'id_chuc_vu',
        'ngay_bat_dau',
        'so_dien_thoai',
        'email',
        'password',
        'tinh_trang',
        'avatar',
    ];
}
