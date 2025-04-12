<?php
<<<<<<< HEAD

=======
>>>>>>> ĐiềnthôngtinHậuthanhtoán
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\RoomDetail;
use Illuminate\Support\Facades\Session;
<<<<<<< HEAD

=======
>>>>>>> ĐiềnthôngtinHậuthanhtoán
class CartController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $cartItems = Session::get('shoppingCart', []);
        return view('cart.index', compact('cartItems'));
=======
        // Lấy giỏ hàng từ session
        $cartItems = Session::get('shoppingCart', []);

        // Lấy thông tin chi tiết của các phòng trong giỏ hàng
        $roomDetails = [];
        foreach ($cartItems as $item) {
            $roomDetails[] = RoomDetail::find($item['room_id']);
        }

        return view('homepage.cart', compact('cartItems', 'roomDetails'));
        
>>>>>>> ĐiềnthôngtinHậuthanhtoán
    }

    public function add(Request $request)
    {
<<<<<<< HEAD
        $validated = $request->validate([
            'room_id' => 'required|exists:room_detail,id',
=======
        /*
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'room_id' => 'required|integer|exists:room_detail,id',
>>>>>>> ĐiềnthôngtinHậuthanhtoán
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
<<<<<<< HEAD
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
=======
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
>>>>>>> ĐiềnthôngtinHậuthanhtoán
                'room_id' => $room->id,
                'room_type' => $room->room_type,
                'bed_type' => $room->bed_type,
                'area' => $room->area,
                'view' => $room->view,
                'price_per_night' => $room->price_per_night,
                'image_url' => $room->image_url,
<<<<<<< HEAD
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
=======
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
>>>>>>> ĐiềnthôngtinHậuthanhtoán
    }
}