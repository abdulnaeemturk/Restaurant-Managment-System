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
                    <h3 class="card-title">Today</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-4">
                                <small>start Year</small>
                                <select class="form-control float-end" name="start_year" id="start_year">
                                </select>
                                </div>
                                <div class="col-md-4">
                                <small>start Month</small>
                                <select class="form-control float-end" name="start_month" id="start_month">
                                </select>
                                </div>
                                <div class="col-md-4">
                                <small>start Day</small>
                                <select class="form-control float-end" name="start_day" id="start_day">
                                </select>
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-md-5">
                        <div class="row">
                                <div class="col-md-4">
                                <small>end Year</small>
                                <select class="form-control float-end" name="end_year" id="end_year">
                                </select>
                                </div>
                                <div class="col-md-4">
                                <small>end Month</small>
                                <select class="form-control float-end" name="end_month" id="end_month">
                                </select>
                                </div>
                                <div class="col-md-4">
                                    <small>end Day</small>
                                    <div class="input-group">
                                        <select class="form-control float-end" name="end_day" id="end_day">
                                        </select>
                                        <div class="input-group-append">
                                        <button type="button" onclick="fetchLatestCompletedRecordsPagination()"  class="btn btn-block btn-outline-primary btn-sm">Seach</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-2">
                            <small>Total Number of Records</small>
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

                        <div class="col-md-12" >
                            <br>
                            <div class="row" id="completed_orders_data">

                            </div>
                        </div>

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

    function fetchLatestCompletedRecordsPagination(_order_appendable = 'completed_orders_data', _page_number = 0, _appened = 0,
        _per_page = 10) {

        _start_date =  $('#start_year').val().toString()+"-"+$('#start_month').val().toString()+"-"+$('#start_day').val().toString();
        _end_date =  $('#end_year').val().toString()+"-"+$('#end_month').val().toString()+"-"+$('#end_day').val().toString();
        if (_per_page == 10) {
            _per_page = $('#completed_records_perpage option:selected').val();
        }
        fetchRecordsDynamically(_order_appendable, 'shared/reports/completedorder/'+_start_date+'/'+_end_date, _per_page, _page_number, _appened);
    }


    function createStartAndEndDates()
    {
        _current_year = new Date().getFullYear();
        _year_options ='';
        _month_options ='';
        _days_options ='';


        for(i = _current_year; i >= 2020; i--) { 
            _year_options += createOptions(i, i);
        }
        for(i = 1; i <= 12; i++) { 
            _month_options += createOptions(i, i);
        }

        for(i = 1; i <= 31; i++) { 
            _days_options += createOptions(i, i);
        }
        console.log("comming");
        $('#start_year').html(_year_options);
        $('#start_month').html(_month_options);
        $('#start_day').html(_days_options);
        $('#end_year').html(_year_options);
        $('#end_month').html(_month_options);
        $('#end_day').html(_days_options);


    }


    function createOptions(_value, _option_title)
    {
        return  '<option value="'+_value+'">'+_option_title+'</option>';
    }


    $(document).ready(function () {
        createStartAndEndDates();
        fetchLatestCompletedRecordsPagination();
    });



     

</script>

@endsection

@include('adminlayout.footer')
<!-- footer Section with js scripts -->
