<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViduLayoutController extends Controller
{
    //
    function trang1()
    {
        return view("vidulayout.trang1");
    }
    function trang2()
    {
        return view("vidulayout.trang2");
    }

    function sach()
    {
        $data = DB::select("select * from sach where tieu_de!='test' order by gia_ban asc limit 0,8");
        return view("vidusach.index", compact("data"));
    }

    function theloai($id)
    {
        $data = DB::select("select * from sach where id_the_loai = ?",[$id]);
        return view("vidusach.index", compact("data"));
    }

    function chitiet($id)
    {
        $data = DB::select("select * from sach where id = ?",[$id])[0];
        //DB::table("sach")->where("id",$id)->first();
        return view("vidusach.chitiet",compact("data"));
    }
}
