<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Trang admin, danh sách đặt phòng, danh sách khách hàng (Phần của Thiên)
Route::get('/admin','App\Http\Controllers\QuanLyController@admin');
Route::get('/list_roomBooking','App\Http\Controllers\QuanLyController@danhsachdatphong');
Route::get('/detail_roomBooking/{id}','App\Http\Controllers\QuanLyController@chitietdatphong');
Route::post('/rooms_status/{id}','App\Http\Controllers\QuanLyController@updateroomstatus');
Route::get('/customer','App\Http\Controllers\QuanLyController@danhsachkhachhang');

// Trang thông tin phòng, login nhà làm :v (Phần của Mai)
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



