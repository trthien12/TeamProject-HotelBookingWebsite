<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuanLyController;

require __DIR__.'/auth.php';

// Trang quản lý, login nhà làm :v 
    // Route cho đăng nhập
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Route cho đăng xuất
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route cho trang Admin, Danh sách đặt phòng, Danh sách khách hàng, Thông tin phòng (yêu cầu đăng nhập)
    Route::middleware('auth')->group(function () {
        Route::get('/admin', [QuanLyController::class, 'admin'])->name('manager.admin');
        Route::get('/admin/list_roomBooking', [QuanLyController::class, 'bookinglist'])->name('manager.bookinglist');
        Route::get('/admin/detail_roomBooking/{id}', [QuanLyController::class, 'bookingdetails'])->name('manager.bookingdetails');
        // Route::post('/rooms_status/{id}','App\Http\Controllers\QuanLyController@updateroomstatus');
        Route::post('/admin/rooms_status/{id}',[QuanLyController::class, 'updateroomstatus']);
        Route::get('/admin/customer', [QuanLyController::class, 'danhsachkhachhang'])->name('manager.customerlist');
        /////////////////////////
        Route::get('/admin/rooms', [QuanLyController::class, 'index'])->name('manager.index');
        Route::get('/admin/rooms/{id}/edit', [QuanLyController::class, 'edit'])->name('manager.edit');
        Route::put('/admin/rooms/{id}', [QuanLyController::class, 'update'])->name('manager.update');
    });

    // Chuyển hướng mặc định đến trang đăng nhập
    // Route::get('/', function () {
    //     return redirect()->route('login');
    // });



