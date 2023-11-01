<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsha Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

   <!-- Favicons -->
  <link href="{{ URL::asset('resources/img/favicon.png') }}" rel="icon">
  <link href="{{ URL::asset('resources/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::asset('resources/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('resources/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('resources/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('resources/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('resources/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('resources/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('resources/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <!-- Template Main CSS File -->
  <link href="{{ URL::asset('resources/css/style.css') }}" rel="stylesheet">
  
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
  @extends('index.header')
  <br><br>
  @yield('content')
  @extends('index.footer')
  <!-- Vendor JS Files -->
  <script src="{{ URL::asset('resources/vendor/aos/aos.js') }}"></script>
  <script src="{{ URL::asset('resources/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::asset('resources/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ URL::asset('resources/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ URL::asset('resources/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ URL::asset('resources/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ URL::asset('resources/vendor/php-email-form/validate.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Template Main JS File -->
  <script src="{{ URL::asset('resources/js/main.js') }}"></script>
  <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	@stack('scripts')
 

</body>

</html>