<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">


  {!! SEO::generate() !!}

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="apple-mobile-web-app-title" content="Mentari Sehat Indonesia Kabupaten Sragen">
  <meta name="application-name" content="Mentari Sehat Indonesia Kabupaten Sragen">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('dashboard/assets/css/style.css') }}" rel="stylesheet">

</head>
<body>
  <main>
    <div class="container">
      @yield('content')
    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dashboard/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="dashboard/assets/vendor/echarts/echarts.min.js"></script>
  <script src="dashboard/assets/vendor/quill/quill.min.js"></script>
  <script src="dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="dashboard/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="dashboard/assets/js/main.js"></script>

</body>

</html>