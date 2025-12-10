<?php 
$counter = 1; 
if($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
{
    if($data->currentPage() >= 2)
    {
        $counter = ($data->currentPage()-1)*$data->perPage();
    }
}

$status[0] = 'Pending';
$status[1] = 'Paid';
$status[2] = 'Kitchen';
$status[3] = 'Competed';

?>



<h3>Order
    <select class="form-control float-end" name="order_action" id="order_action">
        <option value="detail" selected> Detail View </option>
        <option value="edit"> Edit </option>
        <option value="delete"> Delete </option>
    </select></h3>

<div class="order-box">
    <p><strong>Order ID:</strong> #<span id="order_id"> </span></p>
    <p><strong>Customer:</strong> <span id="order_customername"> </span></p>
    <p><strong>Table:</strong> <span id="order_table_number"> </span></p>
    <p><strong>Status:</strong> <span id="order_status"> </span></p>
</div>

<h4>Orders</h4>
<div class="order-list">

    @foreach($data as $record)
        <div class="order-item-small status-{{ $status[$record->status] }}" id="orderinformation-{{$record->id }}" order_id="{{ $record->id }}"
            order_status="{{ $status[$record->status] }}" 
            order_customername="{{ $record->customer }}"
            order_description="{{ $record->description }}"
            order_table_number="{{ $record->table->table_number ?? '' }}"
            onclick="orderAction(this)">
            {{ $record->customer }} #{{ $record->id }} -
            {{ $record->table->table_number ?? '' }}
        </div>
        @if($record->status == 0)
            <form method="POST" action="#" id="delete_form{{ $record->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" id="id" name="id" value="{{ $record->id }}">
            </form>
        @endif
    @endforeach
</div>



