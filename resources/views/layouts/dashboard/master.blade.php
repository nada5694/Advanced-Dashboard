<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    {{-- Meta, title, CSS, favicons, etc. --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <title>@yield('title')</title>
    {{-- Bootstrap --}}
    <link href="/assets/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Font Awesome --}}
    <link href="/assets/dashboard/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    {{-- NProgress --}}
    <link href="/assets/dashboard/vendors/nprogress/nprogress.css" rel="stylesheet">
    {{-- iCheck --}}
    <link href="/assets/dashboard/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    {{-- bootstrap-progressbar --}}
    <link href="/assets/dashboard/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    {{-- JQVMap --}}
    <link href="/assets/dashboard/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    {{-- bootstrap-daterangepicker --}}
    <link href="/assets/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    {{-- Custom Theme Style --}}
    <link href="/assets/dashboard/build/css/custom.min.css" rel="stylesheet">
    {{-- Custom CSS --}}
    <link href="/assets/dashboard/custom-assets/style.css" rel="stylesheet">
    @stack('styles')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-dashboard"></i> <span>لوحة تحكم العطارة</span></a>
                </div>
                <div class="clearfix"></div>
                <br/>
                <!-- sidebar menu -->
                @include('layouts.dashboard.partials.sidebar')
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                @include('layouts.dashboard.partials.sidebar-footer')
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        @include('layouts.dashboard.partials.top-nav')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('layouts.dashboard.partials.footer')
        <!-- /footer content -->
      </div>
    </div>

    {{-- jQuery --}}
    <script src="/assets/dashboard/vendors/jquery/dist/jquery.min.js"></script>
    {{-- Bootstrap --}}
    <script src="/assets/dashboard/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    {{-- FastClick --}}
    <script src="/assets/dashboard/vendors/fastclick/lib/fastclick.js"></script>
    {{-- NProgress --}}
    <script src="/assets/dashboard/vendors/nprogress/nprogress.js"></script>
    {{-- Chart.js --}}
    <script src="/assets/dashboard/vendors/Chart.js/dist/Chart.min.js"></script>
    {{-- gauge.js --}}
    <script src="/assets/dashboard/vendors/gauge.js/dist/gauge.min.js"></script>
    {{-- bootstrap-progressbar --}}
    <script src="/assets/dashboard/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    {{-- iCheck --}}
    <script src="/assets/dashboard/vendors/iCheck/icheck.min.js"></script>
    {{-- Skycons --}}
    <script src="/assets/dashboard/vendors/skycons/skycons.js"></script>
    {{-- Flot --}}
    <script src="/assets/dashboard/vendors/Flot/jquery.flot.js"></script>
    <script src="/assets/dashboard/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/assets/dashboard/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/assets/dashboard/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/assets/dashboard/vendors/Flot/jquery.flot.resize.js"></script>
    {{-- Flotplugins --}}
    <script src="/assets/dashboard/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/assets/dashboard/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/assets/dashboard/vendors/flot.curvedlines/curvedLines.js"></script>
    {{-- DateJS --}}
    <script src="/assets/dashboard/vendors/DateJS/build/date.js"></script>
    {{-- JQVMap --}}
    <script src="/assets/dashboard/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/assets/dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/assets/dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    {{-- bootstrap-daterangepicker --}}
    <script src="/assets/dashboard/vendors/moment/min/moment.min.js"></script>
    <script src="/assets/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    {{-- CustomThemeScripts --}}
    <script src="/assets/dashboard/build/js/custom.min.js"></script>
    {{-- Custom JS --}}
    <script src="/assets/dashboard/custom-assets/script.js"></script>
    @stack('scripts')
  </body>
</html>
