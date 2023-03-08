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
                <li><a href="https://aonetheme.com/latest-service-finder/">{{__('Home')}} </a></li>
                <li><a href="https://aonetheme.com/latest-service-finder/providers-category/packers-and-movers/">{{__('Service Detail')}}</a></li>
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


            {{-- <!-- Detail SECTION START -->
            <div class="product-detail-full m-b30">

                <div class="accordion accordion-cutom" id="aon-app-accordion">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Description
                            </button>
                          </h2>
                          <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#aon-app-accordion">
                            <div class="accordion-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sagittis orci ac odio dictum tincidunt. Donec ut metus leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed luctus, dui eu sagittis sodales, nulla nibh sagittis augue, vel porttitor diam enim non metus. Vestibulum aliquam augue neque. Phasellus tincidunt odio eget ullamcorper efficitur. Cras placerat ut turpis pellentesque vulputate. Nam sed consequat tortor. Curabitur finibus sapien dolor. Ut eleifend tellus nec erat pulvinar dignissim. Nam non arcu purus. Vivamus et massa massa.</p>
                            </div>
                          </div>
                        </div>

                    </div>

            </div>
            <!-- Detail SECTION END --> --}}

        </div>
        <!-- PRODUCT DETAILS -->

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
                                <h2>{{__('Related Services')}}</h2>
                            </div>
                            <!-- TITLE END-->
                        </div>
                    </div>
                </div>
                <!-- TITLE END -->

                <div class="featured-products">

                    <div class="row">
                        @foreach ($related as $r )

                        <!-- COLUMNS 1 -->
                        <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                            <div class="ser-shop-style1-box ser-shine-hoverne-hover animate" data-animate="zoomIn" data-duration="1.0s" data-delay="0.1s" data-offset="100">
                                <div class="ser-shop-media">
                                    <a href="{{route('get.service.details',$r->id)}}"><img src="{{$r->main_image}}" alt="{{$r->title}}" style='width: 50%;'></a>
                                    {{-- <span class="bedge">New</span> --}}
                                    {{-- <ul class="shop-item-controls">
                                        <li><a href="javascript:;"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul> --}}
                                </div>
                                <div class="ser-shop-info">
                                    <h4 class="ser-shop-title"><a href="{{route('get.service.details',$r->id)}}">{{$r->title}}</a></h4>
                                    <div class="ser-pro-item-price">
                                        <strong>{{$r->price}} {{__('currency')}}</strong>
                                        {{-- <span>289.00</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                      @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
     <!-- SECTION CONTENT END -->

    </div>
<!-- Content END-->






@stop
