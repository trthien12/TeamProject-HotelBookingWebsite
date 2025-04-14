<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function show()
    {
        return view('homepage.contact');
    }
     // Xử lý khi gửi form
    public function send(Request $request)
     {
         $request->validate([
             'name' => 'required|max:255',
             'email' => 'required|email',
             'message' => 'required|min:10',
         ]);
         // Ví dụ: gửi thông báo đơn giản
         return response()->view('homepage.alert'); // trả về view chứa script
          //return redirect()->route('home')->with('success', 'Gửi liên hệ thành công!  Xin chân thành cám ơn các đóng góp, ý kiến, thắc mắc của Quý Khách hàng.Chúng tôi sẽ phản hồi đến bạn sớm nhất.');
     }
}
