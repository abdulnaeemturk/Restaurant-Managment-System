<?php $total = 0;  ?>
<h1>My Orders</h1>

@foreach($orders as $item)
    <?php 
        $total += ($item->food->price*$item->piece);
        $imgurl = $item->food->attachment[0]->name ?? 'image.png'; 
    ?>

    <div class="card flex-md-row mb-4 box-shadow h-md-250" id="temporary_order_row{{ $item->id }}">
      
        <img class="" src="{{ asset($imgurl) }}" data-holder-rendered="true"
            style="width: 100px; height: 70px;margin: 15px;">  
        <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">
                {{ $item->food->name ?? "Notfound" }}
            </strong>
            <p class="card-text mb-auto">
                @foreach($item->food->foodDetail as $subitem)
                    {{ $subitem->name }} |
                @endforeach
            </p>
            <br>
            <p style="width: 100%;">

                <small style="float:right">
                <small >Price per : {{ $item->food->price ?? 0 }}  <br>
                </small>
                    Quantoty :
                    <small onclick="increaseOrDecreseQuantity({{ $item->id }}, 'increase', 'result_set')"> <i
                            class="fa fa-plus increasedecrease"></i></small>
                    <span id="{{ $item->id }}">{{ $item->piece }}</span>
                    <small onclick="increaseOrDecreseQuantity({{ $item->id }}, 'decrease', 'result_set')"> <i
                            class="fa fa-minus increasedecrease"></i> </small>
                            <br>
                    Amount :
                    {{ ($item->food->price*$item->piece) }}
                </small>
            </p>


        </div>
    </div>
@endforeach

@if(count($orders) > 0)
    <p class="float-end" style="font-size: x-large;font-weight: 600;"> Total : <span id="totalorderamount">{{ $total }}</span>  <br>
        <small><button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreenSm">Pay</button><small>

        </p>
@endif


<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreenSm">Full screen below sm</button> -->