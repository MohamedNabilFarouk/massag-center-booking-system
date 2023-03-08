<!DOCTYPE html>
 {{-- @dd($home)  --}}
<html @if(App::getLocale() === 'ar')
lang="ar" dir="rtl"
@else
lang="en" dir="ltr"
@endif>
<head>
	<!-- META -->
    <meta charset="utf-8">


@yield('meta')





    <!-- FAVICONS ICON -->
	 <link rel="shortcut icon" href="{{asset('front/images/favicon.png')}}">

    <!-- PAGE TITLE HERE -->
    <title>MASSAGE MAJED</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- BOOTSTRAP STYLE SHEET -->
    @if(App::getLocale()=== 'en')
        <link rel="stylesheet" id="Style0-css" href="{{asset('front/css/Style0.css')}}" type="text/css" media="all">
        @else
        <link rel="stylesheet" id="Style0-css" href="{{asset('front/css/Style0.css')}}" type="text/css" media="all">

        <link rel="stylesheet"  href="{{asset('front/css/Style-rtl.css')}}" type="text/css" media="all">
    @endif
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>
	<!-- FONTAWESOME STYLE SHEET -->

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> --}}
{{-- share link --}}
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=632980d20b5e930012a9c6da&product=inline-share-buttons" async="async"></script>

{{-- end share link --}}
</head>

<body>

<!-- LOADING AREA START ===== -->
<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
        <div class="cssload-wrap">
            <div class="cssload-container">
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
        </div>
        </div>
    </div>
</div>
<!-- LOADING AREA  END ====== -->

@include('layouts.inc_head')

@yield('content')
@include('layouts.inc_footer')

</body>
</html>
















