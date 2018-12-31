<?php

namespace App\Http\Controllers;
use App\slide;
use App\product;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product_toy = Product::where('type','toy')->where('new',1)->paginate(8);
        $new_product_food = Product::where('type','food')->where('new',1)->paginate(8);

        return view('page/trangchu',compact('slide','new_product_toy','new_product_food'));
    }

    public function getLoaiSP($loai){
        $sp_theoloai = Product::where('id_type',$loai)->get();
        return view('page/loai_sanpham',compact($sp_theoloai));
    }

    public function getSP(){
        return view('page/chitiet_sanpham');
    }

    public function getLienHe(){
        return view('page/lienhe');
    }

    public function getGioiThieu(){
        return view('page/gioithieu');
    }
}


