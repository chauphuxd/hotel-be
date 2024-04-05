<?php

namespace App\Http\Controllers;

use App\Models\Phong;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    public function getData()
    {
        $data   =   Phong::all();

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
}
