<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
<!--*************************************************************************-->
        <div class="topnav navbar-fixed-top" id="myTopnav">
          <a href="/" ><i class="fa fa-fw fa-home"></i></a>
          <a id="notifications" href="requests" class="active"><i class="fa fa-fw fa-bell"></i><sup class="badge">{{ app('nots') }}</sup>
              Notifications
          </a>
          @auth
          <a href="{{url('logout')}}"><i class="fa fa-fw fa-power-off"></i></a>
          @endauth
          
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
        </div>
        <script src="{{asset('js/header.js')}}"></script>
<!--*************************************************************************-->

        @yield('content')
        <!-- Start Scroll To Top-->
        <div id="scroll-top" class="fa fa-chevron-up"></div>
    <!-- End Scroll To Top-->
    <div title="Dashboard" class="thenav visible-xs-block fa fa-caret-right"></div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('js/actions.js') }}"></script>
    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/notifications.js') }}"></script>
    <script src="{{ asset('js/js.js') }}"></script>
    <script src="{{asset('js/tables_ajax.js')}}"></script>
</body>
</html>
