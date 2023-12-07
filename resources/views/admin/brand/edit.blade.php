<!-- dropify  -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<form action="{{ route('brand.update') }}" method="post" enctype='multipart/form-data'>
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="brand_name">Brand Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{ $data->brand_name }}" required>
        </div>
        <div class="form-group">
            <label for="brand_logo">Brand Logo <span class="text-danger">*</span></label>
            <input type="file" class="dropify" data-height="140" name="brand_logo">
            <input type="hidden" value="{{ $data->brand_logo }}" name="old_logo">
        </div>
        <input type="hidden" name="id" value="{{ $data->id }}">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">submit</button>
    </div>
</form>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script>
    $('.dropify').dropify();
</script>