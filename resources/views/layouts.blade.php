<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? 'Construction Finance' }}</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->

    <!-- Page-specific plugin css -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- end plugin css -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    @stack('styles')
</head>

<body>
<div class="container-scroller">
    <!-- Navbar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="{{ url('dashboard') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo"/> Construction Finance
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('dashboard') }}">
                <img src="{{ asset('images/logo-mini.svg') }}" alt="Logo"/>
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="{{ asset('images/user.png') }}" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ url('profile') }}">
                            <i class="ti-user text-primary"></i> Profile
                        </a>
                        <a class="dropdown-item" href="{{ url('logout') }}">
                            <i class="ti-power-off text-primary"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('dashboard') }}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('projects') }}">
                        <i class="icon-briefcase menu-icon"></i>
                        <span class="menu-title">Projects</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contractors') }}">
                        <i class="icon-people menu-icon"></i>
                        <span class="menu-title">Contractors</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('materials') }}">
                        <i class="icon-layers menu-icon"></i>
                        <span class="menu-title">Materials</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('finances.index') }}">
                        <i class="icon-wallet menu-icon"></i>
                        <span class="menu-title">Finances</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('reports') }}">
                        <i class="icon-chart menu-icon"></i>
                        <span class="menu-title">Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('settings') }}">
                        <i class="icon-settings menu-icon"></i>
                        <span class="menu-title">Settings</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted">© {{ date('Y') }} Construction Finance. All rights reserved.</span>
                </div>
            </footer>
        </div>
    </div>
</div>

<!-- plugins:js -->
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<!-- end plugin js -->

<!-- inject:js -->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<!-- endinject -->

@stack('scripts')
</body>

</html>
