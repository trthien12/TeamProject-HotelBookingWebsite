<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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
/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';*/

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
//Login + Dashboard +Logout cho Admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Route hiển thị form login cho admin
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
    // Xử lý login cho admin
    Route::post('login', [LoginController::class, 'login'])->name('login');
    // Dashboard cho admin (chỉ truy cập nếu đã đăng nhập)
    Route::middleware('auth:admin')->get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    // Route logout cho admin
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    //Route tạm thời cho các chức năng quản lý
    Route::middleware('auth:admin')->group(function () {
        Route::get('rooms', function () {
            return "Chức năng Thông tin phòng đangđang được phát triển...";
        })->name('rooms');

        Route::get('customers', function () {
            return "Chức năng Danh sách khách hàng đang được phát triển...";
        })->name('customers');

        Route::get('bookings', function () {
            return "Chức năng Danh sách đặt phòng đang được phát triển...";
        })->name('bookings');
    });
});
// Tìm kiếm phòng trống
Route::match(['get', 'post'], '/home/search', [HomeController::class, 'search'])->name('home.search');

// Giỏ hàng (Cart)
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/remove/{roomId}', [CartController::class, 'remove'])->name('cart.remove');
});

// Đặt phòng (Booking)
Route::get('/dat-phong', [BookingController::class, 'showForm'])->name('booking.form');
Route::post('/dat-phong', [BookingController::class, 'store'])->name('booking.store');

// Đảm bảo đăng ký các route cho auth
require __DIR__.'/auth.php';
