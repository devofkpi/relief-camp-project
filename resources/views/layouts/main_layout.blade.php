<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Relief Camp | @yield('title')</title>
  @yield('custom_head_data')

  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/ionicons-2.0.1/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{ asset('/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">

  @yield('page_related_css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src='{{ asset("images/logo.jpg")}}' alt="Manipur Govt Logo" height="60" width="60">
    </div> --}}
  @includeIf('layouts.topnavbar')
  @includeIf('layouts.left-sidenavbar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">@yield('content_title')</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          @yield('content1')
      </div>
    </section>
  </div>
  @includeIf('layouts.footer')
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
<script src="{{ asset('/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{ asset('/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ asset("/plugins/select2/js/select2.full.min.js")}}"></script>
<script src="{{ asset('/js/forge-sha256.js')}}"></script>
<script src="{{ asset('/js/main.js')}}"></script>
<script src="{{ asset('/js/form_validation.js')}}"></script>
@yield('custom_script')
</body>
</html>
<link rel="stylesheet" href="{{ asset('fonts/fonts.css')}}">