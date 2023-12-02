<form action="{{ route('brand.update') }}" method="post">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="brand_name">Brand Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{ $data->brand_name }}" required>
        </div>
        <div class="form-group">
            <label for="brand_logo">Brand Logo <span class="text-danger">*</span></label>
            <input type="file" class="dropify" data-height="140" value="{{ $data->brand_logo }}" name="brand_logo" required>
        </div>
        <input type="hidden" name="id" value="{{ $data->id }}">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">submit</button>
    </div>
</form>