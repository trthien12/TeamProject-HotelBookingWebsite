<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;


// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
//Contact ở menu
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
//Privacy_policy ở footerfooter
Route::get('/chinh-sach-quyen-rieng-tu', function () {
    return view('homepage.privacy_policy'); })->name('privacy.policy');

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
//Giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{key}', [CartController::class, 'remove'])->name('cart.remove');
// Đặt phòng (Booking)
Route::get('/dat-phong', [BookingController::class, 'showForm'])->name('booking.form');
// Xử lý khi người dùng submit form đặt phòng
Route::post('/dat-phong', [BookingController::class, 'storeBooking'])->name('booking.store');

// API lấy thông tin phòng theo ID (cho AJAX dùng)
Route::get('/api/booking-info/{roomId}', [BookingController::class, 'getBookingInfo']);

// Route cho trang thanh toán
Route::get('/payment_form', [PaymentController::class, 'showPaymentForm'])->name('payment.form');

// Route xác nhận thanh toán
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');

// Route cho trang thanh toán
Route::get('/payment/success', [PaymentController::class, 'completePayment'])->name('payment.complete');
// Route cho trang thanh toán thành công
Route::get('payment/xong', [PaymentController::class, 'success'])->name('payment.success');

// Đảm bảo đăng ký các route cho auth
require __DIR__.'/auth.php';


