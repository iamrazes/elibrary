@extends('layouts.adminlte')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DATABASE MANGAS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                        <li class="breadcrumb-item active">Database</li>
                        <li class="breadcrumb-item active">Manga - Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="card card-primary card-outline">
            <h4 class="mt-3 ml-4">Add New Manga</h4>
            <div class="card-body">
                <form action="{{route('admin.mangas.save')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="nama" name="title" class="form-control" placeholder="Title...">
                    </div>
                    <div class="form-group">
                        <input type="text" id="nama" name="author" class="form-control" placeholder="Author...">
                    </div>
                    <div class="form-group">
                        <textarea type="text" id="nama" name="synopsis" class="form-control" placeholder="Synopsis..."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" id="nama" name="cover" class="" placeholder="Cover...">
                    </div>
                    <div class="form-group">
                        <!-- <input type="text" id="nama" name="status" class="form-control" placeholder="Status..."> -->
                        <select name="status" id="status" class="btn btn-white rounded border">
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@endsection

</body>

</html>
