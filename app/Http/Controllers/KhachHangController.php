<?php

namespace App\Http\Controllers;

use App\Http\Requests\DangKyRequest;
use App\Http\Requests\KhachHangDatLaiMatKhauRequest;
use App\Http\Requests\KhachHangQuenMatKhauRequest;
use App\Mail\SendMail;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

            $data                   =   $request->all();
            $data['password']       =   bcrypt($request->password);
            $data['hash_active']    =   Str::uuid();
            KhachHang::create($data);

            $mail['ho_va_ten']      =   $request->ho_lot . " " . $request->ten;
            $mail['link']           =   "http://localhost:5173/kich-hoat/" . $data['hash_active'];

            Mail::to($request->email)->send(new SendMail("Kích hoạt tài khoản", "kich_hoat_tai_khoan", $mail));

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
                if($user->is_block) {
                    return response()->json([
                        'status'    =>  false,
                        'message'   =>  'Tài khoản của bạn đã bị khoá!'
                    ]);
                }
                if($user->is_active) {
                    return response()->json([
                        'status'    =>  true,
                        'token'     => $user->createToken('token')->plainTextToken,
                        'message'   =>  'Đã đăng nhập thành công'
                    ]);
                } else {
                    Auth::guard('khach_hang')->logout();
                    return response()->json([
                        'status'    =>  false,
                        'message'   =>  'Vui lòng kiểm tra email!'
                    ]);
                }
            }else{
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Tài Khoản hoặc mật khẩu không đúng'
                ]);
            }
    }

    public function kiemTraToken()
    {
        // Lấy thông tin từ Authorization : 'Bearer ' gửi lên
        $user = Auth::guard('sanctum')->user();
        if($user && $user instanceof \App\Models\KhachHang) {
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

    public function datLaiMatKhau(KhachHangDatLaiMatKhauRequest $request)
    {
        KhachHang::where('hash_reset', $request->hash_reset)->where('email', $request->email)->update([
            'password'      =>  bcrypt($request->password),
            'hash_reset'    =>  null
        ]);

        return response()->json([
            'status'    =>  true,
            'message'   =>  "Đã đặt lại mật khẩu thành công!",
        ]);
    }

    public function quenMatKhau(KhachHangQuenMatKhauRequest $request)
    {
        $hash_reset     =   random_int(100000, 999999);
        KhachHang::where('email', $request->email)->update([
            'hash_reset'   =>   $hash_reset
        ]);

        $kh = KhachHang::where('email', $request->email)->first();
        $data['ho_va_ten']  = $kh->ho_lot . " " . $kh->ten;
        $data['link_ne']    = "http://localhost:5173/dat-lai-mat-khau/" . $hash_reset;

        // Gửi email tới tài khoản $request->email + $hash_reset
        Mail::to($request->email)->send(new SendMail("Khôi Phục Mật Khẩu", "quen_mat_khau", $data));

        return response()->json([
            'status'    =>  true,
            'message'   =>  "Vui lòng kiểm tra email!",
        ]);
    }

    public function kichHoat(Request $request)
    {
        $khach_hang = KhachHang::where('hash_active', $request->hash_active)->first();

        if($khach_hang) {
            $khach_hang->is_active      = 1;
            $khach_hang->hash_active    = null;
            $khach_hang->save();

            return response()->json([
                'status'    =>  true,
                'message'   =>  "Bạn đã kích hoạt tài khoản thành công!",
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  "Mã kích hoạt không tồn tại!",
            ]);
        }
    }
}
