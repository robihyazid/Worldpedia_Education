<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Worldpedia Education | Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    @stack('css.vendor')
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div> -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="{{ asset('img/worldpedia.jpeg') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-5" style="opacity: .8">
                <span class="brand-text font-weight-dark">Worldpedia Education</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/worldpedia.jpeg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link {{ (request()->is('dashboard*')) ? 'active' : '' }}">
                                <p>
                                    <i class="fas fa-tachometer-alt"></i>
                                    <i>Dashboard</i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a href="{{ route('daftar.index') }}" class="nav-link {{ (request()->is('admin/daftar*')) ? 'active' : '' }}">
                                <p>
                                    <i class="fas fa-users"></i>
                                    <i>Registration</i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kelas.index') }}" class="nav-link {{ (request()->is('admin/kelas*')) ? 'active' : '' }}">
                                <p>
                                    <i class="fas fa-school"></i>
                                    <i>Classes</i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guru.index') }}" class="nav-link {{ (request()->is('admin/guru*')) ? 'active' : '' }}">
                                <p>
                                    <i class="fas fa-user-graduate"></i>
                                    <i>Teachers</i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('galeri.index') }}" class="nav-link {{ (request()->is('admin/galeri*')) ? 'active' : '' }}">
                                <p>
                                    <i class="fas fa-images"></i>
                                    <i>Gallery</i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active' : '' }}">
                                <p>
                                    <i class="fas fa-user-edit"></i>
                                    <i>Manajemen User</i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('konfirmasi.detail') }}" class="nav-link {{ (request()->is('admin/konfirmasi*')) ? 'active' : '' }}">
                                <p>
                                    <i class="fas fa-money-check"></i>
                                    <i>Konfirmasi</i>
                                </p>
                            </a>
                        </li>
                        <br>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit"class="btn btn-danger">
                                <i class="fas fa-sign-out-alt"> Logout</i>
                            </button>
                        </form>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('template/dist/js/adminlte.js') }}"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('template/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('template/plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('template/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
        <script src="{{ asset('template/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>

        <script src="{{ asset('template/dist/js/pages/dashboard2.js') }}"></script>
        @stack('javascript.vendor')

        @stack('javascript.custom')
</body>

</html>
