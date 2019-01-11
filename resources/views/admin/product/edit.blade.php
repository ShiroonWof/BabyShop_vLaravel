@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>{{$product->name}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $er)
                                {{$er}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('Succeed'))
                        <div class="alert alert-success">{{session('Succeed')}}</div>
                    @endif
                    <form action="admin/product/edit/{{$product->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Product Name" value="{{$product->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>ID type</label>
                            <input class="form-control" name="id_type" placeholder="Please Enter Product Name" value="{{$product->id_type}}"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="description" placeholder="Please Enter Description" value="{{$product->description}}" />
                        </div>
                        <div class="form-group">
                            <label>Unit Price</label>
                            <input class="form-control" name="unit_price" placeholder="Please Enter Unit Price" value="{{$product->unit_price}}"/>
                        </div>
                        <div class="form-group">
                            <label>Promotion Price</label>
                            <input class="form-control" name="promotion_price" placeholder="Please Enter Promotion Price" value="{{$product->promotion_price}}"/>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" name="image" placeholder="Please Enter The Image" value="{{$product->image}}" />
                        </div>
                        <div class="form-group">
                            <label>Unit</label>
                            <input class="form-control" name="unit" placeholder="Please Enter Unit Type" value="{{$product->unit}}"/>
                        </div>
                        <div class="form-group">
                            <label>type</label>
                            <input class="form-control" name="type" placeholder="Please Enter Type" value="{{$product->type}}"/>
                        </div>
                        <button type="submit" class="btn btn-default">Edit Category</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
