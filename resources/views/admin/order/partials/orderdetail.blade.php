<?php $total = 0;  ?>
<div class="card">
    <div class="card-header">
        <input type="hidden" value="{{ $data->id }}" id="order_id_for_new_food" name="order_id_for_new_food">
        <h3 class="card-title">Order Information <span style="font-weight: 900;">{{ $data->customer ? $data->customer.' | ': '' }}
            <?php 
            $location = $data->table->location->name ?? '';
            $table_number = $data->table->table_number ?? '';
            ?>
            {{ $location }}  {{ $table_number }}</span> <small> <a href="#" onclick="paid({{$data->id}})" target="_blank" class="btn btn-sm btn-primary" >paid</a></small></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <ul class="products-list product-list-in-card pl-2 pr-2">
            @foreach($data->orderDetail as $item)
            <li class="item" id="order_detail_row{{ $item->id }}">
                <div class="product-img">
                <?php $total += ($item->food->price*$item->piece);
                $imgurl = $item->food->attachment[0]->name ?? 'image.png'; ?>
                    <img src="{{ asset(''.$imgurl) }}" alt="Product Image" class="img-size-50">
                </div>
                <div class="product-info" >
                    <a href="#" class="product-title">{{ $item->food->name }}
                        <span class="badge badge-warning float-right" style="padding: 10px; margin-left: 5px; margin-right: 5px;"> {{ $item->food->price }} </span>  
                        <span class="badge badge-primary float-right" style="padding: 10px; margin-left: 5px; margin-right: 5px;" >  Quantity : <span id="{{ $item->id }}">{{ $item->piece }}</span></span>
                        <span class="badge badge-primary float-right" style="margin-left: 5px; margin-right: 5px;"> 
                            <i class="fas fa-plus" style="padding: 7px;" onclick="increaseOrDecreseQuantity({{$item->id}}, 'increase', 'order_detail')"> </i>
                            | 
                            <i class="fas fa-minus" style="padding: 7px;" onclick="increaseOrDecreseQuantity({{$item->id}}, 'decrease', 'order_detail')"> </i></span>
                    </a>
                    <span class="product-description">
                        @foreach($item->food->foodDetail as $subitem)
                        {{ $subitem->name }} | 
                        @endforeach
                    </span>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <div style="font-weight: 900;" class="card-footer text-right">
            Total : {{$total}}  <a href="{{ asset('admin/printorder/'.$data->id) }}" target="_blank" class="btn btn-sm btn-primary" >Print</a>
    </div>

</div>
