<!DOCTYPE html>
<html lang="en">

<!-- layout-top-navigation.html  Tue, 07 Jan 2020 03:35:42 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>ARPS :: Home</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

<!-- CSS Libraries -->

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/components.min.css') }}">
</head>

<body class="layout-3">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>
<div id="app">
    <div class="main-wrapper container">
        <div class="navbar-bg"></div>

        <!-- Start app top navbar -->
        <nav class="navbar navbar-expand-lg main-navbar">
            <div class="container">
                <a href="index-2.html" class="navbar-brand sidebar-gone-hide">ARPS</a>
                <a href="{{ route('index') }}" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#"><i class="fas fa-ellipsis-v"></i></a>
                    <ul class="navbar-nav">
                        <li class="nav-item active"><a href="{{ route('admin.login') }}" class="nav-link">Admin</a></li>
                        <li class="nav-item"><a href="{{ route('student.login') }}" class="nav-link">Student</a></li>
                        <li class="nav-item"><a href="{{ route('staff.login') }}" class="nav-link">Staff</a></li>
                        <li class="nav-item"><a href="{{ route('personel.login') }}" class="nav-link">External Personel</a></li>
                    </ul>
                </div>
                <form class="form-inline ml-auto">
                    <ul class="navbar-nav">
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    {{-- Admin --}}
                    @auth
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <figure class="avatar mr-2 avatar-sm text-white" data-initial="{{ strtoupper(auth()->user()->first_name."".auth()->user()->last_name) }}"></figure>
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ ucwords(auth()->user()->first_name." ".auth()->user()->last_name) }}</div></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Dashboard
                            </a>
                            <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                            <i class="fas fa-bolt"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('admin.logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                    @endauth

                    {{-- Student --}}
                    @auth('student')
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset("images/student/".auth('student')->user()->image) }}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ ucwords(auth('student')->user()->first_name." ".auth('student')->user()->last_name) }}</div></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('student.dashboard') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Dashboard
                            </a>
                            <a href="{{ route('student.profile') }}" class="dropdown-item has-icon">
                            <i class="fas fa-bolt"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('student.logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                    @endauth

                    {{-- Staff --}}
                    @auth('staff')
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset("images/staff/".auth('staff')->user()->image) }}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ ucwords(auth('staff')->user()->first_name." ".auth('staff')->user()->last_name) }}</div></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('staff.dashboard') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Dashboard
                            </a>
                            <a href="{{ route('staff.profile') }}" class="dropdown-item has-icon">
                            <i class="fas fa-bolt"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('staff.logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                    @endauth

                    {{-- Personel --}}
                    @auth('personel')
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset("images/personel/".auth('personel')->user()->image) }}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ ucwords(auth('personel')->user()->first_name." ".auth('personel')->user()->last_name) }}</div></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('personel.dashboard') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Dashboard
                            </a>
                            <a href="{{ route('personel.profile') }}" class="dropdown-item has-icon">
                            <i class="fas fa-bolt"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('personel.logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>

        <!-- Start top menu -->
        <nav class="navbar navbar-secondary navbar-expand-lg">
            <div class="container">
                <ul class="navbar-nav">

                </ul>
            </div>
        </nav>

        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1 class="text-center">Automatic Result Processing System</h1>
                </div>

                <div class="section-body">
                    <h2 class="section-title">This is Example Page</h2>
                    <p class="section-lead">This page is just an example for you to create your own page.</p>
                    <div class="card">
                        <div class="card-header">
                            <h4>Example Card</h4>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="card-footer bg-whitesmoke">This is card footer</div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Start app Footer part -->
        <footer class="main-footer">
            <div class="footer-left">
                 <div class="bullet"></div>  <a href="templateshub.net">Templates Hub</a>
            </div>
            <div class="footer-right">

            </div>
        </footer>
    </div>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('assets/bundles/lib.vendor.bundle.js') }}"></script>
<script src="{{ asset('assets/js/CodiePie.js') }}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>