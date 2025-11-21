<div class="row">
    <!-- Food Name -->
    <div class="col-md-4 mb-3">
        <label for="name" class="form-label fw-bold">Food Name</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-utensils"></i></span>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter food name">
        </div>
        <small class="text-danger d-none" id="error_name">{{ __('Name is required') }}</small>
    </div>

    <!-- Price -->
    <div class="col-md-4 mb-3">
        <label for="price" class="form-label fw-bold">Price</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Enter price">
        </div>
        <small class="text-danger d-none" id="error_price">{{ __('Price is required') }}</small>
    </div>



    <div class="col-md-4 mb-3">
        <div class="form-group">
            <label>Category</label>
            <select id="category_id" name="category_id" class="form-control">
                <option value=""> -- Select Category -- </option>
                @foreach($foodcategory as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
