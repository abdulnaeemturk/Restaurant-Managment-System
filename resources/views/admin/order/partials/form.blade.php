<div class="col-md-12">
                <label for="customer" class="form-label">customer </label> 
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="customer" name="customer" placeholder="customer">
                        <i class="error_color" id="error_customer" hidden>
                        {{__('customer') }} 
                        </i> 
                    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label>Table</label>
        <select id="table_id" name="table_id" class="form-control">
            <option value=""> -- Select Table -- </option>
            @foreach($table as $item)
            <option value="{{ $item->id }}"> {{ $item->location->name }} | {{ $item->table_number }}</option>
            @endforeach
        </select>
    </div>             
</div>

<div class="col-md-12">
                <label for="description" class="form-label">description </label> 
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="description" name="description" placeholder="description">
                        <i class="error_color" id="error_description" hidden>
                        {{__('description') }} 
                        </i> 
                    </div>
</div>

