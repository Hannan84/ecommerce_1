<form action="{{ route('warehouse.update') }}" method="post">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="warehouse_name">Warehouse Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="warehouse_name" name="warehouse_name" value="{{ $data->warehouse_name }}" required>
            <input type="hidden"  name="id" value="{{ $data->id }}">
        </div>
        <div class="form-group">
            <label for="warehouse_address">Warehouse Address <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="warehouse_address" name="warehouse_address" value="{{ $data->warehouse_address }}" required>
        </div>
        <div class="form-group">
            <label for="warehouse_phone">Warehouse Phone <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="warehouse_phone" name="warehouse_phone" value="{{ $data->warehouse_phone }}" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">submit</button>
    </div>
</form>