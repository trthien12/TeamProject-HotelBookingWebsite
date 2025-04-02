<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Hiển thị form đặt phòng
    public function showForm()
    {
        return view('booking_form');
    }

    // Xử lý lưu đặt phòng
    public function store(Request $request)
    {
        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email',
            'sdt' => 'nullable|string|max:15',
            'nationality' => 'required|string',
            'room_id' => 'required|integer',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0'
        ]);
        Booking::create($request->all());

        return redirect()->route('booking.form');
    }
    /* Trang xác nhận đặt phòng thành công
    public function success()
    {
        return view('booking_success');
    }*/
}
