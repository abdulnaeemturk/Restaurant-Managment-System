<div class="row">
<div class="col-md-4">
    <div class="form-group">
        <label>User</label>
        <select id="user_id" name="user_id" class="form-control">
            <option value=""> -- Select User -- </option>
            @foreach($users as $item)
            <option value="{{ $item->id }}">{{ $item->name }} | {{ $item->email }}</option>
            @endforeach
        </select>
    </div>             
</div>

<div class="col-md-4">
    <div class="form-group">
        <label>Table</label>
        <select id="table_id" name="table_id" class="form-control">
            <option value=""> -- Select Table -- </option>
            @foreach($tables as $item)
            <option value="{{ $item->id }}">  {{ $item->location->name }}  ¦ {{ $item->table_number }}</option>
            @endforeach
        </select>
    </div>             
</div>

<div class="col-md-4">
<label for="pin" class="form-label">pin </label> 
    <div class="input-group mb-2">
        <input type="number" class="form-control" maxlength="6" size="6" id="pin" name="pin" placeholder="pin">
        <i class="error_color" id="error_pin" hidden>
        {{__('pin') }} 
        </i> 
    </div>
</div>
</div>


