<?php

namespace App\Http\Controllers;

use App\Http\Requests\createReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getData()
    {
        $data   =   Review::all();

        return response()->json([
            'review'  =>  $data
        ]);
    }

    public function store(createReviewRequest $request)
    {
        $data   =   $request->all();
        Review::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới review thành công!'
        ]);
    }

    public function destroy($id)
    {
        Review::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá review thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $data   = $request->all();

        Review::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật review thành công!'
        ]);
    }
}
