<?php

namespace App\Http\Controllers;
use App\slide;
use App\product;
use App\productType;
use App\cart;
use App\customer;
use App\bill;
use App\billdetail;
use Session;

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

    public function getThemVaoGioHang(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getXoaGioHang($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0)
            Session::put('cart', $cart);
        else
            Session::forget('cart');
        return redirect()->back();
    }

    public function getDatHang(){
        return view("page/dathang");
    }

    public function postDatHang(Request $req){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->note;
        $customer->save();

        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->note;
        $bill->save();

        foreach($cart->items as $key=>$value) {
            $bill_detail = new BillDetail();
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thong-bao','Đơn hàng của bạn đã được đặt thành công !');
    }
}


