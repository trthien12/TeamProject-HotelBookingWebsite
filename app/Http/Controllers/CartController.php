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
        // Lấy giỏ hàng từ session
        $cartItems = Session::get('shoppingCart', []);

        // Lấy thông tin chi tiết của các phòng trong giỏ hàng
        $roomDetails = [];
        foreach ($cartItems as $item) {
            $roomDetails[] = RoomDetail::find($item['room_id']);
        }

        return view('homepage.cart', compact('cartItems', 'roomDetails'));
        
    }

    public function add(Request $request)
    {
        /*
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'room_id' => 'required|integer|exists:room_detail,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
        ]);

        // Thêm phòng vào giỏ hàng
        $cart = Session::get('shoppingCart', []);
        $roomId = $request->input('room_id');

        // Kiểm tra xem phòng đã có trong giỏ hàng chưa
        if (isset($cart[$roomId])) {
            $cart[$roomId]['quantity'] += 1; // Tăng số lượng nếu đã có
        } else {
             // Truy vấn thông tin phòng
             $room = RoomDetail::find($roomId);
            // Thêm thông tin phòng vào giỏ hàng
            $cart[$roomId] = [
                'room_id' => $room->id,
                'room_type' => $room->room_type,
                'bed_type' => $room->bed_type,
                'area' => $room->area,
                'view' => $room->view,
                'price_per_night' => $room->price_per_night,
                'image_url' => $room->image_url,
                'check_in' => $request->input('check_in'),
                'check_out' => $request->input('check_out'),
                'quantity' => 1, // Khởi tạo số lượng
            ];
        }

        // Cập nhật session
        Session::put('shoppingCart', $cart);
        return redirect()->route('cart.index')->with('success', 'Phòng đã được thêm vào giỏ hàng!');
        */
        // Logic để thêm phòng vào giỏ hàng, ví dụ:
        $cartItem = new Cart();
        $cartItem->session_id = session()->getId();
        $cartItem->room_id = $request->input('room_id');
        $cartItem->check_in = $request->input('check_in');
        $cartItem->check_out = $request->input('check_out');
        $cartItem->adults = $request->input('adults');
        $cartItem->children = $request->input('children');
        $cartItem->quantity = 1; // Hoặc tùy theo yêu cầu
        $cartItem->save();
        return redirect()->route('homepage.cart'); // Redirect đến trang giỏ hàng
    }

    public function remove($roomId)
    {
        // Xóa phòng khỏi giỏ hàng
        $cart = Session::get('shoppingCart', []);

        if (isset($cart[$roomId])) {
            unset($cart[$roomId]); // Xóa phòng khỏi giỏ hàng
          // Cập nhật session
        Session::put('shoppingCart', $cart);
        return redirect()->route('homepage.cart')->with('success', 'Phòng đã được xóa khỏi giỏ hàng!');
        }
        return redirect()->route('homepage.cart')->with('error', 'Không tìm thấy phòng để xóa!');
    }
}