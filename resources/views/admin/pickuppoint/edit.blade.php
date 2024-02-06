<form action="{{ route('pickupPoint.update') }}" method="post" id="edit_form">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="name">PickupPoint Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="form-group">
            <label for="address">PickupPoint Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $data->address }}" required>
        </div>
        <div class="form-group">
            <label for="phone">PickupPoint Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}" required>
        </div>
        <div class="form-group">
            <label for="alternate_phone">PickupPoint Alternate Phone</label>
            <input type="text" class="form-control" id="alternate_phone" name="alternate_phone" value="{{ $data->alternate_phone }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">submit</button>
    </div>
</form>
<script type="text/javascript">
        // edit PickupPoint
    $('#edit_form').submit(function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var request = $(this).serialize();
        $.ajax({
            url:url,
            type:'post',
            data:request,
            success:function(data){
                toastr.success(data);
                $('#edit_form')[0].reset();
                $('#editModal').modal('hide');
                table.ajax.reload();
            }
        });
    });
</script>