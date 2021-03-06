@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index">Trang chủ</a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        <form action="{{route('dang-nhap')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    @if(Session::has('flag'))
                        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                    @endif
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input style="border-style:groove" name="email" id="email" required>
                    </div>
                    <div class="form-block">
                        <label for="password">Mật khẩu*</label>
                        <input style="border-style:groove" name="password" type="password" id="password" required>
                    </div>
                    <div class="form-block">
                        <button style="margin-left: 58%" type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                        <div>
                            <a style="color:blue; margin-left: 57%;" href="{{route('dang-ki')}}">Chưa có tài khoản.</a>
                        </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
    @endsection
