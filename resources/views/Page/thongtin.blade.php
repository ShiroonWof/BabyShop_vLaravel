@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Thông tin tài khoản</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="index">Trang chủ</a> / <span>Thông tin</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h3>Tên chủ tài khoản: <p>{{Auth::user()->full_name}}</p></h3>
                        <div class="space10"></div>
                        <h3>Email đăng kí:<p>{{Auth::user()->email}}</p></h3>
                        <div class="space10"></div>
                        <h3>Số điện thoại đăng kí:<p>{{Auth::user()->phone}}</p></h3>
                        <div class="space10"></div>
                        <h3>Địa chỉ:<p>{{Auth::user()->address}}</p></h3>
                        <div class="space10"></div>
                        <h3>Ngày tạo tài khoản<p>{{Auth::user()->created_at}}</p></h3>
                        <div>
                            <a style="color:blue; margin-left: 38%;" href="{{route('trang-chu')}}">Quay về trang chủ</a>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>

                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
