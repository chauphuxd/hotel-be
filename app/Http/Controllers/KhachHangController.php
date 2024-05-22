<?php

namespace App\Http\Controllers;

use App\Http\Requests\DangKyRequest;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KhachHangController extends Controller
{
    public function dangKy(DangKyRequest $request)
    {

        $check_mail = KhachHang::where('email', $request->email)->first();

        if($check_mail) {
            return response()->json([
                'status' => false,
                'message' => "Email đã tồn tại trong hệ thống!"
            ]);
        } else {

            $data   =   $request->all();
            $data['password'] = bcrypt($request->password);

            KhachHang::create($data);

            return response()->json([
                'status' => true,
                'message' => "Đăng kí tài khoản thành công!"
            ]);
        }

    }

    public function getData()
    {
        $data = KhachHang::all();

        return response()->json([
            'data' => $data
        ]);
    }

    public function doiTrangThai(Request $request)
    {
        $khach_hang = KhachHang::find($request->id);
        if($khach_hang) {
            if($khach_hang->is_block == 1) {
                $khach_hang->is_block = 0;
            } else {
                $khach_hang->is_block = 1;
            }

            // $khach_hang->is_block = !$khach_hang->is_block;

            // $khach_hang->is_block = $khach_hang->is_block == 0 ? 1 : 0;

            $khach_hang->save();

            return response()->json([
                'status' => true,
                'message' => "Đổi trạng thái tài khoản thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Đã có lỗi xảy ra!"
            ]);
        }
    }

    public function destroy($id)
    {
        KhachHang::find($id)->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá khách hàng thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $data   = $request->all();
        // return response()->json($data);
        KhachHang::find($request->id)->update($data);

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã cập nhật khách hàng thành công!'
        ]);
    }
    public function dangNhap(Request $request){

        // $check = NhanVien::where('email',$request->email)
        //                   ->where('password',$request->password)
        //                   ->first();
        $check  = Auth::guard('khach_hang')->attempt(['email'=> $request->email,'password'=>  $request->password]);

            if($check){
                $user =  Auth::guard('khach_hang')->user();
                return response()->json([
                    'status'    =>  true,
                    'token'     => $user->createToken('token')->plainTextToken,
                    'message'   =>  'Đã đăng nhập thành công'
                ]);
            }else{
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Tài Khoản hoặc mật khẩu không đúng'
                ]);
            }
    }
}
