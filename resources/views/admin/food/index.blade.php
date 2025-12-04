
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

            <!-- Food Form Card -->
            <div class="card card-secondary shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">🍽 {{ $mainTitle }}</h3>
                </div>
                <div class="card-body">
                    
                    <!-- Add Form -->
                    <form method="POST" action="#" id="add_form">
                        @include('admin.food.partials.form')
                        <button class="btn btn-success" type="button" onclick="addRecord()">
                            <i class="fas fa-plus-circle"></i> {{ __('Add Record') }}
                        </button>
                    </form>

                    <!-- Update Form -->
                    <form method="POST" action="#" id="update_form" style="display:none">
                        @csrf
                        @method('PATCH')
                        @include('admin.food.partials.form')
                        <button class="btn btn-primary" type="button" id="update_record">
                            <i class="fas fa-save"></i> {{ __('Update Record') }}
                        </button>
                        <button class="btn btn-warning" type="button" id="cancel_update"
                                onclick="cancelUpdateForm('add_form', 'update_form')">
                            <i class="fas fa-times"></i> {{ __('Cancel') }}
                        </button>
                    </form>

                  <!-- Pagination Control -->
                    <div class="d-flex justify-content-between align-items-center mt-3 p-2 bg-light border rounded shadow-sm">
                        <div>
                            <span class="fw-bold text-secondary">
                                <i class="fas fa-database me-1"></i> Records per page:
                            </span>
                            <select class="form-select d-inline-block w-auto ms-2" id="records_perpage" onchange="fetchLatestRecordsPagination()">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                            </select>
                        </div>
                        <div>
                            <small class="text-muted">Showing latest records</small>
                        </div>
                    </div>

                    <!-- Records Table -->
                    <div class="row mt-4" id="records_table"></div>

                </div>
            </div>
        </div>
    </section>
</div>
  <!-- /.content-wrapper -->


  <!-- footer Section with js scripts -->
  @section('scriptjs')
  <script src="{{ asset('assets/dist/js/toastr.min.js') }}" type="text/javascript"></script>
      
    <script>

    var _GLOBAL_URL = "{{ asset('') }}";
    var _TOKEN = "{{ csrf_token() }}";

    function addRecord()
    {
    var action_completed = submitFormDynamically('add_form', 'admin/food', 'Successfully Inserted', 'Please Try Again', 'POST');
    if(action_completed == "success")
        {
        fetchLatestRecordsPagination();
        }
    }

    function editCurrentRecord(_record_id)
    {
        getFormRecordDynamically("update_form", 'admin/food', _record_id, "get", "update_record", "add_form", "update_form");
    }

    function updateRecord(_record_id)
    {
        var action_completed = submitFormDynamically('update_form', 'admin/food/'+_record_id, 'Successfully Updated', 'Please Try Again', 'POST');
        if(action_completed == "success")
        {
        cancelUpdateForm('add_form', 'update_form');
        fetchLatestRecordsPagination();
        }
    }

    function deleteCurrentRecord(_record_id)
    {
        var action_completed = submitFormDynamically('delete_form'+_record_id, 'admin/food/'+_record_id, 'Successfully Deleted', 'Please Try Again', 'POST');
        if(action_completed == "success")
        {
        // cancelUpdateForm('add_form', 'update_form');
        fetchLatestRecordsPagination();
        }
    }

    function fetchLatestRecordsPagination(_food_appendable = 'records_table', _page_number = 0, _appened = 0, _per_page = 10)
    {
    
        if(_per_page == 10)
        {
        _per_page = $('#records_perpage option:selected').val();
        }
        fetchRecordsDynamically(_food_appendable, 'admin/foodlistusingpagination', _per_page, _page_number, _appened);
    }

    $(document).ready(function(){
        fetchLatestRecordsPagination();
    });
    </script>

  @endsection

  @include('adminlayout.footer')
  <!-- footer Section with js scripts -->
  


