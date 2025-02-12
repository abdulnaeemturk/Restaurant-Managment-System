<!-- Header -->
@section('stylecss')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/css/toastr.min.css') }}">
@endsection
@include('adminlayout.header')
<!-- /. Header -->
<!-- Navbar -->
@include('adminlayout.navbar')
<!-- /.navbar -->
<!-- Main Sidebar Container -->
@include('adminlayout.mainsidebar')
<!-- /. Main Sidebar Container -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $pageTitle }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ $mainTitle }}</a></li>
                        <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- container-fluid -->
        <div class="container-fluid">

            <!-- Starts foodchef form Area -->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">foodchef Info</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="row"  id="records_table">
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="row" id="records_table1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                            <select class="form-control float-end" name="completed_records_perpage" id="completed_records_perpage" onchange="fetchLatestCompletedRecordsPagination()">
                                    <option value="10"> 10 </option>
                                    <option value="20"> 20 </option>
                                    <option value="50"> 50 </option>
                                    <option value="100"> 100 </option>
                                    <option value="200"> 200 </option>
                                    <option value="500"> 500 </option>
                                    <option value="1000"> 1000 </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" id="completed_orders_data"></div>

                    </div>


                </div>
                <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<span id="information" style="display:none"></span>

<!-- footer Section with js scripts -->
@section('scriptjs')
<script src="{{ asset('assets/dist/js/toastr.min.js') }}" type="text/javascript"></script>

<script>
    var _GLOBAL_URL = "{{ asset('') }}";
    var _TOKEN = "{{ csrf_token() }}";

    function updateCurrentOrderStatus(_record_id, _status = 1) {
        var action_completed =  fetchViewDynamically('admin/updatefoodstatus/'+_record_id, 'information');
        if (action_completed == "success") {
            fetchLatestRecordsPagination();
            fetchLatestRecordsPagination('records_table1', 2);
            if(_status == 1)
            {
                window.open(_GLOBAL_URL+'admin/printkitchenorder/'+_record_id,'_blank');
            }
            fetchLatestCompletedRecordsPagination();
        }
    }
    
    function fetchLatestRecordsPagination(_foodchef_appendable = 'records_table', _status = 1)
    {
        fetchViewDynamically('admin/getkitchenbysatus/'+_status, _foodchef_appendable);
    }

    function fetchLatestCompletedRecordsPagination(_order_appendable = 'completed_orders_data', _page_number = 0, _appened = 0,
        _per_page = 10) {

        _start_date = new Date().toISOString().split('T')[0];
        _end_date = new Date().toISOString().split('T')[0];
       
        if (_per_page == 10) {
            _per_page = $('#completed_records_perpage option:selected').val();
        }
        fetchRecordsDynamically(_order_appendable, 'shared/reports/completedorder/'+_start_date+'/'+_end_date, _per_page, _page_number, _appened);
    }

    
    $(document).ready(function () {
        fetchLatestRecordsPagination();
        fetchLatestRecordsPagination('records_table1', 2);
        fetchLatestCompletedRecordsPagination('completed_orders_data');
    });


</script>

@endsection

@include('adminlayout.footer')
<!-- footer Section with js scripts -->
