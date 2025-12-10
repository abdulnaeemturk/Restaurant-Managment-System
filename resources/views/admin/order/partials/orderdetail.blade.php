<?php $total = 0;  ?>


<h4>Order <span
        style="font-weight: 900;">{{ $data->customer ? $data->customer.' | ': '' }} <?php 
            $location = $data->table->location->name ?? '';
            $table_number = $data->table->table_number ?? '';
            ?>
        <small> {{ $location }} {{ $table_number }}  
            <a href="#" onclick="paid({{ $data->id }})" target="_blank" class="btn btn-sm btn-primary">paid</a>
            </small></h4>
<input type="hidden" value="{{ $data->id }}" id="order_id_for_new_food" name="order_id_for_new_food">



@foreach($data->orderDetail as $item)
    <?php $total += ($item->food->price*$item->piece);
                $imgurl = $item->food->attachment[0]->name ?? 'image.png'; ?>
    <div class="right-items" id="order_detail_row{{ $item->id }}">
        <div class="right-item">
            <img src="{{ asset(''.$imgurl) }}" style="    margin-top: 3%;">
            <div class="item-details">
                <h4>{{ $item->food->name }}</h4>
                <h4>Price : {{ $item->food->price }}</h4>
                <p>
                    <small>
                        @foreach($item->food->foodDetail as $subitem)
                        {{ $subitem->name }} |
                        @endforeach
                    </small>
                </p>


                <span class="badge badge-primary float-right"
                    style="padding: 10px; margin-left: 5px; margin-right: 5px;"> Quantity: <span
                        id="{{ $item->id }}">{{ $item->piece }}</span></span>
                <span class="badge badge-primary float-right " style="margin-left: 5px; margin-right: 5px;">
                    <i class="fas fa-plus quantitycontrolbadge" style="padding: 7px;"
                        onclick="increaseOrDecreseQuantity({{ $item->id }}, 'increase', 'order_detail')"> </i>
                    |
                    <i class="fas fa-minus quantitycontrolbadge" style="padding: 7px;"
                        onclick="increaseOrDecreseQuantity({{ $item->id }}, 'decrease', 'order_detail')">
                    </i></span>

            </div>
        </div>
    </div>
@endforeach

<div class="summary-box">
    <?php 
    $tax=0;$subtotal = 0;
    if($total>0)
    {
        $tax = round((10/$total), 2);
        $subtotal = round($total-$tax, 2);
    }
     ?>
    <p><strong>Subtotal:</strong> {{ $subtotal }}</p>
    <p><strong>Tax:</strong> {{ $tax }}</p>
    <p><strong>Total:</strong> {{ $total }}</p>

    <a href="{{ asset('admin/printorder/'.$data->id) }}" target="_blank"
        class="submit-btn">Submit</a>
</div>
