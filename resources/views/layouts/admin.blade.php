<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Analytics &mdash; CodiePie</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/components.min.css') }}">
<style>
    .error {
        font-size: 12px;
        color: red;
    }
</style>
</head>

<body class="layout-4">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        <!-- Start app top navbar -->
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
                <div class="search-element">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header">
                    Messages
                    </div>
                    <div class="dropdown-list-content dropdown-list-message">
                        <a href="#" class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-avatar">
                                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle">
                                <div class="is-online"></div>
                            </div>
                            <div class="dropdown-item-desc">
                                <b>Kusnaedi</b>
                                <p>Hello, Bro!</p>
                                <div class="time">10 Hours Ago</div>
                            </div>
                        </a>
                    </div>
                    </div>
                </li>
                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header">
                    Notifications
                    </div>
                    <div class="dropdown-list-content dropdown-list-icons">
                        <a href="#" class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-icon bg-primary text-white">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="dropdown-item-desc"> Template update is available now!
                                <div class="time text-primary">2 Min Ago</div>
                            </div>
                        </a>
                    </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->first_name." ".auth()->user()->last_name }}</div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon"><i class="far fa-user"></i> Profile</a>
                        <a href="features-settings.html" class="dropdown-item has-icon"><i class="fas fa-cog"></i> Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin.logout') }}" class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Start main left sidebar menu -->
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{ route('index') }}">ARPS</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{ route('index') }}">ARPS</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header"></li>
                    <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                    <li class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                        <a href="{{ route('admin.profile') }}" class="nav-link"><i class="fas fa-user"></i><span>Profile</span></a>
                    </li>
                    <li class="{{ request()->routeIs('admin.students') ? 'active' : '' }}">
                        <a href="{{ route('admin.students') }}" class="nav-link"><i class="fas fa-user-graduate"></i><span>Students</span></a>
                    </li>
                    <li class="{{ request()->routeIs('admin.staffs') ? 'active' : '' }}">
                        <a href="{{ route('admin.staffs') }}" class="nav-link"><i class="fas fa-user-tie"></i><span>Staffs</span></a>
                    </li>
                    <li class="{{ request()->routeIs('admin.external.personel') ? 'active' : '' }}">
                        <a href="{{ route('admin.external.personel') }}" class="nav-link"><i class="fas fa-user-friends"></i><span>External Personnel</span></a>
                    </li>
                    <li class="{{ request()->routeIs('admin.courses') ? 'active' : '' }}">
                        <a href="{{ route('admin.courses') }}" class="nav-link"><i class="fas fa-book"></i><span>Courses</span></a>
                    </li>
                    <li class="{{ request()->routeIs('admin.course.allocation') ? 'active' : '' }}">
                        <a href="{{ route('admin.course.allocation') }}" class="nav-link"><i class="fas fa-stream"></i><span>Course Allocation</span></a>
                    </li>
                    <li class="{{ request()->routeIs('admin.session.setting') ? 'active' : '' }}">
                        <a href="{{ route('admin.session.setting') }}" class="nav-link"><i class="fas fa-cogs"></i><span>Session Setting</span></a>
                    </li>
                    <li class="{{ request()->routeIs('admin.semester.setting') ? 'active' : '' }}">
                        <a href="{{ route('admin.semester.setting') }}" class="nav-link"><i class="fas fa-cogs"></i><span>Semester Setting</span></a>
                    </li>
                </ul>
            </aside>
        </div>

        <!-- Start app main Content -->
        <div class="main-content">
            @yield('content')
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
<script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('assets/modules/dropzonejs/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/page/index-0.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    $('.dropify').dropify({
        tpl: {
            message: '<div class="dropify-message"><span class="fas fa-cloud-upload-alt" /> <p style="font-size: 16px !important;">@{{ default }}</p></div>',
        }
    });
</script>
</body>
</html>