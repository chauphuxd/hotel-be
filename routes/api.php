<?php

use App\Http\Controllers\DichVuController;
use App\Http\Controllers\LoaiPhongController;
use App\Http\Controllers\PhongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/loai-phong/data', [LoaiPhongController::class, 'getData']);
Route::post('/loai-phong/create', [LoaiPhongController::class, 'store']);
Route::delete('/loai-phong/delete/{id}', [LoaiPhongController::class, 'destroy']);
Route::put('/loai-phong/update', [LoaiPhongController::class, 'update']);

// 127.0.0.1:8000/api/loai-phong/data


Route::get('/dich-vu/data', [DichVuController::class, 'getData']);
Route::post('/dich-vu/create', [DichVuController::class, 'store']);
Route::delete('/dich-vu/delete/{id}', [DichVuController::class, 'destroy']);
Route::put('/dich-vu/update', [DichVuController::class, 'update']);

Route::get('/phong/data', [PhongController::class, 'getData']);
Route::post('/phong/create', [PhongController::class, 'store']);
Route::delete('/phong/delete/{id}', [PhongController::class, 'destroy']);
Route::put('/phong/update', [PhongController::class, 'update']);

