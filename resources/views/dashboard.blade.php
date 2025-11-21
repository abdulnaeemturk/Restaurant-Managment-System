
<!-- Header -->
@section('stylecss')
  
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

$colors[0] = 'info';
$colors[1] = 'success';
$colors[2] = 'warning';
$colors[3] = 'primary';

$status[0] = 'Pending';
$status[1] = 'Paid';
$status[2] = 'Kitchen';
$status[3] = 'Competed';

$icons[0]='ion-ios-list-outline';
$icons[1]='ion-android-cart';
$icons[2]='ion-android-archive';
$icons[3]='ion-android-open';


?>


{{-- Content Wrapper --}}
<div class="content-wrapper">
  {{-- Page Header --}}
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ $pageTitle ?? 'Dashboard' }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="#">{{ $mainTitle ?? 'Main Page' }}</a>
            </li>
            <li class="breadcrumb-item active">{{ $pageTitle ?? 'Dashboard' }}</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  {{-- Main Content --}}
  <section class="content">
    <div class="container-fluid">

      {{-- Stats Boxes --}}
      <div class="row">
        <div class="col-lg-6 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $totalorders ?? 0 }}</h3>
              <p>Total Orders</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-bag"></i>
            </div>
          </div>
        </div>

        @foreach($orders_info as $item)
          <div class="col-lg-6 col-6">
            <div class="small-box bg-{{ $colors[$item->status] ?? 'secondary' }}">
              <div class="inner">
                <h3>{{ $item->total }}</h3>
                <p>{{ $status[$item->status] ?? 'Unknown' }}</p>
              </div>
              <div class="icon">
                <i class="fas {{ $icons[$item->status] ?? 'fa-question-circle' }}"></i>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      {{-- User Access Table --}}
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="card-title">User Access</h3>
              <!-- <form class="card-tools" method="GET" action="">
                <div class="input-group input-group-sm" style="width: 200px;">
                  <input type="text" name="search" class="form-control" placeholder="Search...">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>-->
            </div>

            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>IP Address</th>
                    <th>Country</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Info</th>
                  </tr>
                </thead>
                <tbody>
                 
                    <tr>
                    <td>ID</td>
                    <td>IP Address</td>
                    <td>Country</td>
                    <td>Date</td>
                    <td>Status</td>
                    <td>Info</td>
                    </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>

{{-- Footer --}}
@section('scriptjs')
  {{-- Custom scripts if needed --}}
@endsection

  @include('adminlayout.footer')
  <!-- footer Section with js scripts -->
  


