<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
  @include('admin.partials.meta')
	@include('admin.partials.css')
	@yield('styles')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">

  			<!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
  			@include('admin.partials.flash_messages')
  			@yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->


    @include('admin.partials.js')
    @yield('javascripts')
</body>
<!-- END: Body-->

</html>
