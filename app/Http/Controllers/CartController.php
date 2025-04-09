<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\RoomDetail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Session::get('shoppingCart', []);
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:room_detail,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0'
        ]);

        $room = RoomDetail::find($validated['room_id']);
        $cart = Session::get('shoppingCart', []);

        // Tạo key riêng biệt dựa trên room_id và ngày nhận/trả phòng
        $key = $validated['room_id'] . '_' . $validated['check_in'] . '_' . $validated['check_out'];
        
        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += 1;
        } else {
            $cart[$key] = [
                'room_id' => $room->id,
                'room_type' => $room->room_type,
                'bed_type' => $room->bed_type,
                'area' => $room->area,
                'view' => $room->view,
                'price_per_night' => $room->price_per_night,
                'image_url' => $room->image_url,
                'check_in' => $validated['check_in'],
                'check_out' => $validated['check_out'],
                'quantity' => 1,
            ];
        }

        Session::put('shoppingCart', $cart);
        // Trả về kết quả AJAX
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'cartCount' => array_sum(array_column($cart, 'quantity')) // Cập nhật số lượng giỏ hàng
        ]);
    }

    // Nếu không phải AJAX
        return redirect()->route('cart.index')->with('success', 'Phòng đã được thêm vào giỏ hàng!');
    }

    public function remove($key)
    {
        $cart = Session::get('shoppingCart', []);

        if (isset($cart[$key])) {
            unset($cart[$key]);
            Session::put('shoppingCart', $cart);
            return redirect()->route('cart.index')->with('success', 'Đã xóa phòng khỏi giỏ hàng.');
        }
        return redirect()->route('cart.index')->with('error', 'Không tìm thấy phòng để xóa.');
    }
}