
<!-- Header -->
@section('stylecss')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/css/toastr.min.css') }}">
<style> 
.product-image-thumb img {
  cursor: pointer;
  transition: transform 0.2s ease, border 0.2s ease;
}
.product-image-thumb img:hover {
  transform: scale(1.05);
  border: 2px solid #0d6efd;
}
.product-image-thumb.active img {
  border: 2px solid #0d6efd;
}
.product-image[src=""] {
    background-color: #f8f9fa;
    border: 1px dashed #ccc;
    width: 100%;
    height: 250px; /* fixed height */
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    font-style: italic;
}
</style>
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
  <div class="row">
    <!-- Food Detail Form -->
    <div class="col-md-6">
      <div class="card shadow-sm border-0 mb-4 h-100">
        <div class="card-header bg-light border-bottom">
          <h5 class="card-title mb-0 text-dark fw-semibold">
            <i class="fas fa-info-circle me-2 text-secondary"></i> Food Details
          </h5>
        </div>
        <div class="card-body">
          <form method="POST" id="add_form" class="mb-3">
            @include('admin.fooddetail.partials.form')
            <button class="btn btn-success w-100" type="button" onclick="addRecord()">
              <i class="fas fa-plus-circle me-1"></i> Add Record
            </button>
          </form>

          <form method="POST" id="update_form" style="display:none">
            @csrf
            @method('PATCH')
            @include('admin.fooddetail.partials.form')
            <div class="d-flex gap-2">
              <button class="btn btn-primary flex-fill" type="button" id="update_record">
                <i class="fas fa-save me-1"></i> Update
              </button>
              <button class="btn btn-warning flex-fill" type="button" id="cancel_update"
                      onclick="cancelUpdateForm('add_form','update_form')">
                <i class="fas fa-times me-1"></i> Cancel
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Image Gallery -->
    <div class="col-md-6">
      <div class="card shadow-sm border-0 mb-4 h-100">
        <div class="card-header bg-light border-bottom">
          <h5 class="card-title mb-0 text-dark fw-semibold">
            <i class="fas fa-image me-2 text-secondary"></i> Product Images
          </h5>
        </div>
        <div class="card-body">
          <div class="text-center mb-3">
            <img src="" class="img-fluid rounded border product-image" alt="Main Product Image">
          </div>
          <div class="d-flex flex-wrap gap-2 mb-3 product-image-thumbs">
            @foreach($food->attachment as $i => $foodimg)
              <div class="product-image-thumb {{ $i==0 ? 'active' : '' }}">
                <img src="{{ asset($foodimg->name) }}" class="img-thumbnail" alt="Thumbnail">
              </div>
            @endforeach
          </div>
          <form method="POST" id="product_image" class="border rounded p-3 bg-light">
            <img id="imagepreview" style="display:none" class="img-thumbnail mb-2" alt="Preview" />
            <input type="hidden" name="attachable_id" value="{{ $food->id }}" />
            <input type="file" name="image" id="image" class="form-control mb-2" accept="image/*"
                   onchange="showImage(this);" />
            <div class="d-flex gap-2">
              <button class="btn btn-primary btn-sm flex-fill" type="button"
                      onclick="addProductInformation('{{ $food->id }}','product_image','productimage')">
                <i class="fas fa-upload me-1"></i> Upload
              </button>
              <button class="btn btn-secondary btn-sm flex-fill" type="button"
                      onclick="hideElement('#product_image')">
                <i class="fas fa-check me-1"></i> Finish
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Records Section -->
  <div class="card shadow-sm border-0 mt-1">
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
    <div class="card-body">
      <div class="row" id="records_table"></div>
    </div>
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
  


