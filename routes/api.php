<?php

use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChiTietThuePhongController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\LoaiPhongController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SlideController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/loai-phong/data', [LoaiPhongController::class, 'getData']);
Route::post('/loai-phong/create', [LoaiPhongController::class, 'store']);
Route::delete('/loai-phong/delete/{id}', [LoaiPhongController::class, 'destroy']);
Route::put('/loai-phong/update', [LoaiPhongController::class, 'update']);

Route::get('/dich-vu/data', [DichVuController::class, 'getData']);
Route::post('/dich-vu/create', [DichVuController::class, 'store']);
Route::delete('/dich-vu/delete/{id}', [DichVuController::class, 'destroy']);
Route::put('/dich-vu/update', [DichVuController::class, 'update']);

Route::get('/phong/data', [PhongController::class, 'getData']);
Route::post('/phong/create', [PhongController::class, 'store']);
Route::delete('/phong/delete/{id}', [PhongController::class, 'destroy']);
Route::put('/phong/update', [PhongController::class, 'update']);


Route::get('/nhan-vien/data', [NhanVienController::class, 'getData']);
Route::post('/nhan-vien/create', [NhanVienController::class, 'store']);
Route::delete('/nhan-vien/delete/{id}', [NhanVienController::class, 'destroy']);
Route::put('/nhan-vien/update', [NhanVienController::class, 'update']);

Route::get('/slide/data', [SlideController::class, 'getData']);
Route::post('/slide/create', [SlideController::class, 'store']);
Route::delete('/slide/delete/{id}', [SlideController::class, 'destroy']);
Route::put('/slide/update', [SlideController::class, 'update']);

Route::get('/review/data', [ReviewController::class, 'getData']);
Route::post('/review/create', [ReviewController::class, 'store']);
Route::delete('/review/delete/{id}', [ReviewController::class, 'destroy']);
Route::put('/review/update', [ReviewController::class, 'update']);

Route::get('/phan-quyen/data', [PhanQuyenController::class, 'getData']);
Route::post('/phan-quyen/create', [PhanQuyenController::class, 'createData']);
Route::delete('/phan-quyen/delete/{id}', [PhanQuyenController::class, 'deleteData']);
Route::put('/phan-quyen/update', [PhanQuyenController::class, 'UpateData']);

Route::get('/chuc-nang/data', [ChucNangController::class, 'getData']);

Route::post('/chi-tiet-thue-phong/create', [ChiTietThuePhongController::class, 'createData']);
Route::get('/chi-tiet-thue-phong/data', [ChiTietThuePhongController::class, 'getData']);
Route::put('/chi-tiet-thue-phong/update', [ChiTietThuePhongController::class, 'UpdateData']);

Route::get('/data', [ChiTietThuePhongController::class, 'data']);
