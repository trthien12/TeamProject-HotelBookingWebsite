<?php
namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    // Các phương thức khác (edit, update) không thay đổi
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_type' => 'required',
            'room_category' => 'required',
            'area' => 'required|integer',
            'view' => 'required',
            'original_price' => 'required|numeric',
            'discounted_price' => 'required|numeric',
            'available_rooms' => 'required|integer',
            'image' => 'nullable|url',
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Cập nhật thông tin phòng thành công!');
    }
}