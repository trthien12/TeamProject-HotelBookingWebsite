<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
//use App\Http\Controllers\BookingController;
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

    //Route tạm thời cho các chức năng quản lý, khi nào merge chỉnh lại cho khớp
    Route::middleware('auth:admin')->group(function () {
        Route::get('rooms', function () {
            return "Chức năng Thông tin phòng đang được phát triển...";
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

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{roomId}', [CartController::class, 'remove'])->name('cart.remove');
// Route tạm cho Điền thông tin Đặt phòng (Booking), nào merge thì chỉnh lại
Route::get('/dat-phong', function () {
    return "Chức năng Điền thông tin đặt phòng đang được phát triển...";
})->name('booking.form');
//Route::post('/dat-phong', [BookingController::class, 'store'])->name('booking.store');

//Route::post('/booking-submit', [BookingController::class, 'submit'])->name('booking.submit');


//Route::post('/booking/submit', [BookingController::class, 'submitBooking'])->name('booking.submit');
//Route::get('/api/booking-info/{roomId}', [BookingController::class, 'getBookingInfo']);

//Route::get('/dat-phong-thanh-cong', [BookingController::class, 'success'])->name('booking.success');

// Đảm bảo đăng ký các route cho auth
require __DIR__.'/auth.php';


