
<div class="col-md-6">
                <label for="name" class="form-label">Food Name </label> 
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        <i class="error_color" id="error_name" hidden>
                        {{__('name') }} 
                        </i> 
                    </div>
</div>
<div class="col-md-6">
                <label for="price" class="form-label">Price </label> 
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="price" name="price" placeholder="price">
                        <i class="error_color" id="error_price" hidden>
                        {{__('price') }} 
                        </i> 
                    </div>
</div>



<div class="col-md-6">
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

