<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuanLyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
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
});
    //Route tạm thời cho các chức năng quản lý, khi nào merge chỉnh lại cho khớp
    Route::middleware('auth:admin')->group(function () {
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


// Trang quản lý, login nhà làm :v 
    /* // Route cho đăng nhập
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Route cho đăng xuất
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); */

    /* // Route cho trang Admin, Danh sách đặt phòng, Danh sách khách hàng, Thông tin phòng (yêu cầu đăng nhập)
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
 */