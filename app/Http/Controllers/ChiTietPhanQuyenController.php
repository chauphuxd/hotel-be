<?php

namespace App\Http\Controllers;

use App\Http\Requests\CapQuyenRequest;
use App\Models\ChiTietPhanQuyen;
use Illuminate\Http\Request;

class ChiTietPhanQuyenController extends Controller
{
    public function capQuyen(CapQuyenRequest $request)
    {
        $id_chuc_nang   = 67;

        ChiTietPhanQuyen::firstOrCreate([
            'id_quyen'      =>   $request->id_quyen,
            'id_chuc_nang'  =>   $request->id_chuc_nang,
        ]);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã phân quyền thành công!'
        ]);
    }

    public function getData(Request $request)
    {
        $id_chuc_nang   = 60;

        $data   = ChiTietPhanQuyen::join('chuc_nangs', 'chi_tiet_phan_quyens.id_chuc_nang', 'chuc_nangs.id')
                                  ->select('chi_tiet_phan_quyens.*', 'chuc_nangs.ten_chuc_nang')
                                  ->get();

        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function xoaQuyen(Request $request)
    {
        ChiTietPhanQuyen::where('id', $request->id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá phân quyền thành công!'
        ]);
    }
}
