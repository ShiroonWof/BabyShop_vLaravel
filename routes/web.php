<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('bonjour', function () {
    echo "Bienvenue à BabyShop_vLaravel";
});

Route::get('index', [
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);

Route::get('loaiSP/{type}',[
    'as'=>'loai-san-pham',
    'uses'=>'PageController@getLoaiSP'
]);

Route::get('sanpham/{id}',[
    'as'=>'chi-tiet-san-pham',
    'uses'=>'PageController@getSP'
]);

Route::get('lienhe',[
    'as'=>'lien-he',
    'uses'=>'PageController@getLienHe'
]);

Route::get('gioithieu',[
    'as'=>'gioi-thieu',
    'uses'=>'PageController@getGioiThieu'
]);

Route::get('themvaogiohang/{id}',[
    'as'=>'them-vao-gio-hang',
    'uses'=>'Pagecontroller@getThemVaoGioHang'
]);

Route::get('xoagiohang/{id}',[
    'as'=>'xoa-gio-hang',
    'uses'=>'Pagecontroller@getXoaGioHang'
]);

Route::get('dathang',[
    'as'=>'dat-hang',
    'uses'=>'Pagecontroller@getDatHang'
]);

Route::post('dathang',[
    'as'=>'dat-hang',
    'uses'=>'Pagecontroller@postDatHang'
]);

Route::get('dangnhap',[
    'as'=>'dang-nhap',
    'uses'=>'Pagecontroller@getDangNhap'
]);

Route::post('dangnhap',[
    'as'=>'dang-nhap',
    'uses'=>'Pagecontroller@postDangNhap'
]);

Route::get('dangki',[
    'as'=>'dang-ki',
    'uses'=>'Pagecontroller@getDangKi'
]);

Route::post('dangki',[
    'as'=>'dang-ki',
    'uses'=>'Pagecontroller@postDangKi'
]);

Route::get('dangxuat',[
    'as'=>'dang-xuat',
    'uses'=>'Pagecontroller@getDangXuat'
]);
