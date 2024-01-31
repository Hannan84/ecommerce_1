<form action="{{ route('coupon.update') }}" method="post" id="edit_form">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="coupon_code">Coupon Code</label>
            <input type="text" class="form-control" id="coupon_code" name="coupon_code" value="{{ $data->coupon_code }}">
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="form-group">
            <label for="coupon_amount">Coupon Amount</label>
            <input type="text" class="form-control" id="coupon_amount" name="coupon_amount" value="{{ $data->coupon_amount }}">
        </div>
        <div class="form-group">
            <label for="coupon_type">Coupon Type</label>
            <select name="coupon_type" id="coupon_type" class="form-control">
                <option value="1" @if($data->type==1) selected @endif >Fixed</option>
                <option value="2" @if($data->type==2) selected @endif >Percentage</option>
            </select>
        </div>
        <div class="form-group">
            <label for="coupon_date">Coupon Date</label>
            <input type="date" class="form-control" id="coupon_date" name="coupon_date" value="{{ $data->valid_date }}">
        </div>
        <div class="form-group">
            <label for="coupon_status">Coupon Status</label>
            <select name="coupon_status" id="coupon_status" class="form-control">
                <option value="active" @if($data->status=='active') selected @endif >Active</option>
                <option value="deactive" @if($data->status=='deactive') selected @endif >Deactive</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">submit</button>
    </div>
</form>
<script type="text/javascript">
        // edit coupon
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