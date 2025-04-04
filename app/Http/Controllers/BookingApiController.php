namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class BookingApiController extends Controller
{
    public function getBookingInfo($room_id)
    {
        // Tìm phòng theo ID trong database
        $room = Room::find($room_id);

        // Kiểm tra nếu phòng không tồn tại
        if (!$room) {
            return response()->json(['message' => 'Phòng không tồn tại'], 404);
        }

        // Trả về dữ liệu phòng dưới dạng JSON
        return response()->json([
            'room_type' => $room->room_type,
            'price_per_night' => number_format($room->price_per_night, 0, ',', '.') . 'đ',
            'checkin_date' => now()->toDateString(),
            'checkout_date' => now()->addDays(3)->toDateString(), // Giả sử 3 đêm
            'total_people' => 2, // Giả sử có 2 người
            'total_amount' => number_format($room->price_per_night * 3, 0, ',', '.') . 'đ', // Giá cho 3 đêm
        ]);
    }
}
