<!-- Header -->
@section('stylecss')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/css/toastr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/custom/adminorder.css') }}">
     <style>

.add-btn-with-qty {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
}

.qty-inline {
    width: 42px;
    height: 24px;
    text-align: center;
    font-size: 0.75rem;
    border: none;
    border-radius: 6px;
    background: rgba(255,255,255,0.25);
    color: #fff;
}

.qty-inline:focus {
    outline: none;
    background: rgba(255,255,255,0.35);
}

.qty-inline::-webkit-inner-spin-button,
.qty-inline::-webkit-outer-spin-button {
    -webkit-appearance: none;
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
                <!-- ===== Modern Order UI ===== -->
                <!-- ============================= -->
                <!--   BEGIN PROFESSIONAL POS UI   -->
                <!-- ============================= -->
                <div class="pos-wrapper mt-4">

                    <!-- LEFT COLUMN -->
                    <div class="pos-left">

                        <form method="POST" action="#" id="add_form">
                            @include('admin.order.partials.form')
                            <button class="btn btn-primary" type="button" onclick="addRecord()">
                                {{ __('Create Order') }}</button>
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
                        <hr class="custom-hr">
                        <div class="" id="records_table">
                        </div>
                    </div>

                    <!-- CENTER COLUMN (CATALOG) -->
                    <div class="pos-center">

                        <h3>Food Catalog</h3>

                        <!-- Category Row -->
                        <ul class="category-row">
                            <li id="all" onclick="selectFoodCategory(this.id)" class="categorylist active">All</li>
                                @foreach($category as $item)
                                    @if(count($item->foods) > 0)
                                        <li id="food{{ $item->id }}" class="categorylist" onclick="selectFoodCategory(this.id)">{{ $item->name }}</li>
                                    @endif
                                @endforeach
                        </ul>

                        <div class="catalog-grid">
                            @foreach($food as $item)
                                <div class="product-card categorisedfood food{{ $item->category_id }}">
                                    <img
                                        src="{{ asset($item->attachment[0]->name ?? 'image.png') }}">

                                    <div class="product-info-area">
                                        <div class="product-name">{{ $item->name }}</div>
                                        <div class="product-price">Price : {{ $item->price }}</div>
                                    </div>


                                    <button type="button" class="add-btn add-btn-with-qty">


                                        <input type="number" class="qty-inline"
                                            value="1" min="1"
                                            onclick="event.stopPropagation()">

                                        <span class="add-text"
                                            onclick="addfoodorder({{ $item->id }}, 'order_detail')">Add</span>
                                    </button>

                                </div>
                            @endforeach
                        </div>

                    </div>

                    <!-- RIGHT COLUMN (ORDER DETAILS) -->
                    <div class="pos-right" id="order_detail">
                    </div>

                </div>
                
                <!-- ===== End Modern Order UI ===== -->
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

    function paid(_record_id) {
        var action_completed = fetchViewDynamically('admin/updatefoodstatus/' + _record_id, 'information');
        if (action_completed == "success") {
            fetchLatestRecordsPagination();
            $('#order_detail').html('');
        }
    }

    function detailOrder(order_id, _url, _field_id) {
        _link_to_url = _url + order_id;
        fetchViewDynamically(_link_to_url, _field_id, 'Successfull');
    }

    function addfoodorder(_food_id, _field_id) {

        if ($('#order_id_for_new_food').val())

        {
            _order_id = $('#order_id_for_new_food').val();
            fetchViewDynamically('admin/addfoodtoorder/' + _food_id + '/' + _order_id, 'result_set', 'Successfull');
            fetchViewDynamically(_link_to_url, _field_id, 'Successfull');
            // alert('Order ID is : '+ _order_id + ' AND Food ID is : '+_food_id)

        } else {
            alert("Please Select or create order to add food");
        }


    }

    function increaseOrDecreseQuantity(_order_detail_id, increaseordecrease, _field_id) {
        _order_detail_piece = $('#order_detail_row' + _order_detail_id + ' #' + _order_detail_id).text();
        fetchViewDynamically('admin/increaseOrDecreseQuantity/' + _order_detail_id + '/' + _order_detail_piece + '/' +
            increaseordecrease, 'result_set', 'Successfull');
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
            detailOrder(_record_id, 'admin/orderdetail/', 'order_detail')
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


    function orderAction(order)
    {
        order_action = $('#order_action').val();
        
        $('#order_id').html($(order).attr("order_id"));
        $('#order_customername').html($(order).attr("order_customername"));
        $('#order_table_number').html($(order).attr("order_table_number"));
        $('#order_status').html($(order).attr("order_status"));

        if(order_action == "detail")
        {
            detailOrder($(order).attr("order_id"), 'admin/orderdetail/', 'order_detail')
        }else if(order_action == "edit")
        {
            editCurrentRecord($(order).attr("order_id"))
        }else if(order_action == "delete")
        {
             deleteCurrentRecord($(order).attr("order_id"));
        }


        //alert("action is : "+ order_action+ " on Record id : "+$(order).attr("order_id"));

    }

    function selectFoodCategory(_category) {
            $('.categorylist').removeClass('active');
            if (_category == 'all') {
                showElement('.categorisedfood');
            } else {
                hideElement('.categorisedfood');
                showElement('.' + _category);
            }
            $('#'+_category).addClass('active');
    }

    $(document).ready(function () {

        fetchLatestRecordsPagination();
    });
</script>

@endsection

@include('adminlayout.footer')
<!-- footer Section with js scripts -->
