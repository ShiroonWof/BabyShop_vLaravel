@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
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
                        <th>Full_Name</th>
                        <th>Email</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admin as $ad)
                        <tr class="odd gradeX" align="center">
                            <td>{{$ad->id}}</td>
                            <td>{{$ad->full_name}}</td>
                            <td>{{$ad->email}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/admin/delete/{{$ad->id}}"> Delete admin</a></td>
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
