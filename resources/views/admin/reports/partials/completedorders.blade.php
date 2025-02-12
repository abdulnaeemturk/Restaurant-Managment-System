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
            <h3 class="card-title">{{ $mainTitle }} {{ $pageTitle }} </h3>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $record)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td><?php   echo $record->customer ?>   </td>
                            <?php 
                            $location = $record->table->location->name ?? '';
                            $table_number = $record->table->table_number ?? '';
                            ?>
                            <td><?php   echo $table_number." | ". $location; ?>   </td>
                            <td><?php   echo $status[$record->status] ?>   </td>
                            <td><?php   echo $record->paid_by ?>   </td>
                            <td><?php   echo $record->description ?>   </td>
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
                            onclick="fetchLatestCompletedRecordsPagination('completed_orders_data', 1, 0, {{ $data->perPage() }})"
                            @endif id="data_1">
                            <span class="page-link" aria-hidden="true">‹‹ First </span>
                        </li>
                        @for($i=1; $i<=$data->lastPage(); $i++)
                            <li class="page-item @if($i == $data->currentPage()) active @endif" @if($i !=$data->
                                currentPage()) onclick="fetchLatestCompletedRecordsPagination('completed_orders_data', {{ $i }}, 0,
                                {{ $data->perPage() }})" @endif id="data_{{ $i }}" aria-current="page" id=""><span
                                    class="page-link">{{ $i }}</span></li>
                        @endfor
                        <li class="page-item">
                            <span class="page-link" @if($data->currentPage() == $data->lastPage() ) disabled @endif
                                rel="LAST" aria-label="LAST »" @if($data->currentPage() != $data->lastPage() )
                                onclick="fetchLatestCompletedRecordsPagination('completed_orders_data', {{ $data->lastPage() }}, 0,
                                {{ $data->perPage() }})" @endif id="data_{{ $data->lastPage() }}">LAST ››</span>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    @endif
