<?php

namespace App\Http\Controllers;

use App\Http\Requests\createSlideRequest;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function timKiem(Request $request)
    {
        $noi_dung   = '%' . $request->noi_dung_tim . '%';

        $data   = Slide::where('link_hinh_anh', 'like', $noi_dung)
                           ->get();

        return response()->json([
            'data'  =>  $data
        ]);

    }

    public function getData()
    {
        $data   =   Slide::all();

        return response()->json([
            'slide'  =>  $data
        ]);
    }

    public function store(createSlideRequest $request)
    {
        $data   =   $request->all();
        Slide::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới slide thành công!'
        ]);
    }

    public function destroy($id)
    {
        Slide::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá slide thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $data   = $request->all();

        Slide::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật slide thành công!'
        ]);
    }
    public function doiTrangThai(Request $request)
    {
        $slide = Slide::find($request->id);
        if($slide) {
            if($slide->tinh_trang == 1) {
                $slide->tinh_trang = 0;
            } else {
                $slide->tinh_trang = 1;
            }
            $slide->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái slide thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }
}
