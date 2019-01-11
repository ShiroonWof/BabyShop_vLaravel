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
                        <th>ID_type</th>
                        <th>Description</th>
                        <th>Unit_price</th>
                        <th>Promotion_price</th>
                        <th>Image</th>
                        <th>Unit</th>
                        <th>Type</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $pr)
                        <tr class="odd gradeX" align="center">
                            <td>{{$pr->id}}</td>
                            <td>{{$pr->name}}</td>
                            <td>{{$pr->id_type}}</td>
                            <td>{{$pr->description}}</td>
                            <td>{{$pr->unit_price}}</td>
                            <td>{{$pr->promotion_price}}</td>
                            <td> <img src="BabyShop_Interface/image/product/{{$pr->image}}" width="50" height="50"></td>
                            <td>{{$pr->unit}}</td>
                            <td>{{$pr->type}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$pr->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$pr->id}}">Edit</a></td>
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
