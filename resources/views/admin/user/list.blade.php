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
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Remember Token</th>
                        <th>Admin</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $us)
                        <tr class="odd gradeX" align="center">
                            <td>{{$us->id}}</td>
                            <td>{{$us->full_name}}</td>
                            <td>{{$us->email}}</td>
                            <td>{{$us->phone}}</td>
                            <td>{{$us->address}}</td>
                            <td width="10%">{{$us->remember_token}}</td>
                            <td class="center"><a href="admin/user/add/{{$us->id}}"> Add admin</a></td>
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
