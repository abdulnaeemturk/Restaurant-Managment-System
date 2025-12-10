<!-- Header -->
@section('stylecss')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/dist/css/toastr.min.css') }}">

<style>
    /* ===========================
   FULL 3-COLUMN POS LAYOUT
   =========================== */

    .pos-wrapper {
        display: grid;
        grid-template-columns: 280px 1fr 380px;
        gap: 18px;
        padding: 15px;
    }

    /* -----------------------------
   LEFT COLUMN (Order Info + List)
   ----------------------------- */

    .pos-left {
        background: #fff;
        border-radius: 12px;
        padding: 18px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
    }

    .pos-left h3 {
        font-size: 1.2rem;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .order-box {
        background: #f8f8f8;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 12px;
    }

    .order-box p {
        margin: 4px 0;
        font-size: 0.9rem;
        color: #444;
    }

    .order-list {
        max-height: 400px;
        overflow-y: auto;
        margin-top: 10px;
    }

    .order-item-small {
        padding: 8px 10px;
        border-radius: 8px;
        margin-bottom: 6px;
        border: 1px solid #e6e6e6;
        transition: 0.2s;
    }

    .order-item-small:hover {
        background: #eef4ff;
        border-color: #bcd4ff;
    }

        /* Status specific */
    .status-Pending { background: #57b5ebff; color: #ffffffff; }
    .status-Paid { background: #868686ff; color: #ee1919ff; }
    .status-Kitchen { background: #fc0800ff; color: #bdbdbdff; }
    .status-Competed { background: #f9fafcff; color: #000102ff; }

    /* -----------------------------
   CENTER COLUMN (Product Catalog)
   ----------------------------- */

    .pos-center {
        background: #fff;
        border-radius: 12px;
        padding: 18px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
    }

    .catalog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 16px;
    }

    .product-card {
        background: #fff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.10);
        transition: 0.25s ease;
        border: 1px solid #f1f1f1;
    }

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .product-card img {
        height: 120px;
        width: 100%;
        object-fit: cover;
    }

    .product-info-area {
        padding: 10px;
        text-align: center;
    }

    .product-name {
        font-size: 0.95rem;
        font-weight: 600;
        margin-bottom: 4px;
        color: #333;
    }

    .product-price {
        color: #0078d4;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .add-btn {
        width: 100%;
        padding: 7px;
        border: none;
        font-size: 0.85rem;
        background: #0078d4;
        color: #fff;
        border-radius: 0 0 14px 14px;
        cursor: pointer;
        transition: 0.2s;
    }

    .add-btn:hover {
        background: #005fa3;
    }

    /* -----------------------------
   RIGHT COLUMN (Order Details)
   ----------------------------- */

    .pos-right {
        background: #fff;
        border-radius: 12px;
        padding: 18px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
    }

    .pos-right h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .right-items {
        max-height: 430px;
        overflow-y: auto;
    }

    .right-item {
        display: flex;
        background: #fafafa;
        border-radius: 12px;
        padding: 10px;
        margin-bottom: 12px;
        border: 1px solid #eee;
        gap: 10px;
        transition: 0.3s;
    }

    .right-item:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .right-item img {
        width: 70px;
        height: 70px;
        border-radius: 8px;
        object-fit: cover;
    }

    .item-details  {
        width: 100%;
    }
    .item-details h4 {
        margin: 0;
        font-size: 1rem;
    }

    .qty-box {
        width: 60px;
    }

    .summary-box {
        background: #f2f5fc;
        padding: 12px;
        border-radius: 12px;
        margin-top: 15px;
    }

    .summary-box p {
        margin: 4px 0;
        font-size: 1rem;
    }

    .submit-btn {
        width: 100%;
        margin-top: 8px;
        padding: 10px;
        background: #0078d4;
        color: #fff;
        font-size: 1rem;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }

    .category-row {
        display: flex;
        gap: 0.5rem;
        /* tighter spacing between categories */
        list-style: none;
        padding: 0;
        margin: 0 0 0.8rem;
        border-bottom: 1px solid #eee;
        overflow-x: auto;
        /* allows horizontal scroll if too many categories */
    }

    .category-row li {
        font-size: 0.85rem;
        /* smaller text */
        padding: 0.4rem 0.8rem;
        /* reduced padding */
        cursor: pointer;
        border-radius: 4px 4px 0 0;
        background: #f9f9f9;
        white-space: nowrap;
        /* keeps each category in one line */
        transition: background 0.3s ease;
    }

    .category-row li:hover {
        background: #eaeaea;
    }

    .category-row li.active {
        background: #0078d4;
        color: #fff;
        font-weight: 600;
    }
    .quantitycontrolbadge:hover{
        color: #c2c2c2;
    }
    .custom-hr {
    border: 0;
    height: 2px;
    background: #dcdcdc;
    margin: 15px 0;
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
                            <li id="all" onclick="selectFoodCategory(this.id)" class="active">All</li>
                                @foreach($category as $item)
                                    @if(count($item->foods) > 0)
                                        <li id="food{{ $item->id }}" onclick="selectFoodCategory(this.id)">{{ $item->name }}</li>
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

                                    <button class="add-btn" onclick="addfoodorder({{ $item->id }}, 'order_detail')">
                                        Add +
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
            if (_category == 'all') {
                showElement('.categorisedfood');
            } else {
                hideElement('.categorisedfood');
                showElement('.' + _category);
            }
    }

    $(document).ready(function () {

        fetchLatestRecordsPagination();
    });
</script>

@endsection

@include('adminlayout.footer')
<!-- footer Section with js scripts -->
