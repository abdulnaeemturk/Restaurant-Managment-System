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
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Order Information</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-xsmall">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Table</th>
                        <th>status</th>
                        <th>paid</th>
                        <th>description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $record)
                        <tr>
                            <td>{{ $counter }}</td>
                            @include('admin.order.partials.records')
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-sm btn-warning"
                                        onclick="editCurrentRecord({{ $record->id }})">Edit Order</button>

                                    @if($record->status == 0)
                                        <form method="POST" action="#" id="delete_form{{ $record->id }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" id="id" name="id" value="{{ $record->id }}">
                                        </form>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="deleteCurrentRecord({{ $record->id }})">Delete</button>
                                    @endif
                                    <button type="button" class="btn btn-sm btn-primary"
                                        onclick="detailOrder({{ $record->id }}, 'admin/orderdetail/', 'order_detail')">Detail</button>
                                </div>
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
                            onclick="fetchLatestRecordsPagination('records_table', 1, 0, {{ $data->perPage() }})"
                            @endif id="data_1">
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
