<form action="{{ route('childcategory.update') }}" method="post">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="subcategory_id">Category/Subcategory<span class="text-danger">*</span></label>
            <select class="form-control" name="subcategory_id" required>
                @foreach ($categories as $category)
                <option>{{$category->category_name}}</option>
                @foreach ($subcategories as $subcategory)
                @if ($category->id == $subcategory->category_id)
                <option value="{{$subcategory->id}}"> --- {{ $subcategory->subcategory_name }}</option>
                @endif
                @endforeach
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="form-group">
            <label for="childcategory_name">ChildCategory Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="childcategory_name" name="childcategory_name" value="{{ $data->childcategory_name }}" placeholder="Enter ChildCategory Name" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">submit</button>
    </div>
</form>