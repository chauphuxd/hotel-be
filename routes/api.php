<?php

use App\Http\Controllers\LoaiPhongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/loai-phong/data', [LoaiPhongController::class, 'getData']);
Route::post('/loai-phong/create', [LoaiPhongController::class, 'store']);
Route::delete('/loai-phong/delete/{id}', [LoaiPhongController::class, 'destroy']);
// 127.0.0.1:8000/api/loai-phong/data
