<?php

namespace App\Http\Controllers;

use App\Http\Requests\createLoaiPhongRequest;
use App\Models\LoaiPhong;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoaiPhongController extends Controller
{
    public function getData()
    {
        $data   =   LoaiPhong::all();

        return response()->json([
            'status'      =>  true,
            'loai_phong'  =>  $data
        ]);
    }

    public function store(createLoaiPhongRequest $request)
    {
        $data   =   $request->all();
        LoaiPhong::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới loại phòng thành công!'
        ]);
    }

    public function destroy($id)
    {
        LoaiPhong::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá loại phòng thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $data   = $request->all();

        LoaiPhong::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật loại phòng thành công!'
        ]);
    }
    public function doiTrangThai(Request $request)
    {
        $loai_phong = LoaiPhong::find($request->id);
        if($loai_phong) {
            if($loai_phong->tinh_trang == 1) {
                $loai_phong->tinh_trang = 0;
            } else {
                $loai_phong->tinh_trang = 1;
            }
            $loai_phong->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái loại phòng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }
}
