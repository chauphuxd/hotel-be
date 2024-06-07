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

        $data   = ChiTietPhanQuyen::get();

        return response()->json([
            'data'    =>  $data,
        ]);
    }
}
