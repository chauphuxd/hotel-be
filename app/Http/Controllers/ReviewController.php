<?php

namespace App\Http\Controllers;

use App\Http\Requests\createReviewRequest;
use App\Models\Review;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ReviewController extends Controller
{
    public function timKiem(Request $request)
    {
        $id_chuc_nang   = 35;

        $noi_dung   = '%' . $request->noi_dung_tim . '%';

        $data   = Review::where('ho_va_ten', 'like', $noi_dung)
                           ->orWhere('noi_dung', 'like', $noi_dung)
                           ->orWhere('sao_danh_gia', 'like', $noi_dung)
                           ->get();

        return response()->json([
            'data'  =>  $data
        ]);

    }

    public function getData()
    {
        $id_chuc_nang   = 31;

        $data   =   Review::all();

        return response()->json([
            'review'  =>  $data
        ]);
    }

    public function store(createReviewRequest $request)
    {
        $id_chuc_nang   = 32;

        $data   =   $request->all();
        Review::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới review thành công!'
        ]);
    }

    public function destroy($id)
    {
        $id_chuc_nang   = 33;

        Review::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá review thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang   = 34;

        $data   = $request->all();

        Review::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật review thành công!'
        ]);
    }

    //  HomePage
    public function getDataHomepage()
    {
        $dataSlide      = Slide::where('tinh_trang', 1)
                            ->select('slides.*')
                            ->get(); // get là ra 1 danh sách

        $dataReview     = Review::all();

        return response()->json([
            'dataSlide' => $dataSlide,
            'dataReview' => $dataReview,
        ]);
    }
}
