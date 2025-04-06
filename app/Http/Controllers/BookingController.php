<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Booking;

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
    public function storeBooking(Request $request)
    {
        // Validate input
        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sdt' => 'nullable|string|max:15',
            'nationality' => 'required|string|max:100',
            'room_id' => 'required|integer',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'adults' => 'required|integer',
            'children' => 'required|integer',
        ]);

        // Lấy thông tin từ form
        $full_name = trim($request->ho_ten);
        $email = trim($request->email);
        $phone = trim($request->sdt);
        $nationality = trim($request->nationality);
        $room_id = intval($request->room_id);
        $checkin_date = $request->check_in;
        $checkout_date = $request->check_out;
        $adults = intval($request->adults);
        $children = intval($request->children);

        // Tính toán số ngày ở
        $days = (new \DateTime($checkin_date))->diff(new \DateTime($checkout_date))->days;

        // Lấy thông tin phòng
        $room = DB::table('room_detail')->where('id', $room_id)->first();

        if ($room) {
            $price_per_night = $room->price_per_night;
            $subtotal = $price_per_night * $days;
            $total_amount = $subtotal;

            // Lưu thông tin khách hàng vào bảng customer
            $customer_id = DB::table('customer')->insertGetId([
                'full_name' => $full_name,
                'email' => $email,
                'phone' => $phone,
                'nationality' => $nationality,
            ]);

            // Lưu thông tin đặt phòng
            $booking_id = DB::table('room_booking')->insertGetId([
                'check_in' => $checkin_date,
                'check_out' => $checkout_date,
                'customer_id' => $customer_id,
            ]);

            // Lưu thông tin chi tiết đặt phòng
            DB::table('room_booking_detail')->insert([
                'booking_id' => $booking_id,
                'room_id' => $room_id,
            ]);

            // Lưu thông tin thanh toán
            DB::table('payment')->insert([
                'booking_id' => $booking_id,
                'amount' => $subtotal,
                'tax' => 0,
                'total_amount' => $total_amount,
            ]);

            // Lưu thông tin vào session
            Session::put('customer_info', [
                'full_name' => $full_name,
                'email' => $email,
                'phone' => $phone,
                'nationality' => $nationality,
                'check_in' => $checkin_date,
                'check_out' => $checkout_date,
                'adults' => $adults,
                'children' => $children,
                'total_amount' => $total_amount,
                'bed_type' => $room->bed_type,
                'room_type' => $room->room_type,
                'image_url' => $room->image_url,
                'view' => $room->view,
                'booking_id' => $booking_id,
            ]);
             // Chuyển hướng sang trang payment_form
        return redirect()->route('payment.form')->with('booking_id', $booking_id);
        }
            // Nếu không tìm thấy phòng, quay lại form với lỗi
   // return redirect()->back()->withErrors(['room_id' => 'Phòng không tồn tại.']);
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

