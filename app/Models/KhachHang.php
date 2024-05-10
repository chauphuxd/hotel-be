<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $table = 'khach_hangs';

    protected $fillable = [
        'ho_lot',
        'ten',
        'email',
        'so_dien_thoai',
        'password',
        'hash_active',
        'hash_reset',
        'is_block',
        'is_active',
        'ngay_sinh',
    ];
}
