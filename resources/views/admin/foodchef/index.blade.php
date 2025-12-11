<!-- Header -->
@section('stylecss')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/css/toastr.min.css') }}">

<style>
    /* Modern kitchen board layout */
    .kitchen-board { margin-top: 20px; }

    .status-title {
        padding: 12px;
        border-radius: 6px;
        text-align: center;
        font-weight: bold;
        margin-bottom: 15px;
        font-size: 18px;
    }

    .order-card {
        background: #ffffff;
        border-left-width: 6px !important;
        border-radius: 6px;
        padding: 14px;
        margin-bottom: 18px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: 0.2s ease;
    }

    .order-card:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 14px rgba(0,0,0,0.12);
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
    }

    .order-id { 
        font-size: 17px;
        padding-right: 3px;
        padding-left: 3px;
        border-radius: 6px;
     }
    .order-time { font-size: 13px; opacity: 0.7; }

    .order-items {
        margin: 12px 0;
        padding-left: 20px;
    }

    .order-note {
        background: #f8f9fa;
        border-left: 3px solid #ccc;
        padding: 6px 10px;
        border-radius: 4px;
        font-size: 13px;
        margin-bottom: 12px;
    }

    .order-card .btn {
        font-size: 14px;
        font-weight: bold;
    }

</style>

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

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Modern Kitchen Layout -->
            <div class="row kitchen-board">

                <!-- Column 1: Active Orders -->
                <div class="col-md-4">
                    <h4 class="status-title bg-secondary text-dark">🟡 Active Orders</h4>

                    <!-- AJAX container -->
                    <div id="records_table"></div>
                </div>

                <!-- Column 2: Pending Orders -->
                <div class="col-md-4">
                    <h4 class="status-title bg-info text-white">🔵 Pending Orders</h4>

                    <!-- AJAX container -->
                    <div id="records_table1"></div>
                </div>

                <!-- Column 3: Completed Orders -->
                <div class="col-md-4">
                    <h4 class="status-title bg-success text-white">🟢 Completed Today</h4>

                  <!-- AJAX container -->
                     <div  id="completed_orders_data"></div>


            </div>

        </div>
    </section>
</div>

<span id="information" class="d-none"></span>

<!-- JS Section -->
@section('scriptjs')
<script src="{{ asset('assets/dist/js/toastr.min.js') }}" type="text/javascript"></script>

<script>
    var _GLOBAL_URL = "{{ asset('') }}";
    var _TOKEN = "{{ csrf_token() }}";

    function updateCurrentOrderStatus(_record_id, _status = 1) {
        var action_completed = fetchViewDynamically('admin/updatefoodstatus/' + _record_id, 'information');
        
        if (action_completed == "success") {
            fetchLatestRecordsPagination();
            fetchLatestRecordsPagination('records_table1', 2);
           fetchLatestRecordsPagination('completed_orders_data', 3);

            if (_status == 1) {
                window.open(_GLOBAL_URL + 'admin/printkitchenorder/' + _record_id, '_blank');
            }

        }
    }

    function fetchLatestRecordsPagination(_append_to = 'records_table', _status = 1) {
        // Loads Active + Pending using your existing templates
        fetchViewDynamically('admin/getkitchenbysatus/' + _status, _append_to);
    }



    $(document).ready(function () {
        fetchLatestRecordsPagination();           // Active
        fetchLatestRecordsPagination('records_table1', 2);  // Pending
        fetchLatestRecordsPagination('completed_orders_data', 3);  // Completed
    });
</script>
@endsection

@include('adminlayout.footer')
