<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;


// Route cho đăng nhập
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route cho đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route cho trang Thông tin phòng (yêu cầu đăng nhập)
Route::middleware('auth')->group(function () {
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
});

// Chuyển hướng mặc định đến trang đăng nhập
Route::get('/', function () {
    return redirect()->route('login');
});