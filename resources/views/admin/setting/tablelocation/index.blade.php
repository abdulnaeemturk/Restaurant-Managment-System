
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
            <h1 class="m-0">{{ $pageTitle}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ $mainTitle }}</a></li>
              <li class="breadcrumb-item active">{{ $pageTitle}}</li>
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

         <!-- Starts tablelocation form Area -->
         <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Table Location</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="POST" action="#" id="add_form">
                  @include('admin.setting.tablelocation.partials.form')
                  <button class="btn btn-primary" type="button" onclick="addRecord()">  {{ __('Add Record') }}</button>
              </form>

              <form method="POST" action="#" id="update_form" style="display:none">
                  {{ csrf_field() }}
                  {{ method_field('PATCH') }}
                  @include('admin.setting.tablelocation.partials.form')
                  <button class="btn btn-primary"id="update_record" id="update_record" type="button" >  {{ __('Update Record') }}</button>
                  <button class="btn btn-warning" onclick="cancelUpdateForm('add_form', 'update_form')"  type="button" id="cancel_update"> {{ __('cancel') }}</button>
              </form>
              <br/>
            <select class="form-control float-end" name="records_perpage" id="records_perpage" onchange="fetchLatestRecordsPagination()">
                <option value="10"> 10 </option>
                <option value="20"> 20 </option>
                <option value="50"> 50 </option>
                <option value="100"> 100 </option>
                <option value="200"> 200 </option>
                <option value="500"> 500 </option>
                <option value="1000"> 1000 </option>
            </select>
        <div class="row" id="records_table">
        </div>


      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
    var action_completed = submitFormDynamically('add_form', 'admin/setting/tablelocation', 'Successfully Inserted', 'Please Try Again', 'POST');
    if(action_completed == "success")
        {
        fetchLatestRecordsPagination();
        }
    }

    function editCurrentRecord(_record_id)
    {
        getFormRecordDynamically("update_form", 'admin/setting/tablelocation', _record_id, "get", "update_record", "add_form", "update_form");
    }

    function updateRecord(_record_id)
    {
        var action_completed = submitFormDynamically('update_form', 'admin/setting/tablelocation/'+_record_id, 'Successfully Updated', 'Please Try Again', 'POST');
        if(action_completed == "success")
        {
        cancelUpdateForm('add_form', 'update_form');
        fetchLatestRecordsPagination();
        }
    }

    function deleteCurrentRecord(_record_id)
    {
        var action_completed = submitFormDynamically('delete_form'+_record_id, 'admin/setting/tablelocation/'+_record_id, 'Successfully Deleted', 'Please Try Again', 'POST');
        if(action_completed == "success")
        {
        // cancelUpdateForm('add_form', 'update_form');
        fetchLatestRecordsPagination();
        }
    }

    function fetchLatestRecordsPagination(_tablelocation_appendable = 'records_table', _page_number = 0, _appened = 0, _per_page = 10)
    {
    
        if(_per_page == 10)
        {
        _per_page = $('#records_perpage option:selected').val();
        }
        fetchRecordsDynamically(_tablelocation_appendable, 'admin/setting/tablelocationlistusingpagination', _per_page, _page_number, _appened);
    }

    $(document).ready(function(){
        fetchLatestRecordsPagination();
    });
    </script>

  @endsection

  @include('adminlayout.footer')
  <!-- footer Section with js scripts -->
  


