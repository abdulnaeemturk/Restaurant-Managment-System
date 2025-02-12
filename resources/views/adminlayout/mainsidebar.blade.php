
<?php 
  if(!isset($pageTitle))
  {
    $pageTitle = '';
  }
  if(!isset($mainTitle))
  {
    $mainTitle = '';
  }
  ?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('dashboard') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name'); }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ asset('dashboard') }}" class="d-block">@if(Auth::user()) {{ Auth::user()->name }}@else Guest @endif</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ asset('dashboard') }}" class="nav-link @if($mainTitle == 'Dashboard' && $pageTitle == 'Dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{asset('admin/food')}}" class="nav-link @if($mainTitle == 'Food' || $mainTitle == 'Food Detail') active @endif">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Foods
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{asset('admin/order')}}" class="nav-link @if($mainTitle == 'Order' || $mainTitle == 'Order Detail') active @endif">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Order
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{asset('admin/table')}}" class="nav-link @if($mainTitle == 'Table') active @endif">
              <i class="nav-icon fas fa-shipping-fast"></i>
              <p>
                Table
              </p>
            </a>
          </li>
 
          <li class="nav-item @if($mainTitle == 'Setting') menu-open @endif">
            <a href="#" class="nav-link @if($mainTitle == 'Setting') active @endif">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('admin/setting/foodcategory') }}" class="nav-link @if($pageTitle == 'Food Category') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/setting/tablelocation')}}" class="nav-link @if($pageTitle == 'Location') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/setting/linktableuser')}}" class="nav-link @if($pageTitle == 'Link') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Link</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item @if($mainTitle == 'Reports') menu-open @endif">
            <a href="#" class="nav-link @if($mainTitle == 'Reports') active @endif">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('admin/reports/dashboard') }}" class="nav-link @if($pageTitle == 'Dashboard') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dasboard</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{asset('admin/foodchef')}}" class="nav-link @if($mainTitle == 'FoodChef') active @endif">
              <i class="nav-icon fas fa-recycle"></i>
              <p>
                FoodChef
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
