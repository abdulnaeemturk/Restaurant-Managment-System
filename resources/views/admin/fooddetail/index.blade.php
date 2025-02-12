
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

         <!-- Starts fooddetail form Area -->
         <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Food Detail And Image</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6"> 
                  <form method="POST" action="#" id="add_form">
                    @include('admin.fooddetail.partials.form')
                    <button class="btn btn-primary" type="button" onclick="addRecord()">  {{ __('Add Record') }}</button>
                  </form>
                  
                  <form method="POST" action="#" id="update_form" style="display:none">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    @include('admin.fooddetail.partials.form')
                    <button class="btn btn-primary"id="update_record" id="update_record" type="button" >  {{ __('Update Record') }}</button>
                    <button class="btn btn-warning" onclick="cancelUpdateForm('add_form', 'update_form')"  type="button" id="cancel_update"> {{ __('cancel') }}</button>
                  </form>
                </div>
                <div class="col-md-6"> 
                  <div class="row"> 
                        <div class="col-md-6">
                            <img src="" class="product-image" alt="Product Image">
                        </div>
                        <div class="col-md-6">
                          <div class="col-md-12 product-image-thumbs">

                              <?php $imagecount=0; $active = ' firstimg active' ?>
                              @foreach($food->attachment as $foodimg)
                                  <div
                                      class="product-image-thumb  @if($imagecount == 0) {{ $active }} <?php $imagecount++;  ?>  @endif">
                                      <img src="{{ asset(''.$foodimg->name) }}"
                                          alt="Product Image"></div>
                              @endforeach
                          </div>
                          <div class="col-md-6">
                            <br>
                              <form method="POST" action="#" id="product_image">
                                  <img id="imagepreview" style="display:none" src="" height="64px" width="64px"
                                      alt="your image" />
                                  <input type="text" hidden="hidden" id="attachable_id" name="attachable_id"
                                      value="{{ $food->id }}" />
                                  <input type="file" name="image" id="image" accept="image/*"
                                      onchange="showImage(this);" />
                                    <br>
                                    <br>
                                  <button class="w-20 btn btn-primary btn-sm" id="add_record" id="add_record"
                                      type="button"
                                      onclick="addProductInformation('{{ $food->id }}', 'product_image', 'productimage')">
                                      {{ __('Upload Image') }}</button>
                                  <button class="w-20 btn btn-warning btn-sm" onclick="hideElement('#product_image')"
                                      type="button" id="finishform"> {{ __('Finish') }}</button>
                              </form>
                          </div>
                      </div>
                    </div>
            </div>
                </div>
              </div>
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
      var _global_food_id = {{$food_id}};
      // start image related functions and variables

      $(document).ready(function () {
        
        fetchLatestRecordsPagination();
        $('.product-image-thumb').on('click', function () {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        });
        showFirstImg();

    });


      var global_food_id = {{ $food->id }};
      function showFirstImg() {
        var $image_element = $('.firstimg').find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active');
      }

      
    function showImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                showElement('#imagepreview');
                $('#imagepreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
      
      // functionality to add the product information detail and its color
      function addProductInformation(_product_id, _form_id, _url) {
        var action_completed = submitFormDynamically(_form_id, _url, 'Successfully Inserted', 'Please Try Again',
        'POST');
        if (action_completed == "success") {
          $('#add_form #food_id').val(global_food_id);
        }
      }
      // end image related functions and variables

    function addRecord()
    {
    var action_completed = submitFormDynamically('add_form', 'admin/fooddetails', 'Successfully Inserted', 'Please Try Again', 'POST');
    if(action_completed == "success")
        {
        fetchLatestRecordsPagination();
        $('#add_form #food_id').val(global_food_id);
        }
    }

    function editCurrentRecord(_record_id)
    {
        getFormRecordDynamically("update_form", 'admin/fooddetails', _record_id, "get", "update_record", "add_form", "update_form");
    }

    function updateRecord(_record_id)
    {
        var action_completed = submitFormDynamically('update_form', 'admin/fooddetails/'+_record_id, 'Successfully Updated', 'Please Try Again', 'POST');
        if(action_completed == "success")
        {
        cancelUpdateForm('add_form', 'update_form');
        fetchLatestRecordsPagination();
        }
    }

    function deleteCurrentRecord(_record_id)
    {
        var action_completed = submitFormDynamically('delete_form'+_record_id, 'admin/fooddetails/'+_record_id, 'Successfully Deleted', 'Please Try Again', 'POST');
        if(action_completed == "success")
        {
        // cancelUpdateForm('add_form', 'update_form');
        fetchLatestRecordsPagination();
        }
    }

    function fetchLatestRecordsPagination(_fooddetail_appendable = 'records_table', _page_number = 0, _appened = 0, _per_page = 10)
    {
    
        if(_per_page == 10)
        {
        _per_page = $('#records_perpage option:selected').val();
        }
        fetchRecordsDynamically(_fooddetail_appendable, 'admin/fooddetailslistusingpagination/'+_global_food_id, _per_page, _page_number, _appened);
    }


    </script>

  @endsection

  @include('adminlayout.footer')
  <!-- footer Section with js scripts -->
  


