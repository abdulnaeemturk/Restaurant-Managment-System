<div class="col-md-6">
                <label for="name" class="form-label">name </label> 
                    <div class="input-group mb-2">
                        <input type="hidden" class="form-control" value="{{$food_id}}" id="food_id" name="food_id" placeholder="food_id">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        <i class="error_color" id="error_name" hidden>
                        {{__('name') }} 
                        </i> 
                    </div>
</div>
<div class="col-md-6">
                <label for="description" class="form-label">description </label> 
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="description" name="description" placeholder="description">
                        <i class="error_color" id="error_description" hidden>
                        {{__('description') }} 
                        </i> 
                    </div>
</div>

