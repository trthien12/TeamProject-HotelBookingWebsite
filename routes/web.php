<?php
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;


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

Route::get('/', function () {
    return view('welcome'); // hoặc view trang chủ của bạn
})->name('home');

// Hiển thị form đặt phòng
Route::get('/dat-phong', [BookingController::class, 'showForm'])->name('booking.form');
// Xử lý khi người dùng submit form đặt phòng
Route::post('/dat-phong', [BookingController::class, 'storeBooking'])->name('booking.store');

// API lấy thông tin phòng theo ID (cho AJAX dùng)
Route::get('/api/booking-info/{roomId}', [BookingController::class, 'getBookingInfo']);

// Route cho trang thanh toán
Route::get('/payment_form', [PaymentController::class, 'showPaymentForm'])->name('payment.form');

// Route xác nhận thanh toán
Route::get('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');

// Route cho trang thanh toán
Route::get('/payment/success', [PaymentController::class, 'completePayment'])->name('payment.complete');
// Route cho trang thanh toán thành công
Route::get('payment/xong', [PaymentController::class, 'success'])->name('payment.success');

