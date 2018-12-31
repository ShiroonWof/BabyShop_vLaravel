<?php

namespace App\Http\Controllers;
use App\slide;
use App\product;
use App\productType;

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
        $sp_khac = Product::where('id_type','<>',$loai)->paginate(3);
        $loai_sp = ProductType::all();
        $ten_loai_sp = ProductType::where('id',$loai)->first();
        return view('page/loai_sanpham',compact('sp_theoloai','sp_khac', 'loai_sp','ten_loai_sp'));
    }

    public function getSP(Request $req, $type){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
        $sp_tuongtu_new = Product::where('id_type',$sanpham->id_type)->where('id','<>',$sanpham->id)->where('new',1)->paginate(4);
        $sp_tuongtu_hot = Product::where('id_type',$sanpham->id_type)->where('id','<>',$sanpham->id)->where('promotion_price',0)->paginate(4);
        $mota_sp = ProductType::where('id',$sanpham->id_type)->first();
        return view('page/chitiet_sanpham',compact('sanpham','sp_tuongtu','mota_sp','sp_tuongtu_new','sp_tuongtu_hot'));
    }

    public function getLienHe(){
        return view('page/lienhe');
    }

    public function getGioiThieu(){
        return view('page/gioithieu');
    }
}


