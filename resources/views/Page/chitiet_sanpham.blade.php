@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="BabyShop_Interface/image/product/{{$sanpham->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
                            <div class="space5">&nbsp;</div>
                            <p class="single-item-price">
                                @if($sanpham->promotion_price == 0)
                                    <span>{{number_format($sanpham->unit_price)}}vnđ</span>
                                @else
                                    <span class="flash-del">{{number_format($sanpham->unit_price)}}vnđ</span>
                                    <span class="flash-sale">{{number_format($sanpham->promotion_price)}}vnđ</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$mota_sp->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Lựa chọn:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="color">
                                <option>Màu sắc</option>
                                <option value="Red">Red</option>
                                <option value="Green">Green</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                            </select>
                            <select class="wc-select" name="color">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="{{route('them-vao-gio-hang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                        <li><a href="#tab-reviews">Đánh giá: (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$sanpham->description}}</p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự: </h4>
                    <pre>

                    </pre>
                    <div class="row">
                        @foreach($sp_tuongtu as $sptt)
                        <div class="col-sm-4">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <a href="{{route('chi-tiet-san-pham',$sptt->id)}}"><img src="BabyShop_Interface/image/product/{{$sptt->image}}" alt="" height="250px"></a>
                                </div>
                                <div class="single-item-body">
                                    @if($sptt->promotion_price != 0)
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <p class="single-item-title">{{$sptt->name}}</p>
                                    <p class="single-item-price">
                                        @if($sptt->promotion_price != 0)
                                            <span class="flash-del">{{number_format($sptt->unit_price)}}vnđ</span>
                                            <span class="flash-sale">{{number_format($sptt->promotion_price)}}vnđ</span>
                                        @else
                                            <span class="flash">{{number_format($sptt->unit_price)}}vnđ</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('them-vao-gio-hang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        <div class="row">{{$sp_tuongtu->links()}}</div>
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm tương tự mới: </h3>
                    <div class="widget-body">
                        @foreach($sp_tuongtu_new as $spttnew)
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route("chi-tiet-san-pham",$spttnew)}}"><img src="BabyShop_Interface/image/product/{{$spttnew->image}}" alt=""></a>
                                <div class="media-body">
                                    <h6>{{$spttnew->name}}</h6>

                                    @if($spttnew->promotion_price != 0)
                                        <span class="flash-del">{{number_format($spttnew->unit_price)}}vnđ</span>
                                        <span class="flash-sale">{{number_format($spttnew->promotion_price)}}vnđ</span>
                                    @else
                                        <span class="flash">{{number_format($spttnew->unit_price)}}vnđ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm tương tự hot:</h3>
                    <div class="widget-body">
                        @foreach($sp_tuongtu_hot as $sptthot)
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route("chi-tiet-san-pham",$sptthot)}}"><img src="BabyShop_Interface/image/product/{{$sptthot->image}}" alt=""></a>
                                <h6>{{$sptthot->name}}</h6>

                                @if($sptthot->promotion_price != 0)
                                    <span class="flash-del">{{number_format($sptthot->unit_price)}}vnđ</span>
                                    <span class="flash-sale">{{number_format($sptthot->promotion_price)}}vnđ</span>
                                @else
                                    <span class="flash">{{number_format($sptthot->unit_price)}}vnđ</span>
                                @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection