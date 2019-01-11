@extends('master')
@section('content')
    <div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Liên Hệ</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index">Trang chủ</a> / <span>Liên hệ</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
    <div class="beta-map">

    <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6371468520206!2d106.6790081148364!3d10.762422862394907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1bfc262bf1%3A0x4e843897f2900135!2zMjI3IMSQxrDhu51uZyBOZ3V54buFbiBWxINuIEPhu6ssIFBoxrDhu51uZyA0LCBRdeG6rW4gNSwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1546136945649" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
</div>
    <div class="container">
    <div id="content" class="space-top-none">

        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h2>Mẫu Đơn Liên hệ</h2>
                <div class="space20">&nbsp;</div>
                <p>Mẫu đơn liên hệ đến bộ phận hỗ trợ khách hàng 24/7. Khách hàng sẽ nhận được phản hồi trong tối đa 48 tiếng.</p>
                <div class="space20">&nbsp;</div>
                <form action="#" method="post" class="contact-form">
                    <div class="form-block">
                        <input name="your-name" type="text" placeholder="Tên*">
                    </div>
                    <div class="form-block">
                        <input name="your-email" type="email" placeholder="Email*">
                    </div>
                    <div class="form-block">
                        <input name="your-subject" type="text" placeholder="Chủ đề">
                    </div>
                    <div class="form-block">
                        <textarea name="your-message" placeholder="Tin nhắn"></textarea>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Gửi <i class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <h2>Thông tin liên hệ</h2>
                <div class="space20">&nbsp;</div>

                <h6 class="contact-title">Địa chỉ</h6>
                <p>
                    227 Nguyễn Văn Cừ<br>
                    Phường 4, Quận 5<br>
                    Thành phố Hồ Chí Minh
                </p>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Bộ phận chăm sóc khách hàng</h6>
                <p>
                    Luôn sẵn sàng được phục vụ quý khách <br>
                    <a href="mailto:biz@betadesign.com">zackchan@gmail.com</a>
                </p>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Bộ phận kí thuật</h6>
                <p>
                    Hỗ trợ quý khách với những vấn đề phát sinh về mặt kí thuật</br>
                    <a href="hr@betadesign.com">Another@gmail.com</a>
                </p>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection