<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    public function getData()
    {
        $data   =   DichVu::all();

        return response()->json([
            'dich_vu'  =>  $data
        ]);
    }

    public function store(Request $request)
    {
        $data   =   $request->all();
        DichVu::create($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới dịch vụ thành công!'
        ]);
    }

    public function destroy($id)
    {
        DichVu::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá dịch vụ thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $data   = $request->all();

        DichVu::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật dịch vụ thành công!'
        ]);
    }
}
