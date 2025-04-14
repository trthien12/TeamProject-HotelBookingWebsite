<?php
namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    // public function index()
    // {
    //     // $rooms = Room::all();
    //     $rooms = DB::table("room_detail")->get();
    //     return view('rooms.index', compact('rooms'));
    // }

    // public function edit($id)
    // {
    //     // $room = Room::findOrFail($id);
    //     $room = DB::table('room_detail')->where('id', $id)->first();
    //     if (!$room) {
    //         abort(404); // Giống như findOrFail
    //     }
    //     return view('rooms.edit', compact('room'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'room_type' => 'required',
    //         'bed_type' => 'required',
    //         'area' => 'required|integer',
    //         'view' => 'required',
    //         'price_per_night' => 'required|numeric',
    //         'discount_percent' => 'required|numeric',
    //         'remaining_rooms' => 'required|integer',
    //         'image_url' => 'nullable|url',
    //     ]);

    //     // $room = Room::findOrFail($id);
    //     // $room->update($request->all());

    //     // Dùng Query Builder thay vì Eloquent
    //     $room = DB::table('room_detail')->where('id', $id)->first();
    //     if (!$room) {
    //         abort(404); // Nếu không tìm thấy phòng
    //     }

    //     DB::table('room_detail')
    //         ->where('id', $id)
    //         ->update([
    //             'room_type' => $request->room_type,
    //             'bed_type' => $request->bed_type,  // Đổi từ room_category thành bed_type
    //             'area' => $request->area,
    //             'view' => $request->view,
    //             'price_per_night' => $request->price_per_night,  // Đổi từ original_price thành price_per_night
    //             'discount_percent' => $request->discount_percent,  // Đổi từ discounted_price thành discount_percent
    //             'remaining_rooms' => $request->remaining_rooms,  // Đổi từ available_rooms thành remaining_rooms
    //             'image_url' => $request->image_url,  // Đổi từ image thành image_url
    //     ]);

    //     return redirect()->route('rooms.index')->with('success', 'Cập nhật thông tin phòng thành công!');
    // }
}