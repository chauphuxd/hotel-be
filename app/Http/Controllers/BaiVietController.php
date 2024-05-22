<?php

namespace App\Http\Controllers;

use App\Http\Requests\createBaiVietRequest;
use App\Models\BaiViet;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function getData()
    {
        $data = BaiViet::all();
        return response()->json([
            'bai_viet'  =>  $data
        ]);
    }
    public function getdataClient()
    {
        $data = BaiViet::where('tinh_trang', 1)
                        ->select('bai_viets.*')
                        ->get(); // get là ra 1 danh sách;

        return response()->json([
            'bai_viet'  =>  $data
        ]);
    }

    public function store(createBaiVietRequest $request)
    {
        $data   =   $request->all();
        BaiViet::create($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới bài viết thành công!'
        ]);
    }

    public function destroy($id)
    {
        BaiViet::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá bài viết thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $data   = $request->all();
        BaiViet::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật bài viết thành công!'
        ]);
    }

    public function doiTrangThai(Request $request)
    {
        $bai_viet = BaiViet::find($request->id);
        if($bai_viet) {
            if($bai_viet->tinh_trang == 1) {
                $bai_viet->tinh_trang = 0;
            } else {
                $bai_viet->tinh_trang = 1;
            }
            $bai_viet->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái bài viết thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }
}
