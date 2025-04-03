<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuanLyController extends Controller
{
    // Truy vấn tất cả thông tin đặt phòng
    function danhsachdatphong(){
            /*
        // Kết nối đến cơ sở dữ liệu
        session_start();

        // Kiểm tra nếu người dùng đã đăng nhập
        if (!isset($_SESSION['email'])) {
            header("Location: dangnhap.php");
            
            exit();
        } */

        $result = DB::select("select rb.id, rb.check_in, rb.check_out, rb.booking_date, c.full_name, rb.status 
                            from room_booking rb 
                            JOIN customer c ON rb.customer_id = c.id");
        return view("QuanLy.danhsachdatphong", compact("result"));
    }
    
    function chitietdatphong($id)
    {
        if (!$id) {
            abort(404, "ID đặt phòng không được cung cấp."); // Trả về trang lỗi 404
        }
        $bookingDetails = DB::select("select rb.id, rb.check_in, rb.check_out, rb.booking_date,
                                c.full_name, c.email, c.phone, rb.status,
                                p.amount, p.tax, p.total_amount 
                            from room_booking rb
                            JOIN customer c ON rb.customer_id = c.id
                            LEFT JOIN payment p ON rb.id = p.booking_id
                            where rb.id = ?",[$id])[0];
        //DB::table("sach")->where("id",$id)->first();
        // Kiểm tra nếu không có kết quả
        if (empty($bookingDetails)) {
            abort(404, "Không tìm thấy thông tin đặt phòng.");
        }
        return view("QuanLy.chitietdatphong",compact("bookingDetails"));
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


}
