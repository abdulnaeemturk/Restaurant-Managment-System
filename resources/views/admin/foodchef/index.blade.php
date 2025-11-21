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

<!-- Header -->
@section('stylecss')
<link rel="stylesheet" href="{{ asset('assets/dist/css/toastr.min.css') }}">
@endsection

@include('adminlayout.header')
@include('adminlayout.navbar')
@include('adminlayout.mainsidebar')

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Page Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">{{ $pageTitle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ $mainTitle }}</a></li>
                        <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <!-- FoodChef Section -->
            <div class="card shadow-sm border-secondary">
                <div class="card-header bg-secondary text-white">
                    <h3 class="card-title"><i class="fas fa-user-chef me-2"></i> FoodChef Info</h3>
                </div>
                <div class="card-body">
                    
                    <!-- Active & Pending Orders -->
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="fw-bold text-muted mb-2">Active Orders</h5>
                            <div class="row border rounded p-2 bg-light" id="records_table"></div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-bold text-muted mb-2">Pending Orders</h5>
                            <div class="row border rounded p-2 bg-light" id="records_table1"></div>
                        </div>
                    </div>

                    <!-- Completed Orders -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-light border rounded">
                                <span class="fw-bold text-secondary">
                                    <i class="fas fa-check-circle me-1"></i> Completed Orders
                                </span>
                                <div class="d-flex align-items-center">
                                    <label for="completed_records_perpage" class="me-2 fw-bold">Per Page:</label>
                                    <select class="form-select w-auto" id="completed_records_perpage" 
                                            onchange="fetchLatestCompletedRecordsPagination()">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="border rounded p-3 bg-white" id="completed_orders_data"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<span id="information" class="d-none"></span>

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
