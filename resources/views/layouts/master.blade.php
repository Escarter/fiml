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

      <!-- Styles -->
      <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
  </head>
  <body >
      <div class="container-fluid" id="app">
        <div class="row">
            {{-- Check login user and display respective Navigations --}}

            @if (!Auth::user())
            <script type="text/javascript">
                window.location = "{{ url('/login') }}";//here double curly bracket
            </script>
            @elseif(Auth::user()->hasRole('admin') )
            {{-- Inclusion of the Main Navbar --}}
            @include('layouts.partials.navigations.admin-sidebar')

            @else
            {{-- Inclusion of the Main Navbar --}}
            @include('layouts.partials.navigations.user-sidebar')

            @endif

                    <!-- Content section -->
                <div class="right-column">
                    @if (!Auth::user())
                    <script type="text/javascript">
                        window.location = "{{ url('/login') }}";//here double curly bracket
                    </script>
                    @elseif(Auth::user()->hasRole('admin') )
                    {{-- Inclusion of the Main Navbar --}}
                    @include('layouts.partials.navigations.admin-navbar')
        
                    @else
                    {{-- Inclusion of the Main Navbar --}}
                    @include('layouts.partials.navigations.user-navbar')
        
                    @endif
                    <main class="main-content p-5" role="main">
                        @yield('content')
                        @include('layouts.partials.navigations.footer')
                    </main>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}"></script> 
     <script src="{{ asset('js/fiml.js') }}"></script> 
    @yield('scripts')
  </body>
</html>
