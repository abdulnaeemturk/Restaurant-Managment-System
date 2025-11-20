<html>

<head>
    <link href="{{ asset('assets/plugins/bootstrap.min.css') }}" rel="stylesheet">
    </link>
    <title></title>
    <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
<style>
body {
    background: #f5f6fa;
    font-family: "Segoe UI", sans-serif;
}
.navbar {
    background: white !important;
    border-bottom: 1px solid #e5e5e5;
    font-size: 1.3rem;
}
.nav-link, .navbar-brand { font-weight: 600; padding: 10px 18px !important; }
.nav-link:hover { color: #0d6efd !important; }

.card { border-radius: 10px; overflow: hidden; transition: 0.2s; }
.card:hover { transform: translateY(-5px); box-shadow: 0px 8px 18px rgba(0,0,0,0.1); }
.card img { height: 220px; object-fit: cover; }

#foodinfo .col-md-4 { padding: 10px; }

#result_set {
    background: #ffffff; height: 100vh; overflow-y: auto;
    border-left: 1px solid #e3e3e3; padding: 15px; position: sticky; top: 0;
}

#mobileOrderBtn {
    display: none; position: fixed; bottom: 20px; right: 20px;
    background: #0d6efd; color: white; padding: 16px 25px; border-radius: 40px;
    box-shadow: 0px 4px 12px rgba(0,0,0,0.35); font-weight: bold; z-index: 9999;
}

@media(max-width: 992px) {
    #result_set { display: none; }
    #mobileOrderBtn { display: block; }
}

.increasedecrease:hover { color: #0d6efd; cursor: pointer; }
</style>
</head>

<body>
    <input type="hidden" name="guestpc" id="guestpc" value="pc1">
<div class="row px-4">
    <div class="col-md-12 mb-3">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#" id="all" onclick="selectFoodCategory(this.id)">All</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                        @foreach($data as $item)
                            @if(count($item->foods) > 0)
                                <a class="nav-item nav-link" style="border-right: 1px solid #475d88;"
                                    id="food{{ $item->id }}" onclick="selectFoodCategory(this.id)"
                                    href="#">{{ $item->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </nav>
        </div>

    <!-- FOOD GRID -->
    <div class="col-md-9">
        <div class="row" id="foodinfo">

                <!-- this is food information area -->
                @foreach($data as $item)
                    @if(count($item->foods) > 0)
                        @foreach($item->foods as $subitem)
                            <?php 
                                    $imgurl = $subitem->attachment[0]->name ?? 'image.png'; ?>

                            <div class="col-md-4 categorisedfood food{{ $item->id }}">
                            <div class="card">
                            <img src="{{ asset($imgurl) }}" class="card-img-top">
                            <div class="card-body">
                            <h5 class="card-title">{{ $subitem->name }}</h5>
                            <p class="card-text">@foreach($subitem->foodDetail as $subitemdetail)
                                            {{ $subitemdetail->name.' | ' }} @endforeach</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                            <small>Price : {{ $subitem->price }}</small>
                            <button class="btn btn-sm btn-primary" onclick="addFood({{ $subitem->id }})">Add</button>
                            </div>
                            </div>
                            </div>

                            <!-- Repeat for other food cards with online images -->
                        @endforeach
                    @endif
                @endforeach
                <!-- this is food information area -->



            </div>
        </div>
        <!-- order list area -->
        <div class="col-md-3" id="result_set">

            @include('customer.partials.myorderdetail')

        </div>
    </div>

    <!-- payment model -->

    <!-- Full screen modal -->
    <div class="modal fade" id="exampleModalFullscreenSm" tabindex="-1" aria-labelledby="exampleModalFullscreenSmLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4" id="exampleModalFullscreenSmLabel">Full screen below sm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Payment Amount <span id="Paymentamount"></span>
       <a href="{{asset('completetheorderpayment')}}"> Completed</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!-- payment model -->



    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <script src="{{ asset('assets/plugins/popper.min.js') }} "></script>
    <script src="{{ asset('assets/plugins/bootstrap.bundle.min.js') }} "></script>
    <!-- the main javascript file for Db Actions -->
    <script src="{{ asset('assets/dist/js/main.js') }}"></script>

    <script>
        var _GLOBAL_URL = "{{ asset('') }}";


        function increaseOrDecreseQuantity(_temporaryorderid, increaseordecrease, _field_id)
        {
            _order_detail_piece =  $('#temporary_order_row'+_temporaryorderid+' #'+_temporaryorderid).text();
            fetchViewDynamically('increaseOrDecreseQuantity/'+_temporaryorderid+'/'+_order_detail_piece+'/'+increaseordecrease, _field_id, 'Successfull');
            fetchViewDynamically('getfoodorderdetail', _field_id, 'Successfull');
        }

        function addFood(_food_id) {
            fetchViewDynamically('addfoodtoorder/' + _food_id, 'result_set', 'Successfull');
            fetchViewDynamically('getfoodorderdetail', 'result_set', 'Successfull');
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
            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });

    </script>

</body>

</html>
