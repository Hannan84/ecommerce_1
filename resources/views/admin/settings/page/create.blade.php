@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Page Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create your page</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('page.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pageposition">Page Position</label>
                                <select class="form-control" name="page_position">
                                    <option value="1">Line One</option>
                                    <option value="2">Line Two</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pagename">Page Name</label>
                                <input type="text" class="form-control" name="page_name" placeholder="Write Page Name">
                            </div>
                            <div class="form-group">
                                <label for="pagetitle">Page Title</label>
                                <input type="text" class="form-control" name="page_title" placeholder="Write Page Title">
                            </div>
                            <div class="form-group">
                                <label for="pagedescription">Page Description</label>
                                <textarea class="form-control textarea" name="page_description"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection