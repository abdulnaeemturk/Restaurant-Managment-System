<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Location</label>
            <select id="location_id" name="location_id" class="form-control">
                <option value=""> -- Select Location -- </option>
                @foreach($tablelocation as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <label for="table_number" class="form-label">Table Number </label>
        <div class="input-group mb-2">
            <input type="text" class="form-control" id="table_number" name="table_number" placeholder="table_number">
            <i class="error_color" id="error_table_number" hidden>
                {{ __('table_number') }}
            </i>
        </div>
    </div>

    <div class="col-md-3">
        <label for="person_allocate" class="form-label">Person Allocation </label>
        <div class="input-group mb-2">
            <input type="text" class="form-control" id="person_allocate" name="person_allocate"
                placeholder="person_allocate">
            <i class="error_color" id="error_person_allocate" hidden>
                {{ __('person_allocate') }}
            </i>
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label>Reservation</label>
            <select id="reservation" name="reservation" class="form-control">
                <option value="0"> Not Reserved </option>
                <option value="1"> Reserved </option>
            </select>
        </div>
    </div>
</div>
