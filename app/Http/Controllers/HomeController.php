<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Slideshow;
use App\Models\RoomDetail;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index()
    {
        // Xoá session search data khi vao trang chu
        session()->forget('search_data');
        
        $slideshows = Slideshow::take(4)->get();
        $roomDetails = RoomDetail::with('capacities')->get();

        return view('homepage.trangchu', compact('slideshows', 'roomDetails'));
    }
    //lấy danh sách phòng
    public function search(Request $request)
    {
        
        $validated = $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0'
        ]);

          // Lưu thông tin tìm kiếm vào session 
        session([
            'search_data' => [
                'check_in' => $validated['check_in'],
                'check_out' => $validated['check_out'],
                'adults' => $validated['adults'],
                'children' => $validated['children']
            ]
        ]);
        // Truy vấn tìm phòng trống
        $rooms = RoomDetail::with('capacities')
            ->whereHas('capacities', function($query) use ($validated) {
                $query->where('max_capacity', '>=', $validated['adults'] + $validated['children']);
            })
            ->whereDoesntHave('bookings', function($query) use ($validated) {
                $query->whereHas('booking', function ($q) use ($validated) { 
                    $q->where(function($q) use ($validated) {
                        $q->where('check_in', '<=', $validated['check_in'])
                          ->where('check_out', '>', $validated['check_in']);
                    })->orWhere(function($q) use ($validated) {
                        $q->where('check_in', '<', $validated['check_out'])
                          ->where('check_out', '>=', $validated['check_out']);
                    });
                });
            })
            ->orderBy('price_per_night', 'asc')
            ->get();
    
        return view('homepage.search_results',[
            'rooms' => $rooms,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'adults' => $validated['adults'],
            'children' => $validated['children'],
        ]);
    }

}
