<?php

namespace App\Http\Controllers;

use App\Http\Requests\createPhanQuyenRequest;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;

class PhanQuyenController extends Controller
{
    public function timKiem(Request $request)
    {
        $id_chuc_nang   = 40;

        $noi_dung   = '%' . $request->noi_dung_tim . '%';

        $data   = PhanQuyen::where('ten_quyen', 'like', $noi_dung)
                           ->get();

        return response()->json([
            'data'  =>  $data
        ]);

    }

    public function getData()
    {

        $id_chuc_nang   = 36;

        $data = PhanQuyen::get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function createData(createPhanQuyenRequest $request)
    {

        $id_chuc_nang   = 37;

        PhanQuyen::create([
            'ten_quyen'         => $request->ten_quyen,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Thêm mới tên quyền thành công!'
        ]);
    }
    public function UpateData(Request $request)
    {

        $id_chuc_nang   = 39;

        $ten_quyen = PhanQuyen::where('id', $request->id)->first();
        if($ten_quyen) {
            $ten_quyen->update([
                'ten_quyen'             => $request->ten_quyen,

            ]);

            return response()->json([
                'status' => true,
                'message' => "Cập Nhật tên quyền thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có Lỗi"
            ]);
        }
    }
    public function deleteData($id)
    {

        $id_chuc_nang   = 38;

        $ten_quyen = PhanQuyen::where('id', $id)->first();

        if($ten_quyen) {
            $ten_quyen->delete();

            return response()->json([
                'status' => true,
                'message' => "Đã xóa tên quyền thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có Lỗi"
            ]);
        }
    }
}
