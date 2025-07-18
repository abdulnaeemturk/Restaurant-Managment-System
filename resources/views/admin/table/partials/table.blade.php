<?php 
$counter = 1; 
if($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
{
    if($data->currentPage() >= 2)
    {
        $counter = ($data->currentPage()-1)*$data->perPage();
    }
}
$reservation[0] = "Not Reserved";
$reservation[1] = "Reserved";
?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Food Information</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Location</th>
                        <th>Table Number</th>
                        <th>Person Allocation</th>
                        <th>Reservation</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $record)
                        <tr>
                            <td>{{ $counter }}</td>
                            @include('admin.table.partials.records')
                            <td>
                                <button type="button" class="btn btn-sm btn-warning"
                                    onclick="editCurrentRecord({{ $record->id }})">Edit</button>

                                <form method="POST" action="#" id="delete_form{{ $record->id }}"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" id="id" name="id" value="{{ $record->id }}">
                                </form>
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="deleteCurrentRecord({{ $record->id }})">Delete</button>
                            </td>
                        </tr>
                        <?php  $counter++;  ?>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>


@if($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="col-md-12">
        @if( method_exists($data,'links') )
            <nav>
                <ul class="pagination">

                    <li class="page-item" @if($data->currentPage() == 1) disabled @endif aria-disabled="true"
                        aria-label="« FIRST" @if($data->currentPage() != 1)
                        onclick="fetchLatestRecordsPagination('records_table', 1, 0, {{ $data->perPage() }})" @endif
                        id="data_1">
                        <span class="page-link" aria-hidden="true">‹‹ First </span>
                    </li>
                    @for($i=1; $i<=$data->lastPage(); $i++)
                        <li class="page-item @if($i == $data->currentPage()) active @endif" @if($i !=$data->
                            currentPage()) onclick="fetchLatestRecordsPagination('records_table', {{ $i }}, 0,
                            {{ $data->perPage() }})" @endif id="data_{{ $i }}" aria-current="page" id=""><span
                                class="page-link">{{ $i }}</span></li>
                    @endfor
                    <li class="page-item">
                        <span class="page-link" @if($data->currentPage() == $data->lastPage() ) disabled @endif
                            rel="LAST" aria-label="LAST »" @if($data->currentPage() != $data->lastPage() )
                            onclick="fetchLatestRecordsPagination('records_table', {{ $data->lastPage() }}, 0,
                            {{ $data->perPage() }})" @endif id="data_{{ $data->lastPage() }}">LAST ››</span>
                    </li>
                </ul>
            </nav>
        @endif
    </div>
@endif
