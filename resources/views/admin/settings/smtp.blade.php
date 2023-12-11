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
                        <li class="breadcrumb-item active">SMTP Mail</li>
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
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">SMTP Mail Setting</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('setting.smtp.update') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="mailer">MAIL MAILER</label>
                                <input type="text" class="form-control" name="mailer" value="{{ $smtp->mailer }}" placeholder="Mail Lailer Example: smtp">
                            </div>
                            <div class="form-group">
                                <label for="host">MAIL HOST</label>
                                <input type="text" class="form-control" name="host" value="{{ $smtp->host }}" placeholder="Mail Host">
                            </div>
                            <div class="form-group">
                                <label for="port">MAIL PORT</label>
                                <input type="text" class="form-control" name="port" value="{{ $smtp->port }}" placeholder="Mail Port Example: 1025 / 2525">
                            </div>
                            <div class="form-group">
                                <label for="user_name">MAIL USERNAME</label>
                                <input type="text" class="form-control" name="user_name" value="{{ $smtp->user_name }}" placeholder="Mail UserName">
                            </div>
                            <div class="form-group">
                                <label for="password">MAIL PASSWORD</label>
                                <input type="password" class="form-control" name="password" id="password" value="{{ $smtp->password }}" placeholder="Mail Password">
                                <i class="far fa-eye" style="float: right; margin-right: 7px; margin-top: -25px;" id="togglePassword"></i>
                            </div>
                            <input type="hidden" name="id" value="{{ $smtp->id }}">
                        </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $('body').on('click', '#togglePassword', function(e) {
        var id = $("#password");
        if (id.attr("type") == "password") {
            id.attr("type", "text");
        } else {
            id.attr("type", "password");
        }
    });
</script>
@endsection