<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pusba</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/front/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/front/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/front/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/front/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/front/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/front/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('assets/front/vendor/aos/aos.css')}}" rel="stylesheet">

{{-- CSS For News --}}
<link href="{{ asset('assets/css/media_query.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="{{ asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<link href="{{ asset('assets/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
<!-- Bootstrap CSS -->
<link href="{{ asset('assets/css/style_1.css')}}" rel="stylesheet" type="text/css" />
<!-- Modernizr JS -->
<script src="{{ asset('assets/js/modernizr-3.5.0.min.js')}}"></script>

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/front/css/style.css')}}" rel="stylesheet">
</head>

<body>

    @yield('content')

    @stack('after-scripts')

    @stack('scripts')
</body>