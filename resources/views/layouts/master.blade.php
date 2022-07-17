<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SI Pengelolaan Kost</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('template/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SI Pengelolaan Kost</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          @if (Str::length(Auth::guard('occupant')->user())>0)
          <a href="" class="d-block">{{ Auth::guard('occupant')->user()->nama }}</a>
          @elseif (Str::length(Auth::guard('user')->user())>0)
          <a href="" class="d-block">{{ Auth::guard('user')->user()->username }}</a>
          @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @if (Str::length(Auth::guard('user')->user())>0)

              @if (Str::length(Auth::guard('user')->user()->level=="pemilik"||"pengelola"))
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard {{ Auth::guard('user')->user()->username }}</p>
                </a>
              </li>
            </ul>
            @endif
            @endif
            @if (Str::length(Auth::guard('user')->user())>0)

              @if (Str::length(Auth::guard('user')->user()->level=="user"))
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboardpenghuni" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Penghuni</p>
                </a>
              </li>
            </ul>
            @endif
            @endif
          </li>
          @if (Str::length(Auth::guard('user')->user())>0)

          @if (Str::length(Auth::guard('user')->user()->level=="pemilik"||"pengelola"))
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Tampil Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/penghuni" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Penghuni</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/pembayaran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/keluhan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Penyampaian Keluhan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @endif
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
              @if (Str::length(Auth::guard('user')->user())>0)

              @if (Str::length(Auth::guard('user')->user()->level=="pemilik"||"pengelola"))
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/tambahpenghuni" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Data Penghuni</p>
                </a>
              </li>
              </ul>
              @endif
              @endif
              @if (Str::length(Auth::guard('occupant')->user())>0)
              @if (Str::length(Auth::guard('occupant')->user()->level=="user"))
              <ul class="nav nav-treeview"> 
              <li class="nav-item">
                <a href="/tampilpembayaranpenghuni/{{ Auth::guard('occupant')->user()->id }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembayaran Kost</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/invoice/{{ Auth::guard('occupant')->user()->id }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tampilkeluhan/{{ Auth::guard('occupant')->user()->id }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penyampaian Keluhan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @endif
          @if (Str::length(Auth::guard('user')->user())>0)
          @if (Str::length(Auth::guard('user')->user()->level==="pemilik"))
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/exportpdfpenghuni" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Penghuni</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/exportpdfpembayaran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pembayaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/exportpdfkeluhan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Keluhan</p>
                </a>
              </li>
            </ul>
          </li>   
          @endif
        
@endif

@if (Str::length(Auth::guard('occupant')->user())>0)

@if (Str::length(Auth::guard('occupant')->user()->level=="user"))
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            @if (Str::length(Auth::guard('occupant')->user())>0)
            <a href="/editdatadiri/{{ Auth::guard('occupant')->user()->id  }}" class="nav-link">
            @endif
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Ubah data diri</p>
            </a>
          </li>
          @endif
@endif
          <li class="nav-item">
            <a href="{{ route('postlogout') }}" class="nav-link">
              <i class="nav-icon fas fa-power"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
   @yield('content')
    <!-- /.content -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src=" {{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('template/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('template/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('template/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('template/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('template/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template/dist/js/pages/dashboard.js') }}"></script>
</body>
</html>
