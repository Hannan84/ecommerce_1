@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Warehouse</h1>
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
                            <h3 class="card-title">Warehouse List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="" class="table table-bordered table-hover table-sm ytable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Warehouse Name</th>
                                        <th>Warehouse Address</th>
                                        <th>Warehouse Phone</th>
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
                <h5 class="modal-title" id="addModalLabel">New Warehouse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('warehouse.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="warehouse_name">Warehouse Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="warehouse_name" name="warehouse_name" placeholder="Enter Warehouse Name" required>
                    </div>
                    <div class="form-group">
                        <label for="warehouse_address">Warehouse Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="warehouse_address" name="warehouse_address" placeholder="Enter Warehouse Address" required>
                    </div>
                    <div class="form-group">
                        <label for="warehouse_phone">Warehouse Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="warehouse_phone" name="warehouse_phone" placeholder="Enter Warehouse Phone" required>
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
                <h5 class="modal-title" id="editModalLabel">Update Warehouse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(function warehouse() {
        var table = $('.ytable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('warehouse.index')}}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'warehouse_name',
                    name: 'warehouse_name'
                },
                {
                    data: 'warehouse_address',
                    name: 'warehouse_address'
                },
                {
                    data: 'warehouse_phone',
                    name: 'warehouse_phone'
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
</script>
<script>
    // edit warehouse script 
    $('body').on('click', '.edit', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.get("warehouse/edit/" + id, function(data) {
            $('.modal-body').html(data);
        });
    });
</script>
@endsection