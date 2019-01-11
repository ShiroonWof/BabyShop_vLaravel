@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('Succeed'))
                    <div class="alert alert-success">{{session('Succeed')}}</div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $ca)
                    <tr class="odd gradeX" align="center">
                        <td>{{$ca->id}}</td>
                        <td>{{$ca->name}}</td>
                        <td>{{$ca->description}}</td>
                        <td> <img src="BabyShop_Interface/image/product/{{$ca->image}}" width="50" height="50"></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/delete/{{$ca->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/edit/{{$ca->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
