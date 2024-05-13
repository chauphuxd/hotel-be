<?php

namespace App\Http\Controllers;

use App\Models\Phong;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    public function getData()
    {
        $data   =   Phong::join('loai_phongs', 'phongs.id_loai_phong', 'loai_phongs.id')
                         ->select('phongs.*', 'loai_phongs.ten_loai_phong')
                         ->get();

        return response()->json([
            'phong'  =>  $data
        ]);
    }

    public function store(Request $request)
    {
        $data   =   $request->all();
        Phong::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới phòng thành công!'
        ]);
    }

    public function destroy($id)
    {
        Phong::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá phòng thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $data   = $request->all();

        Phong::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật phòng thành công!'
        ]);
    }
    public function doiTrangThai(Request $request)
    {
        $phong = Phong::find($request->id);
        if($phong) {
            if($phong->tinh_trang == 1) {
                $phong->tinh_trang = 0;
            } else {
                $phong->tinh_trang = 1;
            }
            $phong->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái phòng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }
}
