@extends('layouts.adminlte')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATABASE BOOKS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">Database</li>
                        <li class="breadcrumb-item active">Book</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="card card-primary card-outline">
            <div class="card header">
                <div class="card-tools m-3">
                    <a href="{{route('admin.books.create')}}" class="btn btn-success">Add Book  <i class="fas fa-plus-square"></i></a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Synopsis</th>
                        <th>Cover</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($dtbook as $item)
                    <tr>
                        <th>{{$item->title}}</th>
                        <th>{{$item->author}}</th>
                        <th>{{$item->synopsis}}</th>
                        <th>{{$item->cover}}</th>
                        <th>{{$item->status}}</th>
                        {{-- <td>
                            <a href=""></a> | <form action=""></form>
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </td> --}}
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@endsection

</body>

</html>
