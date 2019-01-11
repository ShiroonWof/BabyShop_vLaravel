<?php

namespace App\Http\Controllers;
use App\slide;
use App\product;
use App\productType;
use App\cart;
use App\customer;
use App\bill;
use App\billdetail;
use App\user;
use App\admin;
use Session;
use Hash;
use Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function getCaList()
    {
        $category = ProductType::all();
        return view('admin.category.list',['category'=>$category]);
    }
    public function getCaAdd()
    {
        return view('admin.category.add');
    }
    public function postCaAdd(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|min:3|max:100'
        ],
        [
            'name.required' => 'You have not input the name',
            'name.min' => 'The name must have at least 3 characters',
            'name.max' => 'The name must have at most 100 characters',
        ]);
        $category = new ProductType;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->created_at = Null;
        $category->updated_at = null;
        $category->save();
        return redirect()->back()->with('Succeed','New category have been add.');
    }
    public function getCaEdit($id)
    {
        $category = ProductType::find($id);
        return view('admin.category.edit',['category'=>$category]);
    }

    public function postCaEdit(Request $request,$id)
    {
        $category = ProductType::find($id);
        $this->validate($request,
            [
                'name' => 'required|unique:type_products,name|min:3|max:100'
            ],
            [
                'name.required' => 'You have not input the name',
                'name.unique' => 'This name is existed',
                'name.min' => 'The name must have at least 3 characters',
                'name.max' => 'The name must have at most 100 characters',
            ]);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->created_at = Null;
        $category->updated_at = null;
        $category->save();
        return redirect()->back()->with('Succeed','The category have been edited.');
    }

    public function getCaDelete($id)
    {
        $category = ProductType::find($id);
        $category->delete();
        return redirect('admin/category/list')->with('Succeed','The category has been deleted');
    }

    public function getPrList()
    {
        $product = Product::all();
        return view('admin.product.list',['product'=>$product]);
    }
    public function getPrAdd()
    {
        return view('admin.product.add');
    }
    public function postPrAdd(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
                'unit_price' => 'required',
            ],
            [
                'name.required' => 'You have not input the name',
                'name.min' => 'The name must have at least 3 characters',
                'name.max' => 'The name must have at most 100 characters',
                'unit_price.required' => 'You have not input the price',
            ]);
        $product = new Product;
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->image = $request->image;
        $product->unit = $request->unit;
        $product->type = $request->type;
        $product->new = $request->new;
        $product->save();
        return redirect()->back()->with('Succeed','New product have been add.');
    }
    public function getPrEdit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit',['product'=>$product]);
    }

    public function postPrEdit(Request $request,$id)
    {
        $product = Product::find($id);
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100',
                'unit_price' => 'required',
            ],
            [
                'name.required' => 'You have not input the name',
                'name.min' => 'The name must have at least 3 characters',
                'name.max' => 'The name must have at most 100 characters',
                'unit_price.required' => 'You have not input the price',
            ]);
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->image = $request->image;
        $product->unit = $request->unit;
        $product->type = $request->type;
        $product->new = $request->new;
        $product->created_at = Null;
        $product->updated_at = null;
        $product->save();
        return redirect()->back()->with('Succeed','The product have been edited.');
    }

    public function getPrDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin/product/list')->with('Succeed','The product has been deleted');
    }
    public function getUsList()
    {
        $user = User::all();
        return view('admin.user.list',['user'=>$user]);
    }
    public function getAddAdmin($id)
    {
        $req = User::find($id);
        $admin = new Admin;
        $admin->id = $id;
        $admin->full_name = $req->full_name;
        $admin->email = $req->email;
        $admin->save();
        return redirect('admin/user/list')->with('Succeed','The user has become an admin');
    }
    public function getAdList()
    {
        $admin = Admin::all();
        return view('admin.admin.list',['admin'=>$admin]);
    }
    public function getDelAdmin($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('admin/admin/list')->with('Succeed','The admin has been deleted');
    }

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

    public function getDangNhap(){
        return view("page/dangnhap");
    }

    public function postDangNhap(Request $req)
    {
        $this->validate($req,
            [
                'email' => "required|email",
                'password' => 'required|min:6'
            ],
            [
                'email.required' => 'Vui lòng nhập vào email.',
                'email.email' => 'Email không đúng định dạng.',
                'password.required' => 'Vui lòng nhập vào mật khẩu.',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự.'
            ]);
        $credentials = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($credentials)) {
            $id = Auth::user()->id;
            if (Admin::find($id)) {
                return redirect('admin');
            } else {
                return redirect()->route('trang-chu')->with(['flag' => 'success', 'message' => 'Đăng nhập thành công.']);
            }
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập thất bại.']);
        }
    }
    public function getDangKi(){
        return view("page/dangki");
    }

    public function postDangKi(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email.',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanh-cong','Tài khoản đã được tạo thành công.');
    }

    public function getDangXuat(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getTimKiem(Request $req){
        $product = Product::where('name','like','%'.$req->timkiem.'%')->orwhere('unit_price',$req->timkiem)->get();
        return view('page/search',compact('product'));
    }

    public function getThongTin(){
        return view('page/thongtin');
    }

}


