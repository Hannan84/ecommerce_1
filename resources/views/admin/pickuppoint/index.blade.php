@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">PickupPoint</h1>
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
                            <h3 class="card-title">PickupPoint List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="" class="table table-bordered table-hover table-sm ytable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>PickupPoint Name</th>
                                        <th>PickupPoint Address</th>
                                        <th>PickupPoint Phone</th>
                                        <th>Alternate Phone</th>
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
                <h5 class="modal-title" id="addModalLabel">New PickupPoint</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pickupPoint.store') }}" method="post" id="add_form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">PickupPoint Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter PickupPoint Name" required>
                    </div>
                    <div class="form-group">
                        <label for="address">PickupPoint Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter PickupPoint Address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">PickupPoint Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter PickupPoint Phone" required>
                    </div>
                    <div class="form-group">
                        <label for="alternate_phone">PickupPoint Alternate Phone</label>
                        <input type="text" class="form-control" id="alternate_phone" name="alternate_phone" placeholder="Enter PickupPoint Alternate Phone">
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
                <h5 class="modal-title" id="editModalLabel">Update PickupPoint</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-body">

            </div>
        </div>
    </div>
</div>

<!-- delete form  -->
<form action="" method="delete" id="delete_form">
    @csrf @method('DELETE')
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(function dataTable() {
        table = $('.ytable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('pickupPoint.index')}}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'alternate_phone',
                    name: 'alternate_phone'
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

    // add pickupPoint
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

    // edit pickupPoint script 
    $('body').on('click', '.edit', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.get("pickupPoint/edit/" + id, function(data) {
            $('#modal-body').html(data);
        });
    });

    // delete pickupPoint
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