<?php 
$counter = 1; 
if($data instanceof \Illuminate\Pagination\LengthAwarePaginator) {
    if($data->currentPage() >= 2) {
        $counter = ($data->currentPage()-1)*$data->perPage();
    }
}
$status_text = [
    1 => "Waiting For Cooking",
    2 => "Cooking",
    3 => "Completed"
];

$status_color = [
    1 => "secondary",
    2 => "info",
    3 => "success"
];

$status_txt = [
    1 => "Make Ready",
    2 => "Finished",
    3 => "Completed"
];
?>

@foreach($data as $record)
    @if(count($record->orderDetail) > 0)
        <div class="order-card border-{{ $status_color[$status] }}">
            <div class="order-header">
                <span class="order-id bg-{{ $status_color[$status] }}">{{ $status_text[$status] }} #{{ $record->id }}</span>
                <span class="order-time">{{ $record->updated_at->diffForHumans() }}</span>
            </div>
            <ul class="order-items">
                 @foreach($record->orderDetail as $item)
                <li>{{ $item->piece }} × {{ $item->food->name }}</li>
                @endforeach
                
            </ul>
            <p class="order-note">{{ $record->description }}</p>
            @if($status !=3)
            <button class="btn btn-{{ $status_color[$status] }} btn-block"  onclick="updateCurrentOrderStatus({{ $record->id }}, {{ $record->status }})">{{ $status_txt[$status] }}</button>
            @endif
        </div>
    @endif
@endforeach









