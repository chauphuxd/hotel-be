<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function getData()
    {
        // MID PUSH LAI
        $data = BaiViet::all();
        return response()->json([
            'bai_viet'  =>  $data
        ]);
    }

    public function store(Request $request)
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
}
