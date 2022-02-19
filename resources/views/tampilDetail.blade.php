<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SiRaport | Detail</title>
  <link rel="icon" href="{{asset('dist/img/logo.png')}}" type="image/x-icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php
  function cetakNilai($nilai){
    if($nilai >= 80){
      $huruf = 'A';
    }
    else if($nilai >= 70){
      $huruf = 'B';
    }
    else if($nilai >= 60){
      $huruf = 'C';
    }
    else if($nilai >= 50){
      $huruf = 'D';
    } else {
      $huruf = 'E';
    }
    return $huruf;
  }
  ?>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <i class="far fa-user-circle mr-2"></i> Akun
          </a>
          <a href="#" class="dropdown-item">
            <i class="fas fa-cog mr-2"></i> Pengaturan
          </a>
          <!-- ============= copas layout.app -->
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              <i class="fa fa-power-off mr-2"></i>{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            <!-- =================================== -->
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary bg-biru elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('dist/img/logo.png')}}" alt="Logo SMPN3" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIRaport</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-swatchbook"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/id" class="nav-link">
                  <i class="fa fa-graduation-cap nav-icon"></i>
                  <p>Identitas Sekolah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kelas" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Data Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/siswa" class="nav-link">
                  <i class="fa fa-address-card nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Data Raport
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/raport-kelas-7" class="nav-link">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Kelas 7</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/raport-kelas-8" class="nav-link">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Kelas 8</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/raport-kelas-9" class="nav-link">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Kelas 9</p>
                </a>
              </li>
            </ul>
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
              <li class="breadcrumb-item"><a href="#">Data Raport</a></li>
              <li class="breadcrumb-item active">Detail Raport</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <a href="/raport-kelas-7" class="btn btn-md btn-primary mb-3">Kembali</a>
        <div class="card">
          <div class="card-header">
            @foreach($tb_raport as $r)
            <div class="container-fluid mt-2">
                <table class="mt-2">
                    <tr>
                        <td class="py-2">Nama</td>
                        <td class="p-2"> : {{$r->nama}}</td>
                    </tr>
                    <tr>
                        <td class="py-2">NIS</td>
                        <td class="p-2"> : {{$r->nis}}</td>
                    </tr> 
                    <tr class="p-2">
                        <td class="py-2">Semester</td>
                        <td class="p-2"> : {{$r->semester}}</td>
                    </tr>
                    <tr class="p-2">
                        <td class="py-2">Kelas</td>
                        <td class="p-2"> : {{$r->nama_kelas}}</td>
                    </tr>  
                </table>
            </div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover table-striped table-responsive-md">
              <thead class="text-center">
              <tr>
                <th>Mata Pelajaran</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>Pendidikan Agama</td>
                <td class="text-center">{{$r->agama}}</td>
                <td class="text-center">{{cetakNilai($r->agama)}}</td>
              </tr>
              <tr>
                <td>Pendidikan Kewarganegaraan</td>
                <td class="text-center">{{$r->pkn}}</td>
                <td class="text-center">{{cetakNilai($r->pkn)}}</td>
              </tr>
              <tr>
                <td>Bahasa Indonesia</td>
                <td class="text-center">{{$r->indonesia}}</td>
                <td class="text-center">{{cetakNilai($r->indonesia)}}</td>
              </tr>
              <tr>
                <td>Bahasa Inggris</td>
                <td class="text-center">{{$r->inggris}}</td>
                <td class="text-center">{{cetakNilai($r->inggris)}}</td>
              </tr>
              <tr>
                <td>Matematika</td>
                <td class="text-center">{{$r->matematika}}</td>
                <td class="text-center">{{cetakNilai($r->matematika)}}</td>
              </tr>
              <tr>
                <td>Ilmu Pengetahuan Alam</td>
                <td class="text-center">{{$r->ipa}}</td>
                <td class="text-center">{{cetakNilai($r->ipa)}}</td>
              </tr>
              <tr>
                <td>Ilmu Pengetahuan Sosial</td>
                <td class="text-center">{{$r->ips}}</td>
                <td class="text-center">{{cetakNilai($r->ips)}}</td>
              </tr>
              <tr>
                <td>Rata - rata</td>
                <td class="text-center">{{$rata=round(($r->agama+$r->pkn+$r->indonesia+$r->inggris+$r->matematika+$r->ipa+$r->ips)/7, 2)}}</td>
                <td class="text-center">{{cetakNilai($rata)}}</td>
              </tr>
              </tbody>
            </table>
            <a href="/cetakraport/{{$r->kode_raport}}" class="btn btn-md btn-danger mb-3 mt-2">Print</a>
            @endforeach
          </div>
          <!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content --> 
  </div>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
</body>
</html>
