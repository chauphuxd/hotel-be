<?php

namespace App\Http\Controllers;

use App\Models\ChiTietThuePhong;
use App\Models\HoaDon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HoaDonController extends Controller
{
    public function datPhong(Request $request)
    {
        $ngay_den   =   Carbon::createFromDate($request->tt_dat_phong['ngay_den']);
        $ngay_di    =   Carbon::createFromDate($request->tt_dat_phong['ngay_di']);
        $data_loai_phong    = $request->tt_loai_phong;
        $khach_hang =   Auth::guard('sanctum')->user();
        $ds_loai_phong_khach_dat    =   [];

        foreach($data_loai_phong as $key => $value) {
            if(isset($value['chon_phong']) && $value['chon_phong'] == true && $value['so_phong_dat'] > 0) {
                array_push($ds_loai_phong_khach_dat, $value);
            }
        }

        $hoaDon     =   HoaDon::create([
            'ma_hoa_don'            =>  Str::uuid(),
            'id_khach_hang'         =>  $khach_hang->id,
            'ngay_den'              =>  $ngay_den,
            'ngay_di'               =>  $ngay_di
        ]);

        while($ngay_den < $ngay_di) {
            // $ngay_den = 24/5/2024
            foreach($ds_loai_phong_khach_dat as $key => $value) {
                $ds_phong = ChiTietThuePhong::join('phongs', 'chi_tiet_thue_phongs.id_phong', 'phongs.id')
                                            ->where('phongs.id_loai_phong', $value['id'])
                                            ->whereDate('chi_tiet_thue_phongs.ngay_thue', $ngay_den)
                                            ->where('chi_tiet_thue_phongs.tinh_trang', 1)
                                            ->select('chi_tiet_thue_phongs.*')
                                            ->take($value['so_phong_dat'])->get();
                $ds_phong_ids   = $ds_phong->pluck('id');

                ChiTietThuePhong::whereIn('id', $ds_phong_ids)
                                ->update([
                                    'tinh_trang'    =>  2,
                                    'id_hoa_don'    =>  $hoaDon->id
                                ]);
            }
            $ngay_den->addDay();
        }

        $hoaDon->tong_tien  = ChiTietThuePhong::where('id_hoa_don', $hoaDon->id)->sum('gia_thue');
        $hoaDon->save();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã đặt phòng thành công!',
        ]);
    }

    public function getData()
    {
        $data   = HoaDon::join('khach_hangs', 'hoa_dons.id_khach_hang', 'khach_hangs.id')
                        ->select('hoa_dons.*', 'khach_hangs.ho_lot', 'khach_hangs.ten')
                        ->get();

        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function chiTietThue(Request $request)
    {
        $id_hoa_don     =   $request->id;

        $data   = ChiTietThuePhong::where('id_hoa_don', $id_hoa_don)
                                  ->orderBy('ngay_thue')
                                  ->join('phongs', 'chi_tiet_thue_phongs.id_phong', 'phongs.id')
                                  ->join('loai_phongs', 'phongs.id_loai_phong', 'loai_phongs.id')
                                  ->select('chi_tiet_thue_phongs.*', 'loai_phongs.ten_loai_phong', 'phongs.ten_phong')
                                  ->get();

        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function xacNhanDonHang(Request $request)
    {
        if(isset($request->thanh_toan)) {
            HoaDon::where('id', $request->id_hoa_don)->update([
                'is_thanh_toan' => 1
            ]);
            ChiTietThuePhong::where('id_hoa_don', $request->id_hoa_don)->update([
                'tinh_trang'    =>  3
            ]);
        } else {
            HoaDon::where('id', $request->id_hoa_don)->update([
                'is_thanh_toan' => -1
            ]);
            ChiTietThuePhong::where('id_hoa_don', $request->id_hoa_don)->update([
                'tinh_trang'    =>  1,
                'id_hoa_don'    =>  null
            ]);
        }

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xử lý đơn hàng thành công!',
        ]);
    }
}
