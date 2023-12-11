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
                        <li class="breadcrumb-item active">OnPage SEO</li>
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
                        <h3 class="card-title">Your SEO Setting</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('setting.seo.update') }}" method="post">
                        @csrf
                        <div class="row card-body">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="metaTitle">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" value="{{ $data->meta_title }}" placeholder="Meta Title">
                                </div>
                                <div class="form-group">
                                    <label for="metaAuthor">Meta Author</label>
                                    <input type="text" class="form-control" name="meta_author" value="{{ $data->meta_author }}" placeholder="Meta Author">
                                </div>
                                <div class="form-group">
                                    <label for="metaKeyword">Meta Keyword <small>(seperate by , coma)</small></label>
                                    <input type="text" class="form-control" name="meta_keyword" value="{{ $data->meta_keyword }}" placeholder="Example:ecommerce,online shop">
                                </div>
                                <div class="form-group">
                                    <label for="metaDescription">Meta Description</label>
                                    <textarea name="meta_description" class="form-control">{{ $data->meta_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="googleVerification">Google Verification</label>
                                    <input type="text" class="form-control" name="google_verification" value="{{ $data->google_verification }}" placeholder="Put here only verification code">
                                </div>
                                <div class="form-group">
                                    <label for="alexaVerification">Alexa Verification</label>
                                    <input type="text" class="form-control" name="alexa_verification" value="{{ $data->alexa_verification }}" placeholder="Put here only verification code">
                                </div>
                                <div class="form-group">
                                    <label for="googleAnalytics">Google Analytics</label>
                                    <textarea name="google_analytics" class="form-control">{{ $data->google_analytics }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="googleAdsense">Google Adsense</label>
                                    <textarea name="google_adsense" class="form-control">{{ $data->google_adsense }}</textarea>
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