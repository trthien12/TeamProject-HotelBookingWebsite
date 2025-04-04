<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
//Login +Dashboard +Logout
Route::prefix('admin')->name('admin.')->group(function () {
    // Route hiển thị form login cho admin
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
    // Xử lý login cho admin
    Route::post('login', [LoginController::class, 'login'])->name('login');
    // Dashboard cho admin (chỉ truy cập nếu đã đăng nhập)
    Route::middleware('auth:admin')->get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    // Route logout cho admin
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
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
