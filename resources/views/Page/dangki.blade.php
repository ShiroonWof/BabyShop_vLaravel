@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Đăng kí</h6>
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

        <form action="{{route('dang-ki')}}" method="post" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-sm-3"></div>

                <div class="col-sm-6">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('thanh-cong'))
                        <div class="alert alert-success">{{Session::get('thanh-cong')}}</div>
                    @endif
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="text" style="border-style:groove" name="email" required placeholder="abc@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Họ, tên*</label>
                        <input type="text" style="border-style:groove" name="fullname" required placeholder="Nguyễn Văn A">
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" style="border-style:groove" name="address" required placeholder="227, Nguyễn Văn Cừ, Phường 4, Quận 5, TP.HCM">
                    </div>
                    <div class="form-block">
                        <label for="phone">Số điện thoại*</label>
                        <input type="text" style="border-style:groove" name="phone" required placeholder="0xxxxxxxxx">
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật khẩu*</label>
                        <input type="password" name="password" required placeholder="********">
                    </div>
                    <div class="form-block">
                        <label for="phone">Nhập lại mật khẩu*</label>
                        <input type="password" name="re_password" required placeholder="********">
                    </div>
                    <div class="form-block">
                        <button style="margin-left: 40%;" type="submit" class="btn btn-primary">Đăng kí</button>
                    </div>
                    <div>
                        <a style="color:blue; margin-left: 38%;" href="{{route('dang-nhap')}}">Đã có tài khoản.</a>
                    </div>
                </div>
                <div class="col-sm-3"></div>

            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
    @endsection
