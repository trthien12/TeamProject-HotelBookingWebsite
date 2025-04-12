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

        /*
        // Lấy giỏ hàng từ session
        $cartItems = Session::get('shoppingCart', []);

        // Lấy thông tin chi tiết của các phòng trong giỏ hàng
        $roomDetails = [];
        foreach ($cartItems as $item) {
            $roomDetails[] = RoomDetail::find($item['room_id']);
        }

        return view('homepage.cart', compact('cartItems', 'roomDetails'));
        */
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:room_detail,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:1'
        ]);

        $room = RoomDetail::find($validated['room_id']);
        $cart = Session::get('shoppingCart', []);
        //$quantity = $validated['quantity']; //số phòng

        // Tạo key riêng biệt dựa trên room_id và ngày nhận/trả phòng
        $key = $validated['room_id'] . '_' . $validated['check_in'] . '_' . $validated['check_out'];
        $newQuantity = $validated['quantity'];//kiểm tra số phòng

         // Tổng số lượng hiện tại trong cart của cùng phòng và thời gian đó
        $currentQuantityInCart = isset($cart[$key]) ? $cart[$key]['quantity'] : 0;

        // Kiểm tra nếu vượt quá số lượng phòng còn trống
        if ($currentQuantityInCart + $newQuantity > $room->remaining_rooms) {
            return redirect()->back()->with('error', 'Số lượng phòng bạn chọn vượt quá số phòng còn trống!');
        }

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] +=  $newQuantity;//cập nhật số lượng muốn thêm vào giỏ 
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
                /*'quantity' => 1,*/
                'quantity' =>  $newQuantity,
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