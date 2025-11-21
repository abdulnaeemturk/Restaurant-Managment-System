<?php 
$counter = 1; 
if($data instanceof \Illuminate\Pagination\LengthAwarePaginator) {
    if($data->currentPage() >= 2) {
        $counter = ($data->currentPage()-1)*$data->perPage();
    }
}
$status_text = [
    1 => "Paid Ready For Cooking",
    2 => "Cooking"
];
?>

<div class="card shadow-sm border-0">
    <div class="card-header bg-light border-bottom">
        <h3 class="card-title text-dark fw-semibold">
            <i class="fas fa-utensils me-2 text-secondary"></i> {{ $status_text[$status] }}
        </h3>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Items</th>
                        <th scope="col">Description</th>
                        <th scope="col">Order Time</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $record)
                        @if(count($record->orderDetail) > 0)
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $record->id }}</td>
                                <td>
                                    @foreach($record->orderDetail as $item)
                                        <span class="badge bg-info text-dark me-1">
                                            {{ $item->food->name }} ({{ $item->piece }})
                                        </span>
                                    @endforeach
                                </td>
                                <td>{{ $record->description }}</td>
                                <td>{{ $record->updated_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    @if($record->status == 1)  
                                        <button type="button" class="btn btn-sm btn-primary"
                                            onclick="updateCurrentOrderStatus({{ $record->id }}, {{ $record->status }})">
                                            <i class="fas fa-check me-1"></i> Make Ready
                                        </button>
                                    @elseif($record->status == 2)  
                                        <button type="button" class="btn btn-sm btn-success"
                                            onclick="updateCurrentOrderStatus({{ $record->id }}, {{ $record->status }})">
                                            <i class="fas fa-utensils me-1"></i> Finished
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <?php $counter++; ?>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination -->
@if($data instanceof \Illuminate\Pagination\LengthAwarePaginator && method_exists($data,'links'))
    <div class="col-md-12 mt-3">
        <nav>
            <ul class="pagination justify-content-center">
                <!-- First -->
                <li class="page-item @if($data->currentPage() == 1) disabled @endif">
                    <a class="page-link" href="javascript:void(0)" 
                       @if($data->currentPage() != 1) 
                           onclick="fetchLatestRecordsPagination('records_table', 1, 0, {{ $data->perPage() }})" 
                       @endif>
                        ‹‹ First
                    </a>
                </li>

                <!-- Pages -->
                @for($i=1; $i<=$data->lastPage(); $i++)
                    <li class="page-item @if($i == $data->currentPage()) active @endif">
                        <a class="page-link" href="javascript:void(0)" 
                           @if($i != $data->currentPage()) 
                               onclick="fetchLatestRecordsPagination('records_table', {{ $i }}, 0, {{ $data->perPage() }})" 
                           @endif>
                            {{ $i }}
                        </a>
                    </li>
                @endfor

                <!-- Last -->
                <li class="page-item @if($data->currentPage() == $data->lastPage()) disabled @endif">
                    <a class="page-link" href="javascript:void(0)" 
                       @if($data->currentPage() != $data->lastPage()) 
                           onclick="fetchLatestRecordsPagination('records_table', {{ $data->lastPage() }}, 0, {{ $data->perPage() }})" 
                       @endif>
                        Last ››
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endif
