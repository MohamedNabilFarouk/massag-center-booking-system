
<!DOCTYPE html>
<html @if(App::getLocale() === 'ar')
lang="ar" dir="rtl"
@else
lang="en" dir="ltr"
@endif>

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content>
	<meta name="author" content>
	<meta name="robots" content>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Massage Majed Admin Dashboard">
	<meta property="og:title" content="Massage Majed Admin Dashboard">
	<meta property="og:description" content="Massage Majed Admin Dashboard">
	<meta property="og:image" content="images/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Massage Majed Admin Dashboard</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('front/images/logo-light.png')}}">
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
										<a href="{{url('/')}}"><img src="{{ asset('front/images/logo-light.png')}}"  style="width:100%" alt></a>
									</div>
                                    {{-- <h4 class="text-center mb-4">Welcome To Massage Majed <br>Sign in your account</h4> --}}

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

									<form method="post" action="{{url('admin/auth/login')}}">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>{{__('Email')}}</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="hello@example.com">
											@error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
											@enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>{{__('Password')}}</strong></label>
                                            <input type="password" name="password" class="form-control" placeholder="*********">
											@error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="{{url('admin/auth/forgot-password')}}">Forgot Password?</a>
                                            </div>
                                        </div> --}}
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block"> {{ __('Sign up') }}</button>
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
