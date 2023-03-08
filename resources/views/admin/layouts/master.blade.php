<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content>
	<meta name="author" content>
	<meta name="robots" content>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Travl : Hotel Admin Dashboard Bootstrap 5 Template">
	<meta property="og:title" content="Travl : Hotel Admin Dashboard Bootstrap 5 Template">
	<meta property="og:description" content="Travl : Hotel Admin Dashboard Bootstrap 5 Template">
	<meta property="og:image" content="{{ asset('dashboard/images/social-image.png') }}">
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Massage Majed Admin Dashboard</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('dashboard/images/favicon.png') }}">
	<link href="{{ asset('dashboard/css/nice-select.css') }}" rel="stylesheet">
	<link href="{{ asset('dashboard/css/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('dashboard/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    @if(App::getLocale()== 'ar')
	<!-- Style css -->
	<link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('dashboard/css/style-rtl.css') }}" rel="stylesheet">
@else
<link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">
@endif
    @yield('styles')







    {{-- text editor --}}

{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script src="https://cdn.tiny.cloud/1/zv4xtgpoxlxchlqnp9a9in90cdrfirjia4zetjdw9q5tvi3e/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
     tinymce.init({
       selector: 'textarea#editor', });
</script>

    {{-- end text editor --}}




</head>
<body>

@php
    // dd(App\Libs\Adminauth::user());
    if((App\Libs\Adminauth::user()!= null)){
		$all = App\Libs\Adminauth::user()->notifications()->where('read_at',NULL)->get();
    }else{
			$all =[];
	}
//  dd($all);
@endphp
{{-- @dd(count($all)) --}}
	<!--*******************
		Preloader start
	********************-->
	<div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
	</div>
	<!--*******************
		Preloader end
	********************-->

	<!--**********************************
		Main wrapper start
	***********************************-->
	<div id="main-wrapper">

		<!--**********************************
			Nav header start
		***********************************-->
		<div class="nav-header" style="background-color: #1a2e59;">
			<a href="{{url('admin/dashboard')}}" class="brand-logo">
                <img style="height: 56px;" class="my-2"
                src="{{ asset('front/images/logo-light.png')}}" alt="logo">
			</a>
			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span><span class="line"></span><span class="line"></span>
				</div>
			</div>
		</div>
		<!--**********************************
			Nav header end
		***********************************-->



		<!--**********************************
			Header start
		***********************************-->
		<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<div class="dashboard_bar">
								{{__("Admin Dashboard")}}
							</div>
						</div>
                            {{-- <div class="nav-item d-flex align-items-center">
                                <div class="input-group search-area">
                                    <input type="text" class="form-control" placeholder>
                                    <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                                </div>
                            </div> --}}
						<ul class="navbar-nav header-right">

							<li class="nav-item dropdown notification_dropdown">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="19.375" height="24" viewBox="0 0 19.375 24">
									  <g id="_006-notification" data-name="006-notification" transform="translate(-341.252 -61.547)">
										<path id="Path_1954" data-name="Path 1954" d="M349.741,65.233V62.747a1.2,1.2,0,1,1,2.4,0v2.486a8.4,8.4,0,0,1,7.2,8.314v4.517l.971,1.942a3,3,0,0,1-2.683,4.342h-5.488a1.2,1.2,0,1,1-2.4,0h-5.488a3,3,0,0,1-2.683-4.342l.971-1.942V73.547a8.4,8.4,0,0,1,7.2-8.314Zm1.2,2.314a6,6,0,0,0-6,6v4.8a1.208,1.208,0,0,1-.127.536l-1.1,2.195a.6.6,0,0,0,.538.869h13.375a.6.6,0,0,0,.536-.869l-1.1-2.195a1.206,1.206,0,0,1-.126-.536v-4.8a6,6,0,0,0-6-6Z" transform="translate(0 0)" fill="#135846" fill-rule="evenodd"/>
									  </g>
									</svg>

									<span class=" badge light text-white bg-primary rounded-circle">{{count($all)}}</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
										<ul class="timeline">
											@foreach( $all as $n)
                                            {{-- @dd($n) --}}
                                            <li>
                                        @if($n->type == 'App\Notifications\NewBookingNotification')
											<a href="{{route('details', ['id'=>$n->data['id']])}}">
											{{-- <a href="{{route('details', ['id'=>$n->data['id'],'notifi_id'=>$n->id])}}"> --}}
                                           @else
                                           <a href='#'>
                                            @endif
                                                <div class="timeline-panel">
													{{-- <div class="media me-2">
														<img alt="image" width="50" src="{{ asset('dashboard/images/1.jpg') }}">
													</div> --}}
													<div class="media-body">
														<h6 class="mb-1">{{$n->data['title_'.app()->getlocale()] ?? ''}}</h6>
                                                        <a href="{{route('markNotification', $n->id)}}" class="float-right mark-as-read" >
                                                            {{__('Mark as read')}}
                                                        </a>
														<small class="d-block">{{\Carbon\Carbon::parse($n->created_at)->toDayDateTimeString()}}</small>

													</div>
												</div>
                                            </a>

											</li>
											@endforeach
										</ul>
									</div>
									{{-- <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a> --}}
								</div>
							</li>

							<li class="nav-item dropdown header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="{{ asset('images/avatar.jpg') }}" width="20" alt>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item ai-icon">
										<span class="ms-2">{{__("Welcome")}}, {{@App\Libs\Adminauth::user()->name}} </span>
									</a>
                                    <hr>
									{{-- <a href="{{url('admin/admins/edit-account')}}" class="dropdown-item ai-icon">
										<svg id="icon-user2" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
										<span class="ms-2">Profile </span>
									</a> --}}
									<a href="{{url('admin/admins/change-password')}}" class="dropdown-item ai-icon">
										<svg id="icon-user2" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
										<span class="ms-2">{{__("Change password")}} </span>
									</a>
									<a href="{{url('admin/auth/logout')}}" class="dropdown-item ai-icon">
										<svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
										<span class="ms-2">{{__("Logout")}} </span>
									</a>
                                    @if(\App::getLocale() == 'en')


                                    <a  href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="dropdown-item ai-icon">
										<i class="fa fa-globe"></i>
										<span class="ms-2">AR </span>
									</a>
                                    @else
                                    <a  href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="dropdown-item ai-icon">
										<i class="fa fa-globe"></i>
										<span class="ms-2">EN </span>
									</a>
                                 @endif
								</div>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<!--**********************************
			Header end ti-comment-alt
		***********************************-->

		<!--**********************************
			Sidebar start
		***********************************-->
		<div class="dlabnav">
			<div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					<li><a class="active " href="{{url('admin/dashboard')}}" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">{{__('Admin Dashboard')}}</span>
						</a>
					</li>

                    <li><a class="active " href="{{url('admin/customers')}}" aria-expanded="false">
                            <i class="flaticon-045-heart"></i>
                            <span class="nav-text">{{__("Customers")}}</span>
                        </a>
                    </li>
                    <li><a class="active " href="{{url('admin/team')}}" aria-expanded="false">
                            <i class="fa fa-users"></i>
                            <span class="nav-text">{{__("Team")}}</span>
                        </a>
                    </li>

                    <li><a class="active" href="{{url('admin/Products')}}" aria-expanded="false">
                        <i class="fa fa-list"></i>
                            <span class="nav-text">{{__("Products")}}</span>
                        </a>
                    </li>
                    <li><a class="active" href="{{url('admin/Packages')}}" aria-expanded="false">
                        <i class="fa fa-list"></i>
                            <span class="nav-text">{{__("Packages")}}</span>
                        </a>
                    </li>
                    <li><a class="active" href="{{url('admin/orders')}}" aria-expanded="false">
                        <i class="fa fa-list"></i>
                            <span class="nav-text">{{__("Orders")}}</span>
                        </a>
                    <li><a class="active" href="{{url('admin/booking')}}" aria-expanded="false">
                        <i class="fa fa-list"></i>
                            <span class="nav-text">{{__("Bookings")}}</span>
                        </a>
                    </li>
                    {{-- <li><a class="active" href="{{url('admin/Reviews')}}" aria-expanded="false">
                        <i class="fa fa-comments"></i>
                        <span class="nav-text">Reviews</span>
                    </a>
                    </li> --}}
                    <li><a class="active" href="{{url('admin/Services')}}" aria-expanded="false">
                        <i class="fa fa-gift"></i>
                        <span class="nav-text">{{__("Services")}}</span>
                    </a>
                </li>

                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
						<i class="flaticon-043-menu"></i>
							<span class="nav-text">{{__("WebSite Control")}}</span>
						</a>
						<ul aria-expanded="false">
							@if(App\Libs\ACL::can('view-news'))
                            <li class="{{(Request::is('admin/news*') || Request::is('admin/news*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url('admin/news')}}"<span class="menu-title text-truncate" data-i18n="User">{{__("News")}}</span></a>
                            </li>
                            @endif

                            @if(App\Libs\ACL::can('view-pages'))
                            <li class="{{(Request::is('admin/pages*') || Request::is('admin/pages*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url('admin/pages')}}"<span class="menu-title text-truncate" data-i18n="User">{{__("Pages")}}</span></a>
                            </li>
                            @endif

                            {{-- @if(App\Libs\ACL::can('view-paragraphs'))
                            <li class="{{(Request::is('admin/paragraphs*') || Request::is('admin/paragraphs*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url('admin/paragraphs')}}"<span class="menu-title text-truncate" data-i18n="User">Paragraphs</span></a>
                            </li>
                            @endif

                            @if(App\Libs\ACL::can('view-slides'))
                            <li class="{{(Request::is('admin/slides*') || Request::is('admin/slides*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url('admin/slides')}}"<span class="menu-title text-truncate" data-i18n="User">Slider</span></a>
                            </li>
                            @endif
                            @if(App\Libs\ACL::can('view-Bestprices'))
                            <li class="{{(Request::is('admin/Bestprices*') || Request::is('admin/Bestprices*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url('admin/Bestprices')}}"<span class="menu-title text-truncate" data-i18n="User">Best Prices</span></a>
                            </li>
                            @endif
                            @if(App\Libs\ACL::can('view-hotelRules'))
                            <li class="{{(Request::is('admin/hotelRules*') || Request::is('admin/hotelRules*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url('admin/hotelRules')}}"<span class="menu-title text-truncate" data-i18n="User">Hotel Rules</span></a>
                            </li>
                            @endif --}}

                            {{-- @if(App\Libs\ACL::can('view-images'))
                            <li class="{{(Request::is('admin/images*') || Request::is('admin/images*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url('admin/images')}}"<span class="menu-title text-truncate" data-i18n="User">Gallery</span></a>
                            </li>
                            @endif --}}

                            {{-- @if(App\Libs\ACL::can('view-subscribers'))
                            <li class="{{(Request::is('admin/subscribers*') || Request::is('admin/subscribers*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url('admin/subscribers')}}"<span class="menu-title text-truncate" data-i18n="User">Subscribers</span></a>
                            </li>
                            @endif --}}

                            @if(App\Libs\ACL::can('view-contacts'))
                            <li class="{{(Request::is('admin/contacts*') || Request::is('admin/contacts*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url('admin/contacts')}}"<span class="menu-title text-truncate" data-i18n="User">{{__("Contact us")}}</span></a>
                            </li>
                            @endif

                            @if(App\Libs\ACL::can('view-site_settings'))
                            <li class="{{(Request::is('admin/site_settings*') || Request::is('admin/site_settings*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url('admin/site_settings')}}"<span class="menu-title text-truncate" data-i18n="User">{{__("Settings")}}</span></a>
                            </li>
                            @endif
                            @if(App\Libs\ACL::can('view-site_settings'))
                            <li class="{{(Request::is('admin/social_settings*') || Request::is('admin/social_settings*'))?'active':''}} nav-item"><a class="d-flex align-items-center" href="{{url('admin/social_settings')}}"<span class="menu-title text-truncate" data-i18n="User">{{__("Social Media")}}</span></a>
                            </li>
                            @endif
						</ul>
					</li>


				</ul>
			</div>
		</div>
		<!--**********************************
			Sidebar end
		***********************************-->

		<!--**********************************
			Content body start
		***********************************-->
		<div class="content-body">
			<!-- row -->
			<div class="container-fluid">
				@yield('content')
			</div>
		</div>
		<!--**********************************
			Content body end
		***********************************-->



		<!--**********************************
			Footer start
		***********************************-->
		<div class="footer">
			<div class="copyright">
				<p>Copyright © Designed &amp; Developed by <a href="https://alefsoftware.com/" target="_blank">Alef Software</a> {{ \Carbon\Carbon::now()->year }}  </p>
			</div>
		</div>
		<!--**********************************
			Footer end
		***********************************-->

		<!--**********************************
		   Support ticket button start
		***********************************-->

		<!--**********************************
		   Support ticket button end
		***********************************-->


	</div>
	<!--**********************************
		Main wrapper end
	***********************************-->

	<!--**********************************
		Scripts
	***********************************-->
	<!-- Required vendors -->
	<script src="{{ asset('dashboard/js/global.min.js') }}"></script>

	<script src="{{ asset('dashboard/js/jquery.nice-select.min.js') }}"></script>

	<!-- Apex Chart -->

	<script src="{{ asset('dashboard/js/apexchart.js') }}"></script>


	<!-- Chart piety plugin files -->


	<!-- Dashboard 1 -->
	<script src="{{ asset('dashboard/js/dashboard-1.js') }}"></script>

	<script src="{{ asset('dashboard/js/owl.carousel.js') }}"></script>
	<script src="{{ asset('dashboard/js/moment.js') }}"></script>
	<script src="{{ asset('dashboard/js/bootstrap-datetimepicker.min.js') }}"></script>

	<script src="{{ asset('dashboard/js/custom.min.js') }}"></script>
	<script src="{{ asset('dashboard/js/dlabnav-init.') }}"></script>
	<script src="{{ asset('dashboard/js/demo.js') }}"></script>
	<script>
		function TravlCarousel()
			{

				/*  testimonial one function by = owl.carousel.js */
				jQuery('.front-view-slider').owlCarousel({
					loop:false,
					margin:15,
					nav:true,
					autoplaySpeed: 3000,
					navSpeed: 3000,
					paginationSpeed: 3000,
					slideSpeed: 3000,
					smartSpeed: 3000,
					autoplay: false,
					animateOut: 'fadeOut',
					dots:true,
					navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
					responsive:{
						0:{
							items:1
						},

						768:{
							items:2
						},

						1400:{
							items:2
						},
						1600:{
							items:3
						},
						1750:{
							items:3
						}
					}
				})
			}

			jQuery(window).on('load',function(){
				setTimeout(function(){
					TravlCarousel();
				}, 1000);
			});
	</script>
	<script>
		$(function () {
			$('#datetimepicker').datetimepicker({
				inline: true,
			});
		});

		$(document).ready(function(){
			$(".booking-calender .fa.fa-clock-o").removeClass(this);
			$(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
		});



            // confirmation alert



$('[data-confirm]').on('click', function (e) {
    var message = $(this).data('confirm'); // Will use translated string from Blade

    if (! confirm(message)) {
        e.preventDefault();
        e.stopImmediatePropagation();
    }
});

// end confirmation alert


	</script>
    @yield('javascripts')


</body>
</html>
