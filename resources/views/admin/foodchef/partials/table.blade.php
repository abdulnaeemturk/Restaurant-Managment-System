<?php 
$counter = 1; 
if($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
{
    if($data->currentPage() >= 2)
    {
        $counter = ($data->currentPage()-1)*$data->perPage();
    }
}

$status_text[1] = "Paid Ready For Cooking";
$status_text[2] = "Cooking";

?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $status_text[$status] }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>order id</th>
                        <th>name piece</th>
                        <th>Descriptions</th>
                        <th>Order Time</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $record)
                        @if(count($record->orderDetail) > 0)
                        <tr>
                            <?php  $foodnameandpiece = ""; 
                            foreach($record->orderDetail as $item)
                            {
                                $foodnameandpiece.=$item->food->name." (".$item->piece.")"." <br>";
                            }
                            ?>
                                    <td>{{ $counter }}</td>
                                    <td>{{ $record->id }}</td>
                                    <th><?php echo $foodnameandpiece;  ?></th>
                                    <th>{{ $record->description }}</th>
                                    <th>{{ $record->updated_at->diffForHumans(); }}</th>
                                    <td>
                                        @if($record->status == 1)  
                                        <button type="button" class="btn btn-sm btn-primary"
                                            onclick="updateCurrentOrderStatus({{ $record->id }},{{ $record->status }})">Make Ready</button>
                                        @endif

                                        @if($record->status == 2)  
                                        <button type="button" class="btn btn-sm btn-success"
                                            onclick="updateCurrentOrderStatus({{ $record->id }}, {{$record->status}})">Finished</button>
                                        @endif
                                    </td>
                                    <?php  $counter++;  ?>
                                </tr>
                        @endif
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
