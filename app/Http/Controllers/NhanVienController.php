<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThemMoiNhanVienRequest;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NhanVienController extends Controller
{
    public function timKiem(Request $request)
    {
        $id_chuc_nang   = 24;

        $noi_dung   = '%' . $request->noi_dung_tim . '%';

        $data   = NhanVien::join('phan_quyens','nhan_viens.id_chuc_vu','phan_quyens.id')
                           ->where('ho_va_ten', 'like', $noi_dung)
                           ->orWhere('so_dien_thoai', 'like', $noi_dung)
                           ->orWhere('luong_co_ban', 'like', $noi_dung)
                           ->select('nhan_viens.*','phan_quyens.ten_quyen')
                           ->get();

        return response()->json([
            'data'  =>  $data
        ]);

    }

    public function getData()
    {
        $id_chuc_nang   = 19;

        $data = NhanVien::join('phan_quyens','nhan_viens.id_chuc_vu','phan_quyens.id')
                        ->select('nhan_viens.*','phan_quyens.ten_quyen')
                        ->get();

        return response()->json([
            'nhan_vien'  =>  $data
        ]);
    }

    public function store(ThemMoiNhanVienRequest $request)
    {
        $id_chuc_nang   = 20;

        $data   =   $request->all();

        $data['password'] = bcrypt($request->password);

        NhanVien::create($data);
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã tạo mới nhân viên thành công!'
        ]);
    }

    public function destroy($id)
    {
        $id_chuc_nang   = 21;

        NhanVien::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá nhân viên thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang   = 22;

        $data   = $request->all();

        NhanVien::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật nhân viên thành công!'
        ]);
    }

    public function dangNhap(Request $request){

        // $check = NhanVien::where('email',$request->email)
        //                   ->where('password',$request->password)
        //                   ->first();
        $check  = Auth::guard('nhan_vien')->attempt(['email'=> $request->email,'password'=>  $request->password]);

            if($check){
                $user =  Auth::guard('nhan_vien')->user();
                return response()->json([
                    'status'        =>  true,
                    'token'         => $user->createToken('token')->plainTextToken,
                    'ho_ten_admin'  => $user->ho_va_ten,
                    'message'       =>  'Đã đăng nhập thành công'
                ]);
            }else{
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Tài Khoản hoặc mật khẩu không đúng'
                ]);
            }
    }
    public function doiTrangThai(Request $request)
    {
        $id_chuc_nang   = 23;

        $nhan_vien = NhanVien::find($request->id);
        if($nhan_vien) {
            if($nhan_vien->tinh_trang == 1) {
                $nhan_vien->tinh_trang = 0;
            } else {
                $nhan_vien->tinh_trang = 1;
            }
            $nhan_vien->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái nhân viên thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }

    public function kiemTraToken(Request $request)
    {
        // Lấy thông tin từ Authorization : 'Bearer ' gửi lên
        $user = Auth::guard('sanctum')->user();
        if($user && $user instanceof \App\Models\NhanVien) {
            return response()->json([
                'status'    =>  true,
                'message'   =>  "Oke, bạn có thể đi qua",
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  "Bạn cần đăng nhập hệ thống trước",
            ]);
        }
    }
}

