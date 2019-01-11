@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>{{$category->name}}</small>
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
                    <form action="admin/category/edit/{{$category->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Category Name" value="{{$category->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="description" placeholder="Please Enter Description" value="{{$category->description}}" />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" name="image" placeholder="Please Enter The Image" value="{{$category->image}}" />
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

