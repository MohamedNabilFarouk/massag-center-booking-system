
 @extends('layouts.app')
 @section('meta')
<meta name="description" content="{{$packages['meta_description']}}">
<meta name="keywords" content="{{$packages['meta_keywords']}}">
<meta name="author" content="{{config('app.name')}}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="language" content="English">

<!-- Social meta -->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="{{config('app.name')}} - @if(App::getLocale() === 'en') {{$packages['title']}} @else {{$packages['title_ar']}}  @endif"/>
<meta property="og:url" content="{{url()->current()}}"/>
<meta property="og:site_name" content="{{config('app.name')}}"/>
<meta property="og:description" content="{{$packages['meta_description']}}" />
@stop
 @section('content')

 <!-- Content -->
 <div class="page-content">


    <!--Banner-->
  <div class="aon-page-benner-area">
    <div class="aon-page-banner-row">
      <div class="aon-page-benner-overlay" ></div>
      <div class="sf-banner-heading-wrap">
        <div class="sf-banner-heading-area">
          <div class="sf-banner-heading-large">{{__('Book An Appointment')}}</div>
          <div class="sf-banner-breadcrumbs-nav">
            <ul class="list-inline">
              <li><a href="{{url('/')}}"> {{__('Home')}} </a></li>
              <li><a href="#">{{__('Book An Appointment')}}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Banner-->

   <!-- Search info -->
  <div class="aon-search-info-wrap">
    <div class="container">
       <h3 class="aon-searchInfo-title">{{__('Book An Appointment From Our Special Package')}}</h3>
       <div class="aon-searchInfo-text"><i class="fa fa-check"></i> {{__("Book appointments with minimum wait-time")}} </div>
    </div>
  </div>
  <!-- Search info End -->

  <!-- Left & right section -->
  <div class="aon-page-jobs-wrap">
      <div class="container">

          <div class="row">
              <!-- Left part start -->
              <div class="col-lg-12 col-md-12">
                  <div class="row">
                    @foreach ($Packages as $p )


                      <!-- COLUMNS 1 -->
                      <div class="col-lg-6 col-md-12">
                          <div class="aon-Grid2-box sf-shadow-box">
                              <div class="aon-Grid2-head clearfix">
                                  <div class="aon-Grid2-pic">
                                      <a href="#"><img src= "{{asset('front/images/10.png')}}" alt=""></a>
                                  </div>
                                  <div class="aon-Grid2-info">
                                      <h5 class="aon-Grid2-name"><a href="#">{{$p->title}}</a></h5>
                                      <div class="aon-Grid2-exper">{{$p->duration}} {{__('Minutes')}} </div>

                                  </div>
                              </div>

                              <div class="aon-Grid2body">
                                  <div class="aon-Grid2-details">
                                    @php
                                    $str=str_replace("</p>\r\n","\n <i class='feather-clock'></i>",$p->des);
                                    // dd($str);
                                    @endphp
                                        {!! $str !!}
                              </div>
                              </div>

                              <div class="aon-Grid2-footer sf-shadow-box">


                                <a href="{{route('package.getPackageBooking', $p->slug)}}" class="aon-Grid2-book-now">{{__('Book An Appointment Now')}}</a>
                              </div>
                          </div>
                      </div>
                      @endforeach



                      <div class="site-pagination s-p-center">
                          <ul class="pagination">
                            {{ $Packages->links('pagination::bootstrap-4') }}
                          </ul>
                      </div>

                  </div>

              </div>


          </div>
      </div>
  </div>
  <!-- Left & right section  END -->

</div>
<!-- Content END-->
@stop
