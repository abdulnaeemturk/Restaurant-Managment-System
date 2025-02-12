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
<?php  
$badge[0] = "primary";
$badge[1] = "secondary";
$badge[2] = "success";
$badge[3] = "danger";
$badge[4] = "warning";
$badge[5] = "info";


?>
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

            <!-- Starts order form Area -->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Order</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <form method="POST" action="#" id="add_form">
                                @include('admin.order.partials.form')
                                <button class="btn btn-primary" type="button" onclick="addRecord()">
                                    {{ __('Add Record') }}</button>
                            </form>

                            <form method="POST" action="#" id="update_form" style="display:none">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                @include('admin.order.partials.form')
                                <button class="btn btn-primary" id="update_record" id="update_record" type="button">
                                    {{ __('Update Record') }}</button>
                                <button class="btn btn-warning" onclick="cancelUpdateForm('add_form', 'update_form')"
                                    type="button" id="cancel_update"> {{ __('cancel') }}</button>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control float-end" name="records_perpage" id="records_perpage"
                                onchange="fetchLatestRecordsPagination()">
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
                    </div>

                </div>

                <div class="row">


                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-header">
                                  <div class="input-group mb-6">
                                    <input type="text" class="form-control" placeholder="Search Food">
                                    <div class="input-group-append">
                                      <span class="input-group-text">Food Name</span>
                                      <span class="input-group-text">Food Price</span>
                                      <span class="input-group-text">Search</span>
                                    </div>
                                  </div>
                                 
                            </div>

                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    @foreach($food as $item)
                                    <li class="item">
                                      <div class="product-img">
                                        <?php $imgurl = $item->attachment[0]->name ?? 'image.png'; ?>
                                        <img src="{{ asset(''.$imgurl)}}" alt="Product Image"
                                        class="img-size-50">
                                      </div>
                                      <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{ $item->name }}
                                          <span class="badge badge-warning float-right">{{ $item->price }}</span>
                                          <br>
                                          <span class="btn btn-xs btn-primary float-right" onclick="addfoodorder({{$item->id}}, 'order_detail')">Add +</span>
                                        </a>
                                        <span class="product-description">
                                        @foreach($item->foodDetail as $subitem)
                                        {{ $subitem->name }} |
                                        @endforeach
                                        </span>
                                      </div>
                                    </li>
                                    @endforeach



                                </ul>
                            </div>

                            <div class="card-footer text-center">
                                <a href="#" class="uppercase">View All Products</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6" id="order_detail">

                  
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<span id="result_set" style="display:none"></span>

<!-- footer Section with js scripts -->
@section('scriptjs')
<script src="{{ asset('assets/dist/js/toastr.min.js') }}" type="text/javascript"></script>

<script>
    var _GLOBAL_URL = "{{ asset('') }}";
    var _TOKEN = "{{ csrf_token() }}";
    _link_to_url = '';

    function paid(_record_id)
    {
        var action_completed =  fetchViewDynamically('admin/updatefoodstatus/'+_record_id, 'information');
        if (action_completed == "success") {
           fetchLatestRecordsPagination();
           $('#order_detail').html('');
        }
    }

    function detailOrder(order_id, _url, _field_id)
    {
      _link_to_url = _url+order_id;
      fetchViewDynamically(_link_to_url, _field_id, 'Successfull');
    }
    function addfoodorder(_food_id, _field_id)
    {
        
        if($('#order_id_for_new_food').val())
        
        {
            _order_id = $('#order_id_for_new_food').val();
            fetchViewDynamically('admin/addfoodtoorder/'+_food_id+'/'+_order_id, 'result_set', 'Successfull');
            fetchViewDynamically(_link_to_url, _field_id, 'Successfull');
            // alert('Order ID is : '+ _order_id + ' AND Food ID is : '+_food_id)
            
        }else{
            alert("Please Select or create order to add food");
        }
        
        
        }

    function increaseOrDecreseQuantity(_order_detail_id, increaseordecrease, _field_id)
    {
        _order_detail_piece =  $('#order_detail_row'+_order_detail_id+' #'+_order_detail_id).text();
        fetchViewDynamically('admin/increaseOrDecreseQuantity/'+_order_detail_id+'/'+_order_detail_piece+'/'+increaseordecrease, 'result_set', 'Successfull');
        fetchViewDynamically(_link_to_url, _field_id, 'Successfull');
    }


    function addRecord() {
        var action_completed = submitFormDynamically('add_form', 'admin/order', 'Successfully Inserted',
            'Please Try Again', 'POST');
        if (action_completed == "success") {
            fetchLatestRecordsPagination();
            $('#add_form #food_id').val(global_food_id);
        }
    }

    function editCurrentRecord(_record_id) {
        getFormRecordDynamically("update_form", 'admin/order', _record_id, "get", "update_record", "add_form",
            "update_form");
    }

    function updateRecord(_record_id) {
        var action_completed = submitFormDynamically('update_form', 'admin/order/' + _record_id, 'Successfully Updated',
            'Please Try Again', 'POST');
        if (action_completed == "success") {
            cancelUpdateForm('add_form', 'update_form');
            fetchLatestRecordsPagination();
        }
    }

    function deleteCurrentRecord(_record_id) {
        var action_completed = submitFormDynamically('delete_form' + _record_id, 'admin/order/' + _record_id,
            'Successfully Deleted', 'Please Try Again', 'POST');
        if (action_completed == "success") {
            // cancelUpdateForm('add_form', 'update_form');
            fetchLatestRecordsPagination();
        }
    }

    function fetchLatestRecordsPagination(_order_appendable = 'records_table', _page_number = 0, _appened = 0,
        _per_page = 10) {

        if (_per_page == 10) {
            _per_page = $('#records_perpage option:selected').val();
        }
        fetchRecordsDynamically(_order_appendable, 'admin/orderlistusingpagination', _per_page, _page_number, _appened);
    }


    $(document).ready(function () {

        fetchLatestRecordsPagination();
    });

</script>

@endsection

@include('adminlayout.footer')
<!-- footer Section with js scripts -->
