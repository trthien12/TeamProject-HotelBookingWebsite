<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoomDetail;
use Illuminate\Support\Facades;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập cho admin
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Xử lý đăng nhập cho admin
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Xác thực với guard 'admin'
        if (Auth::guard('admin')->attempt($credentials)) {
            // Chuyển hướng đến dashboard của admin
            return redirect()->intended(route('manager.admin'));
        }

        // Nếu đăng nhập thất bại
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Phương thức logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        // return redirect('/');
        return redirect()->route('admin.login.form'); 

    }

     // Hiển thị Dashboard cho Admin
     public function dashboard()
     {
         $roomDetails = RoomDetail::all();
         return view('admin.dashboard', compact('roomDetails'));
     }
}

  
