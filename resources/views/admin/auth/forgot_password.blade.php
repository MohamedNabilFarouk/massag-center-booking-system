
<!DOCTYPE html>
<html lang="en"  class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content>
	<meta name="author" content>
	<meta name="robots" content>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Faraj El Madina Hotel Admin Dashboard">
	<meta property="og:title" content="Faraj El Madina Hotel Admin Dashboard">
	<meta property="og:description" content="Faraj El Madina Hotel Admin Dashboard">
	<meta property="og:image" content="images/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Faraj El Madina Hotel Admin Dashboard</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('login/images/LOGO.png')}}">
    <link href="{{ asset('login/css/style.css')}}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="{{ asset('login/images/LOGO.png')}}" alt></a>
									</div>
                                    <h4 class="text-center mb-4">Welcome to Faraj El Madinah, <br>Reset your account password</h4>

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

									<form method="post" action="{{url('admin/auth/forgot_password')}}">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="hello@example.com">
											@error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
											@enderror
                                        </div>

                                        <div class="row d-flex justify-content-between mt-4 mb-2">

                                            <div class="mb-3">
                                                <a href="{{url('admin/auth/login')}}">Login?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Reset My Password</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
