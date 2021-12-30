<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Sistem Informasi Posyandu Kab. Klaten</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css" type="text/css')}}">
  <link rel="stylesheet" href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/nucleo/css/nucleo.css">
  <link rel="stylesheet" href="{{asset('assets/vendor/fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'home' ? 'active' : null }}" href="/home">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'balita' ? 'active' : null }}" href="/balita">
                <i class="ni ni-single-02 text-orange"></i>
                <span class="nav-link-text">Balita</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'pengukuran' ? 'active' : null }}" href="/pengukuran">
                <i class="ni ni-ruler-pencil text-orange"></i>
                <span class="nav-link-text">Pengukuran</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'imunisasi' ? 'active' : null }}" href="/imunisasi">
                <i class="ni ni-ambulance text-orange"></i>
                <span class="nav-link-text">Imunisasi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'jadwal' ? 'active' : null }}" href="/jadwal">
                <i class="ni ni-calendar-grid-58 text-orange"></i>
                <span class="nav-link-text">Jadwal</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'kader' ? 'active' : null }}" href="/kader">
                <i class="ni ni-circle-08 text-orange"></i>
                <span class="nav-link-text">Kader</span>
              </a>
            </li>
            <li class="nav-item dropdown {{ Request::segment(1) === 'Keuangan' ? 'active' : null }}">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="ni ni-circle-08 text-orange"></i>
                  <span>Keuangan</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                  <a class="dropdown-item {{ Request::segment(1) === 'Keuangan' ? 'active' : null }}" href="/pemasukan">
                    <i class="ni ni-circle-08 text-orange"></i> Pemasukan</a>
                  <a class="dropdown-item {{ Request::segment(1) === 'Keuangan' ? 'active' : null }}" href="/pengeluaran">
                    <i class="ni ni-circle-08 text-orange"></i> Pengeluaran</a>
                  <a class="dropdown-item {{ Request::segment(1) === 'Keuangan' ? 'active' : null }}" href="/laporan">
                    <i class="ni ni-circle-08 text-orange"></i> Laporan</a>
              </div>
          </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">

          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('assets/img/profil.jpg')}}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                  <i class="ni ni-user-run"></i>
                  {{ __('Log Out') }}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    {{-- CONTENT --}}
    @yield('content')

    @include('sweetalert::alert')


  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>