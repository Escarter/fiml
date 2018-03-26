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

      <title>{{ config('app.name', 'FIML') }}</title>
      <!-- Styles -->
      <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
  </head>
  <body>

      <div id="app">
        <!-- Content section -->
         @yield('content')
      </div>

     <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/fiml.js') }}"></script>

     <script>
         $(document).ready(function(){
            $('.datepicker').datepicker();
         })
     </script>
     
      @yield('script')
  </body>
</html>
