<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuanLyController extends Controller
{

///// Trang chủ, Danh sách đặt phòng, Danh sách khách hàng
    function admin()
    {
        return view("QuanLy.admin");
    }
    
    function bookinglist()
    {
            /*
        // Kết nối đến cơ sở dữ liệu
        session_start();

        // Kiểm tra nếu người dùng đã đăng nhập
        if (!isset($_SESSION['email'])) {
            header("Location: dangnhap.php");
            
            exit();
        } */

        $data = DB::select("select rb.id, rb.check_in, rb.check_out, rb.booking_date, c.full_name, rb.status 
                            from room_booking rb 
                            JOIN customer c ON rb.customer_id = c.id");
        return view("QuanLy.danhsachdatphong", compact("data"));
    }
    
    function bookingdetails($id)
    {
        if (!$id) {
            abort(404, "ID đặt phòng không được cung cấp."); // Trả về trang lỗi 404
        }
        $data = DB::select("select rb.id, rb.check_in, rb.check_out, rb.booking_date,
                                c.full_name, c.email, c.phone, rb.status,
                                p.amount, p.tax, p.total_amount 
                            from room_booking rb
                            JOIN customer c ON rb.customer_id = c.id
                            LEFT JOIN payment p ON rb.id = p.booking_id
                            where rb.id = ?",[$id])[0];
        //DB::table("sach")->where("id",$id)->first();
        // Kiểm tra nếu không có kết quả
        if (empty($data)) {
            abort(404, "Không tìm thấy thông tin đặt phòng.");
        }
        return view("QuanLy.chitietdatphong",compact("data"));
    }

    function updateroomstatus(Request $request, $id)
    {
        // Lấy hành động từ form
        $action = $request->input('action');

        // Xác định trạng thái mới
        $newStatus = ($action === 'Xác nhận') ? 'đã xác nhận' : 'huỷ';

        // Cập nhật trạng thái bằng Query Builder
        DB::table('room_booking')
            ->where('id', $id)
            ->update(['status' => $newStatus]);

        // Chuyển hướng về trang chi tiết đặt phòng
        return redirect(url('/detail_roomBooking/' . $id));
    }

    function danhsachkhachhang()
    {
        $data = DB::table("customer")->get();
        return view("QuanLy.danhsachkhachhang", compact("data"));
    }

///////////////// Thông tin phòng
    public function index()
    {
        // $rooms = Room::all();
        $rooms = DB::table("room_detail")->get();
        return view('QuanLy.index', compact('rooms'));
    }

    public function edit($id)
    {
        // $room = Room::findOrFail($id);
        $room = DB::table('room_detail')->where('id', $id)->first();
        if (!$room) {
            abort(404); // Giống như findOrFail
        }
        return view('QuanLy.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_type' => 'required',
            'bed_type' => 'required',
            'area' => 'required|integer',
            'view' => 'required',
            'price_per_night' => 'required|numeric',
            'discount_percent' => 'required|numeric',
            'remaining_rooms' => 'required|integer',
            'image_url' => 'nullable|url',
        ]);

        // $room = Room::findOrFail($id);
        // $room->update($request->all());

        // Dùng Query Builder thay vì Eloquent
        $room = DB::table('room_detail')->where('id', $id)->first();
        if (!$room) {
            abort(404); // Nếu không tìm thấy phòng
        }

        DB::table('room_detail')
            ->where('id', $id)
            ->update([
                'room_type' => $request->room_type,
                'bed_type' => $request->bed_type,  // Đổi từ room_category thành bed_type
                'area' => $request->area,
                'view' => $request->view,
                'price_per_night' => $request->price_per_night,  // Đổi từ original_price thành price_per_night
                'discount_percent' => $request->discount_percent,  // Đổi từ discounted_price thành discount_percent
                'remaining_rooms' => $request->remaining_rooms,  // Đổi từ available_rooms thành remaining_rooms
                'image_url' => $request->image_url,  // Đổi từ image thành image_url
        ]);

        return redirect()->route('manager.index')->with('success', 'Cập nhật thông tin phòng thành công!');
    }


}
