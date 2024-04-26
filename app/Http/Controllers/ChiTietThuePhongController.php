<?php

namespace App\Http\Controllers;

use App\Models\ChiTietThuePhong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function getData()
    {

        $data = ChiTietThuePhong::get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function UpdateData(Request $request)
    {
        $data   = $request->all();

        ChiTietThuePhong::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật phòng thành công!'
        ]);
    }

    public function data()
    {
        $data = ChiTietThuePhong::select('ngay_thue', 'tinh_trang', DB::raw("COUNT(id) as tong"))
                                ->groupBy('ngay_thue', 'tinh_trang')
                                ->orderBy('ngay_thue')
                                ->get();

        $newData = ChiTietThuePhong::select('ngay_thue')
                                   ->groupBy('ngay_thue')
                                   ->orderBy('ngay_thue')
                                   ->get();

        foreach($newData as $k1 => $v1) {
            foreach($data as $k2 => $v2) {
                if($v1->ngay_thue == $v2->ngay_thue && $v2->tinh_trang == 0) {
                    $v1->phong_sua = $v2->tong;
                } else if($v1->ngay_thue == $v2->ngay_thue && $v2->tinh_trang == 1) {
                    $v1->phong_trong = $v2->tong;
                } else if($v1->ngay_thue == $v2->ngay_thue && $v2->tinh_trang == 2) {
                    $v1->phong_coc = $v2->tong;
                } else if($v1->ngay_thue == $v2->ngay_thue && $v2->tinh_trang == 3) {
                    $v1->phong_co_nguoi = $v2->tong;
                }
            }
        }

        return response()->json([
            'data' => $newData
        ]);
    }

}
