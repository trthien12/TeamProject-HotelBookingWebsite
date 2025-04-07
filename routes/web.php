<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\QuanLyController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

// Danh sách đặt phòng + danh sách khách hàng
    Route::get('/admin','App\Http\Controllers\QuanLyController@admin');
        // Route::get('/list_roomBooking','App\Http\Controllers\QuanLyController@danhsachdatphong');
    Route::get('/list_roomBooking', [QuanLyController::class, 'bookinglist'])->name('manager.bookinglist');
    Route::get('/detail_roomBooking/{id}','App\Http\Controllers\QuanLyController@bookingdetails');
    Route::post('/rooms_status/{id}','App\Http\Controllers\QuanLyController@updateroomstatus');
        // Route::get('/customer','App\Http\Controllers\QuanLyController@danhsachkhachhang');
    Route::get('/customer', [QuanLyController::class, 'danhsachkhachhang'])->name('quanly.kh');

// Thông tin phòng + login nhà làm
    // Route cho đăng nhập
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Route cho đăng xuất
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route cho trang Thông tin phòng (yêu cầu đăng nhập)
    // Route::middleware('auth')->group(function () {
    //     Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    //     Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    //     Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
    // });
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');

    // Chuyển hướng mặc định đến trang đăng nhập
    Route::get('/', function () {
        return redirect()->route('login');
    });



