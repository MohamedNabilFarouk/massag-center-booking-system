@extends('layouts.app')
@section('content')

    <!-- Content -->
    <div class="page-content">

          <!-- Banner Area -->
    <div class="aon-page-benner-area">
        <div class="aon-page-banner-row">
           <div class="aon-page-benner-overlay" ></div>
           <div class="sf-banner-heading-wrap">
             <div class="sf-banner-heading-area">
               <div class="sf-banner-heading-large">{{__('Service Detail')}}</div>
               <div class="sf-banner-breadcrumbs-nav">
                 <ul class="list-inline">
                   <li><a href="{{url('/')}}">{{__('Home')}} </a></li>
                   <li><a href="#">{{__('Service Detail')}}</a></li>
                 </ul>
               </div>
             </div>
           </div>
         </div>
       </div>
       <!-- Banner Area End -->

        <!-- SECTION CONTENT START -->
        <div class="section-full p-t120 p-b90 site-bg-white">

               <!-- PRODUCT DETAILS -->
        <div class="container woo-entry">

            <div class="row m-b30">
                <div class="col-lg-5 col-md-5  m-b30">

                    <img src="{{$service->main_image}}" alt="">

                </div>

                <div class="col-lg-7 col-md-7">
                    <div class="product-detail-info">

                        <div class="single-product-title ">
                            <h2 class="post-title"><a href="javascript:void(0);">{{$service->title}}</a></h2>
                        </div>
                        <div class="product-single-price">
                            <span class="p-single-old-price"><strong></strong></span>
                            <span class="p-single-new-price"><strong>{{$service->price}} {{__('currency')}}</strong></span>
                        </div>


                        <div class="wt-product-text">

                        <p>{!!$service->des!!}</p>


                        </div>

                        <div class="product_meta">


                        </div>

{{--
                        <form method="post" action="{{route('get.checkout',$product->id)}}" class="cart clearfix m-t30">
                            <div class="quantity btn-quantity m-b20">
                            </div>
                            <a href="{{route('get.checkout',$product->slug)}}" class="site-button m-b30">{{__('Buy Now')}}</a>
                        </form> --}}

                    </div>
                </div>
            </div>

        </div>
        <!-- CONTENT CONTENT END -->

        <!-- SECTION CONTENT START -->
        <div class="section-full p-t120 p-b90 site-bg-gray-light">
            <div class="container">
                <div class="section-content">

                    <!-- TITLE START -->
                    <div class="wt-separator-two-part">
                        <div class="row wt-separator-two-part-row">
                            <div class="col-lg-8 col-md-6 wt-separator-two-part-left">
                                <!-- TITLE START-->
                                <div class="section-head left wt-small-separator-outer">
                                    <h2>{{__('Related Packages')}}</h2>
                                </div>
                                <!-- TITLE END-->
                            </div>
                        </div>
                    </div>
                    <!-- TITLE END -->
                 <!-- Left & right section -->
      <!-- Left & right section -->
  <div class="aon-page-jobs-wrap">
    <div class="container">

        <div class="row">
            <!-- Left part start -->
            <div class="col-lg-12 col-md-12">
                <div class="row">
                  @foreach ($service->package->take(10) as $p )


                    <!-- COLUMNS 1 -->
                    <div class="col-lg-6 col-md-12">
                        <div class="aon-Grid2-box sf-shadow-box">
                            <div class="aon-Grid2-head clearfix">
                                <div class="aon-Grid2-pic">
                                    <a href="profile1.html"><img src= "{{asset('front/images/10.png')}}" alt=""></a>
                                </div>
                                <div class="aon-Grid2-info">
                                    <h5 class="aon-Grid2-name"><a href="profile1.html">{{$p->title}}</a></h5>
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





                </div>

            </div>


        </div>
    </div>
</div>
<!-- Left & right section  END -->
                </div>
            </div>
        </div>
         <!-- SECTION CONTENT END -->

        </div>
    <!-- Content END-->

@stop
