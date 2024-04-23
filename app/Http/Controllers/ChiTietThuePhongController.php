<?php

namespace App\Http\Controllers;

use App\Models\ChiTietThuePhong;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChiTietThuePhongController extends Controller
{
    public function createData(Request $request)
    {
        $today  =   Carbon::today();

        $ngayCuoiNam    = Carbon::now()->endOfMonth();

        while($today <= $ngayCuoiNam) {
            ChiTietThuePhong::firstOrCreate(
                [
                    'id_phong'      =>  $request->id,
                    'ngay_thue'     =>  $today,
                ],
                [
                    'id_phong'      =>  $request->id,
                    'gia_thue'      =>  $request->gia_mac_dinh,
                    'tinh_trang'    =>  1,
                    'ngay_thue'     =>  $today,
                ]
            );
            $today->addDay();
        }

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo chi tiết phòng thành công!',
        ]);
    }
}
