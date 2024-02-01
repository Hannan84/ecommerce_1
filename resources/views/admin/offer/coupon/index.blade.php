@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Coupon</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">+ Add New</button>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Coupon List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="" class="table table-bordered table-hover table-sm ytable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Coupon Code</th>
                                        <th>Coupon Amount</th>
                                        <th>Coupon Date</th>
                                        <th>Coupon Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">New Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('coupon.store') }}" method="post" id="add_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="coupon_code">Coupon Code</label>
                        <input type="text" class="form-control" id="coupon_code" name="coupon_code" placeholder="Enter Coupon Code">
                    </div>
                    <div class="form-group">
                        <label for="coupon_amount">Coupon Amount</label>
                        <input type="text" class="form-control" id="coupon_amount" name="coupon_amount" placeholder="Enter Coupon Amount">
                    </div>
                    <div class="form-group">
                        <label for="coupon_type">Coupon Type</label>
                        <select name="coupon_type" id="coupon_type" class="form-control">
                            <option value="1">Fixed</option>
                            <option value="2">Percentage</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="coupon_date">Coupon Date</label>
                        <input type="date" class="form-control" id="coupon_date" name="coupon_date">
                    </div>
                    <div class="form-group">
                        <label for="coupon_status">Coupon Status</label>
                        <select name="coupon_status" id="coupon_status" class="form-control">
                            <option value="active">Active</option>
                            <option value="deactive">Deactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Update Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-body">

            </div>
        </div>
    </div>
</div>

<!-- delete coupon form  -->
<form action="" method="delete" id="delete_form">
    @csrf @method('DELETE')
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(function coupon() {
        table = $('.ytable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('coupon.index')}}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'coupon_code',
                    name: 'coupon_code'
                },
                {
                    data: 'coupon_amount',
                    name: 'coupon_amount'
                },
                {
                    data: 'valid_date',
                    name: 'valid_date'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    });

    // add coupon
    $('#add_form').submit(function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var request = $(this).serialize();
        $.ajax({
            url:url,
            type:'post',
            data:request,
            success:function(data){
                toastr.success(data);
                $('#add_form')[0].reset();
                $('#addModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

    // edit coupon script 
    $('body').on('click', '.edit', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.get("coupon/edit/" + id, function(data) {
            $('#modal-body').html(data);
        });
    });

    // delete coupon
    $(document).ready(function(){
        $(document).on('click', '#delete_coupon',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $('#delete_form').attr('action',url);
            if (confirm('Are you sure you?')){
                $('#delete_form').submit();
            }
        });
        $('#delete_form').submit(function(e){
            e.preventDefault();
            var url = $(this).attr('action');
            var request = $(this).serialize();
            $.ajax({
                url:url,
                type:'post',
                async:false,
                data:request,
                success:function(data){
                    toastr.success(data);
                    $('#delete_form')[0].reset();
                    table.ajax.reload();
                }
            });
        });
    });
</script>
@endsection