<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        // Kiểm tra xem thông tin khách hàng có trong session không
        /*if (!session()->has('customer_info')) {
            return redirect()->route('booking.form'); // Chuyển hướng đến trang điền thông tin nếu không có
        }*/

        return view('thanhtoan.payment_form'); // Trả về view thanh toán
    }

    public function processPayment(Request $request)
    {
        
       /* if (!session()->has('customer_info')) {
            return redirect()->route('booking.form')->withErrors('Không có thông tin khách hàng!');
        }*/

        return view('thanhtoan.payment');
    }

    public function completePayment()
    {
        $customer = session('customer_info');
        
        // Xử lý lưu vào DB (nếu cần)
        DB::table('payments')->insert([
            'booking_id' => $customer['booking_id'] ?? null,
            'amount' => $customer['total_amount'],
            'status' => 'paid',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Xóa session nếu muốn
        // session()->forget('customer_info');

        return view('thanhtoan.payment_success');
    }
}
