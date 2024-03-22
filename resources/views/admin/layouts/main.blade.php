<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  @yield('title')
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('dashboard/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('dashboard/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


  <!-- Template Main CSS File -->
  <link href="{{ asset('dashboard/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  @include('admin.componen.navbar')

  <!-- ======= Sidebar ====== -->
  @include('admin.componen.menu')

  <main id="main" class="main">
  @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin.componen.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
  <script src="{{ asset('dashboard/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>
  @yield('script')

</body>

</html>