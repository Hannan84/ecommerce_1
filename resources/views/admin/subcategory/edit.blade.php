<form action="{{ route('subcategory.update') }}" method="post">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="category_id">Category Name <span class="text-danger">*</span></label>
            <select class="form-control" name="category_id" required>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($category->id == $data->category_id) selected @endif >{{$category->category_name}}</option>
                @endforeach
            </select>
            <input type="hidden" class="form-control" name="id" value="{{ $data->id }}">
        </div>
        <div class="form-group">
            <label for="subcategory_name">SubCategory Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="editsubcategory_name" name="subcategory_name" value="{{ $data->subcategory_name }}" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
        <button type="submit" class="btn btn-primary">submit</button>
    </div>
</form>