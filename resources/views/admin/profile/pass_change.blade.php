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
                        <li class="breadcrumb-item active">Password Change</li>
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
                        <h3 class="card-title">Change your password</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.password.update') }}" method="post">
                        @csrf
                        <div class="card-body">
                        <div class="form-group">
                            <label for="oldpassword">Old Password</label>
                            <input type="password" class="form-control" name="oldpassword" id="oldpassword" value="{{old('oldpassword')}}" placeholder="Old Password" required>
                            <i class="far fa-eye " style="float: right; margin-right: 7px; margin-top: -25px;" id="toggleOldPassword"></i>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                            <i class="far fa-eye" style="float: right; margin-right: 7px; margin-top: -25px;" id="toggleNewPassword"></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="passwordCon">Confirm Password</label>
                            <input type="password" class="form-control" name="passwordConfirmation" id="passwordCon" placeholder="Confirm Password" required>
                            <i class="far fa-eye" style="float: right; margin-right: 7px; margin-top: -25px;" id="toggleConPassword"></i>
                        </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
    // show password script 
    $('body').on('click', '#toggleOldPassword', function(e) {
        var id = $("#oldpassword");
        if (id.attr("type") == "password") {
            id.attr("type", "text");
        } else {
            id.attr("type", "password");
        }
    });
    $('body').on('click', '#toggleNewPassword', function(e) {
        var id = $("#password");
        if (id.attr("type") == "password") {
            id.attr("type", "text");
        } else {
            id.attr("type", "password");
        }
    });
    $('body').on('click', '#toggleConPassword', function(e) {
        var id = $("#passwordCon");
        if (id.attr("type") == "password") {
            id.attr("type", "text");
        } else {
            id.attr("type", "password");
        }
    });
</script>
@endsection