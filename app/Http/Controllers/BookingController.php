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
    /*public function store(Request $request)
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
    public function submitBooking(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
        ]);

        // Lưu thông tin đặt phòng vào database
        $booking = Booking::create([
            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'adults' => $request->adults,
            'children' => $request->children,
        ]);

        return response()->json(['message' => 'Đặt phòng thành công', 'booking_id' => $booking->id]);
    }

    // API lấy thông tin đặt phòng theo Room ID
    public function getBookingInfo($roomId)
    {
        $room = Room::findOrFail($roomId);
        $booking = Booking::where('room_id', $roomId)->latest()->first();

        if (!$booking) {
            return response()->json(['error' => 'Không có đặt phòng nào cho phòng này'], 404);
        }

        return response()->json([
            'room_type' => $room->type,
            'checkin_date' => $booking->check_in,
            'checkout_date' => $booking->check_out,
            'total_people' => $booking->adults + $booking->children,
            'price_per_night' => $room->price,
            'total_amount' => $room->price * (strtotime($booking->check_out) - strtotime($booking->check_in)) / (60 * 60 * 24),
        ]);
    }
}
