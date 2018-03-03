<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" sizes="16x16" href="{{asset('plugins/images/favicon.png') }}">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>Forex Is My Life - FIML</title>
      <!-- Bootstrap Core CSS -->
      <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Menu CSS -->
      <link href="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
      <!-- morris CSS -->
      <link href="{{asset('plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
      <!-- animation CSS -->
      <link href="{{ asset('css/animate.css')}}" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="{{ asset('css/style.css')}}" rel="stylesheet">
      <!-- color CSS -->
      <link href="{{ asset('css/colors/default.css')}}" id="theme"  rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- Styles -->
      <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
  </head>
  <body class="fix-header" >

  <!-- ============================================================== -->
  <!-- Preloader                                                      -->
  <!-- ============================================================== -->
  <div class="preloader">
      <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
      </svg>
  </div>

   <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">

        {{-- Check login user and display respective Navigations --}}
        
        @if (Auth::user()->hasRole('admin'))
           {{-- Inclusion of the Main Navbar --}}
           @include('layouts.partials.navigations.admin-navbar')

           {{-- Inclusion of the SideBar --}}
           @include('layouts.partials.navigations.admin-sidebar') 
        @else
            {{-- Inclusion of the Main Navbar --}}
            @include('layouts.partials.navigations.user-navbar')

            {{-- Inclusion of the SideBar --}}
            @include('layouts.partials.navigations.user-sidebar')
        @endif
        
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
        
            <!-- Content section -->
            @yield('content')
            <!-- /.container-fluid -->
           
            {{-- Inclusion of footer --}}
            
            @include('layouts.partials.navigations.footer')
        </div>
        <!-- /#page-wrapper -->

        

    </div>
    <!-- jQuery -->
    <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>

    <!--slimscroll JavaScript -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>
  
    <!--Style Switcher -->
    <script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
    <!--Toast Effects -->
    <script src="{{asset('plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('js/toastr.js')}}"></script>
    <!--Counter js -->
    <script src="{{asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
    <script src="{{asset('plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>
    <!--Morris JavaScript -->
    <script src="{{asset('plugins/bower_components/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('plugins/bower_components/morrisjs/morris.js')}}"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="{{asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dashboard4.js') }}"></script>
  
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    @yield('script')
  </body>
</html>
