<?php

namespace App\Http\Controllers;

use App\Models\LoaiPhong;
use Illuminate\Http\Request;

class LoaiPhongController extends Controller
{
    public function getData()
    {
        $data   =   LoaiPhong::all();

        return response()->json([
            'loai_phong'  =>  $data
        ]);
    }

    public function store(Request $request)
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
}
