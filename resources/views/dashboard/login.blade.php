<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page</title>
    <link rel="apple-touch-icon" href="{{ asset('my-assets/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('my-assets/app-assets/images/icons/tamam-logo.svg') }}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/vendors/css/vendors-rtl.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css-rtl/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('my-assets/app-assets/css-rtl/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('my-assets/app-assets/css-rtl/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('my-assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('my-assets/app-assets/css-rtl/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css-rtl/pages/page-auth.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/assets/css/style-rtl.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo--><a class="brand-logo" href="javascript:void(0);">
                            <img class="my-2"
                                src="{{ asset('my-assets/app-assets/images/icons/tamam-logo.svg') }}" alt="logo">
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid"
                                    src="{{ asset('my-assets/app-assets/images/pages/login-v2.svg') }}"
                                    alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title font-weight-bold mb-1  w-100 text-center">👋 !Welcome to Tamam
                                </h2>
                                <p class="card-text mb-2  w-100 text-center">Please sign-in to your account and start
                                    the adventure</p>
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                <form class="auth-login-form mt-2" action="{{ route('DoLogin') }}" method="POST">
                                    <div class="form-group d-flex flex-column w-100 align-items-end">
                                        {{-- @csrf --}}
                                        <label class="form-label" for="email">Email</label>
                                        {{-- <input class="form-control" id="email" type="text" name="email"
                                            placeholder="john@example.com" aria-describedby="email" autofocus=""
                                            tabindex="1" /> --}}
                                        <input id="email" type="email"
                                            class="form-control  @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            tabindex="1" placeholder="john@example.com">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group d-flex flex-column w-100 align-items-end">
                                        <div class="d-flex justify-content-between w-100">
                                            <a href="forgot-password.html"><small>?Forgot Password</small></a> <label
                                                for="password">Password</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            {{-- <input class="form-control form-control-merge" id="password"
                                                type="password" name="password" placeholder="············"
                                                aria-describedby="password" tabindex="2" /> --}}
                                            <input id="password" type="password" placeholder="············" tabindex="2"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="input-group-append"><span
                                                    class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex  w-100 align-items-end justify-content-end">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="remember-me" type="checkbox"
                                                tabindex="3" />
                                            <label class="custom-control-label" for="remember-me"> Remember Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-success btn-block" tabindex="4">Login</button>
                                </form>
                            </div>
                            <!-- /Login-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content-->


        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset('my-assets/app-assets/vendors/js/vendors.min.js') }}"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{ asset('my-assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{ asset('my-assets/app-assets/js/core/app-menu.js') }}"></script>
        <script src="{{ asset('my-assets/app-assets/js/core/app.js') }}"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="{{ asset('my-assets/app-assets/js/scripts/pages/page-auth-login.js') }}"></script>
        <!-- END: Page JS-->

        <script>
            $(window).on('load', function() {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            })
        </script>
</body>
<!-- END: Body-->

</html>
