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
                        <li class="breadcrumb-item active">Website Setting</li>
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
                <div class="col-md">
                    <!-- general form elements -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Your Website Setting</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('setting.seo.update') }}" method="post">
                        @csrf
                        <div class="row card-body">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <select class="form-control" name="currency">
                                        <option value="৳" @if( $data->currency == '৳' ) selected @endif >TAKA(৳)</option>
                                        <option value="$" @if( $data->currency == '$' ) selected @endif >USD($)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="phoneOne">Phone One</label>
                                    <input type="text" class="form-control" name="phone_one" value="{{ $data->phone_one }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="phoneTwo">Phone Two</label>
                                    <input type="text" class="form-control" name="phone_two" value="{{ $data->phone_two }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="mainEmail">Main Email</label>
                                    <input type="text" class="form-control" name="main_email" value="{{ $data->main_email }}">
                                </div>
                                <div class="form-group">
                                    <label for="supportEmail">Support Email</label>
                                    <input type="text" class="form-control" name="support_email" value="{{ $data->support_email }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" class="form-control">{{ $data->address }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ $data->facebook }}">
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" value="{{ $data->twitter }}">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" value="{{ $data->instagram }}">
                                </div>
                                <div class="form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" class="form-control" name="linkedin" value="{{ $data->linkedin }}">
                                </div>
                                <div class="form-group">
                                    <label for="youtube">Youtube</label>
                                    <input type="text" class="form-control" name="youtube" value="{{ $data->youtube }}">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control" name="logo" value="{{ $data->logo }}">
                                </div>
                                <div class="form-group">
                                    <label for="favicon">Favicon</label>
                                    <input type="file" class="form-control" name="favicon" value="{{ $data->favicon }}">
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $data->id }}">
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
@endsection