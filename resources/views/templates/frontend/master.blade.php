<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/smoothness/jquery-ui-1.10.4.custom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/colors/turquoise.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">
    @yield('customcss')
</head>

  <body>
    @include('templates.frontend.header')
    @yield('content')
    @include('templates.frontend.footer')

    <!-- Javascripts --> 
    <script type="text/javascript" src="{{ asset('frontend/js/jquery-1.11.0.min.js ') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap-hover-dropdown.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.parallax-1.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.nicescroll.js') }}"></script>  
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/js/jquery-ui-1.10.4.custom.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.jigowatt.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.sticky.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/js/waypoints.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.isotope.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.gmap.min.js') }}"></script> 
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('frontend/js/custom.js') }}"></script> 
  </body>
</html>