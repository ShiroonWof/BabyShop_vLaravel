<?php

namespace App\Http\Controllers;
use App\slide;
use App\product;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product_toy = Product::where('type','toy')->where('new',1)->get();
        $new_product_food = Product::where('type','food')->where('new',1)->get();
        return view('page/trangchu',compact('slide','new_product_toy','new_product_food'));
    }

    public function getLoaiSP(){
        return view('page/loai_sanpham');
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


