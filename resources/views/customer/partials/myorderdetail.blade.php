<?php $total = 0;  ?>

    <h3 class="text-center">My Orders</h3>
@foreach($orders as $item)
    <?php 
        $total += ($item->food->price*$item->piece);
        $imgurl = $item->food->attachment[0]->name ?? 'image.png'; 
    ?>

    <div class="card flex-md-row mb-3 p-2" id="temporary_order_row{{ $item->id }}">
    <img src="{{ asset($imgurl) }}" style="width: 90px; height: 70px; object-fit: cover;">
    <div class="card-body">
        <strong>{{ $item->food->name ?? "Notfound" }}</strong>
        <p>  
            @foreach($item->food->foodDetail as $subitem)
                    {{ $subitem->name }} |
                @endforeach
            </p>
        <small>
            Price per : {{ $item->food->price ?? 0 }}  <br>
            Quantity:
            <i class="fa fa-plus increasedecrease" onclick="increaseOrDecreseQuantity({{ $item->id }}, 'increase', 'result_set')"></i>
            <span id="{{ $item->id }}">{{ $item->piece }}</span>
            <i class="fa fa-minus increasedecrease" onclick="increaseOrDecreseQuantity({{ $item->id }}, 'decrease', 'result_set')"></i>
            <br>Amount: {{ ($item->food->price*$item->piece) }}
        </small>
    </div>
    </div>
@endforeach
@if(count($orders) > 0)
    <h4 class="mt-4 text-end">
    Total: <span id="totalorderamount">{{ $total }}</span>
    </h4>
    <button class="btn btn-primary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreenSm">Pay</button>
@endif


<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreenSm">Full screen below sm</button> -->