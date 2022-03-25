<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>ARPS :: @yield('title')</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">

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
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    {{-- <div class="login-brand">
                        <img src="http://puffintheme.com/craft/codiepie/dist/assets/img/CodiePie-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div> --}}
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>@yield('title')</h4>
                        </div>
                        @yield('content')
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; CodiePie 2020
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('assets/bundles/lib.vendor.bundle.js') }}"></script>
<script src="{{ asset('assets/js/CodiePie.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
