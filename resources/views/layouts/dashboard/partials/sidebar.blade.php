<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>{{ auth()->user()->user_type }} Dashboard</h3>
      <ul class="nav side-menu">

        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>

        <li>
            <a href="javascript:void(0)">
                <i class="fa fa-users"></i>Users <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu">
                <li><a href="{{ route('users.index') }}">All Users</a></li>
                <li><a href="{{ route('users.admins') }}">Admins</a></li>
                <li><a href="{{ route('users.moderators') }}">Moderators</a></li>
                <li><a href="{{ route('users.create') }}">Create User</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0)">
                <i class="fa fa-bars"></i>Categories <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu">
                <li><a href="{{ route('categories.index') }}">All Categories</a></li>
                <li><a href="{{ route('categories.create') }}">Create Category</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0)">
                <i class='fa fa-shopping-basket'></i>Products <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu">
                <li><a href="{{ route('products.index') }}">All Products</a></li>
                <li><a href="{{ route('products.create') }}">Create Product</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0)">
                <i class="fa fa-bars"></i>Invoices <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu">
                <li><a href="{{ route('orders.index') }}">All Invoices</a></li>
                {{-- <li><a href="{{ route('orders.invoice') }}">Invoice</a></li> --}}
                <li><a href="{{ route('orders.create') }}">Create Invoice</a></li>
            </ul>
            {{-- <ul class="nav child_menu">
                <li><a href="{{ route('categories.index') }}">All Categories</a></li>
                <li><a href="{{ route('categories.create') }}">Create Category</a></li>
            </ul> --}}
        </li>

      </ul>
    </div>
  </div>
