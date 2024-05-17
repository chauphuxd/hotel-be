<?php

namespace App\Http\Controllers;

use App\Http\Requests\createDichVuRequest;
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

    public function store(createDichVuRequest $request)
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
    public function doiTrangThai(Request $request)
    {
        $dich_vu = DichVu::find($request->id);
        if($dich_vu) {
            if($dich_vu->tinh_trang == 1) {
                $dich_vu->tinh_trang = 0;
            } else {
                $dich_vu->tinh_trang = 1;
            }
            $dich_vu->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái dịch vụ thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }
}
