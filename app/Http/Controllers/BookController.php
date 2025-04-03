<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    //
    function laythongtintheloai(){
        //$the_loai_sach = DB::table("the_loai")->get();
        $the_loai_sach = Category::all();
        return view("qlsach.the_loai",compact("the_loai_sach"));
    }

    function laythongtinsach(){
        //$sach = DB::table("sach")->select("tieu_de","tac_gia")
        //->where("nha_xuat_ban","Văn Học")->get();
        $sach = Book::where("nha_xuat_ban","Văn Học")
                    ->where("gia_ban",">","50000")
                    ->where("gia_ban","<","90000")->get();
        return view("qlsach.thong_tin_sach",compact("sach"));
    }

    function nhapdulieu()
    {
        return view("qlsach.nhapdulieu");
    }

    function luudulieu(Request $request)
    {
        $id = $request->input("id");
        $ten_the_loai = $request->input("ten_the_loai");
        $data = ["id"=>$id,"ten_the_loai"=>$ten_the_loai];
        DB::table("the_loai")->insert($data);
        return "Thêm thành công";
    }

     function nhapdulieu2()
    {
        return view("qlsach.nhapdulieu2");
    }

    function luutheloai(Request $request)
    {
        $id = $request->input("id"); //["5","6"]
        $ten = $request->input("ten"); //["Viễn tưởng","Truyện ngắn"]

        $data = [];
        foreach($id as $key=>$value)
        {
            $data[] = ["id"=>$value,"ten_the_loai"=>$ten[$key]];
            
        }
  
        DB::table("the_loai")->insert($data);
        echo "Thêm thành công";

    }

    public function booklist(){
        $data = DB::table("sach")->get();
        return view("vidusach.book_list",compact("data"));
    }

    public function bookcreate(){
        $the_loai = DB::table("the_loai")->get();
        $action = "add";
        return view("vidusach.book_form",compact("the_loai","action"));
    }

    public function booksave($action, Request $request)
    {
        $request->validate([
            'tieu_de' => ['required', 'string', 'max:200'],
            'nha_cung_cap' => ['required', 'string', 'max:50'],
            'nha_xuat_ban' => ['required', 'string', 'max:50'],
            'tac_gia' => ['required', 'string', 'max:50'],
            'hinh_thuc_bia' => ['required', 'string', 'max:50'],
            'gia_ban' => ['required', 'numeric'],
            'the_loai' => ['required', 'max:3'],
            'file_anh_bia' => ['nullable','image']
        ]);

        $data = $request->except("_token");

        if($action=="edit")
            $data = $request->except("_token", "id");

        if($request->hasFile("file_anh_bia"))
        {
            $fileName = $request->input("tieu_de") ."_".rand(1000000,9999999).'.' . $request->file('file_anh_bia')->extension();
            $request->file('file_anh_bia')->storeAs('public/book_image', $fileName);
            $data['file_anh_bia'] = $fileName;
        }

        //$data = $request->except("id","_token");
        $message = "";
        if($action=="add")
        {
            DB::table("sach")->insert($data);
            $message = "Thêm thành công";
        }
        else if($action=="edit")
        {
            $id = $request->id;
            DB::table("sach")->where("id",$id)->update($data);
            $message = "Cập nhật thành công";
        }
        return redirect()->route('booklist')->with('status', $message);
        }

    public function bookedit($id){
        $action = "edit";
        $the_loai = DB::table("dm_the_loai")->get();
        $sach = DB::table("sach")->where("id",$id)->first();
        return view("vidusach.book_form",compact("the_loai","action","sach"));
    }

    public function bookdelete(Request $request)
    {
        $id = $request->id;
        DB::table("sach")->where("id",$id)->delete();
        return redirect()->route('booklist')->with('status', "Xóa thành công");
    }

}
