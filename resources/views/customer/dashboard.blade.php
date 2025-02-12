<html>

<head>
    <link href="{{ asset('assets/plugins/bootstrap.min.css') }}" rel="stylesheet">
    </link>
    <title></title>
    <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
<style>
    .increasedecrease:hover{
        color: #c2c2c2;
    }

</style>
</head>

<body>
    <input type="hidden" name="guestpc" id="guestpc" value="pc1">
    <div class="row px-4">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-size: xx-large;">
                <a class="navbar-brand" href="#" id="all" onclick="selectFoodCategory(this.id)">All</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        @foreach($data as $item)
                            @if(count($item->foods) > 0)
                                <a class="nav-item nav-link" style="border-right: 1px solid #475d88;"
                                    id="{{ $item->name }}" onclick="selectFoodCategory(this.id)"
                                    href="#">{{ $item->name }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-md-9">
            <div class="row" id="foodinfo">

                <!-- this is food information area -->
                @foreach($data as $item)
                    @if(count($item->foods) > 0)
                        @foreach($item->foods as $subitem)
                            <?php 
                                    $imgurl = $subitem->attachment[0]->name ?? 'image.png'; ?>
                            <div class="col-md-4 categorisedfood {{ $item->name }}">
                                <div class="card">
                                    <img style="height: 250px;" src="{{ asset($imgurl) }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $subitem->name }}</h5>
                                        <p class="card-text">@foreach($subitem->foodDetail as $subitemdetail)
                                            {{ $subitemdetail->name.' | ' }} @endforeach</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">Price : {{ $subitem->price }}</small> <button
                                            class="btn btn-sm btn-primary float-end"
                                            onclick="addFood({{ $subitem->id }})"> Add </button>
                                    </div>
                                </div>
                            </div>
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
