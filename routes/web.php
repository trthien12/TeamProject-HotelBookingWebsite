<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookingController;

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
/*
Route::get('/', function () {
<<<<<<< HEAD
    return view('welcome');
});
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::match(['get', 'post'], '/home/search', [HomeController::class, 'search'])->name('home.search');
//Giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{roomId}', [CartController::class, 'remove'])->name('cart.remove');
//Tìm kiếm + Đặt phòng
Route::get('/dat-phong', [BookingController::class, 'showForm'])->name('booking.form');
Route::post('/dat-phong', [BookingController::class, 'store'])->name('booking.store');

Route::post('/booking-submit', [BookingController::class, 'submit'])->name('booking.submit');

Route::post('/booking/submit', [BookingController::class, 'submitBooking'])->name('booking.submit');
Route::get('/api/booking-info/{roomId}', [BookingController::class, 'getBookingInfo']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/*
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/rooms', [PageController::class, 'rooms'])->name('rooms');
Route::get('/pages', [PageController::class, 'pages'])->name('pages');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
*/