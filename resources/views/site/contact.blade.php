
@extends('layouts.app')
@section('meta')
<meta name="description" content="{{$contact['meta_description']}}">
<meta name="keywords" content="{{$contact['meta_keywords']}}">
<meta name="author" content="{{config('app.name')}}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="language" content="English">

<!-- Social meta -->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="{{config('app.name')}} - @if(App::getLocale() === 'en') {{$contact['title']}} @else {{$contact['title_ar']}}  @endif"/>
<meta property="og:url" content="{{url()->current()}}"/>
<meta property="og:site_name" content="{{config('app.name')}}"/>
<meta property="og:description" content="{{$contact['meta_description']}}" />
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
            <div class="sf-banner-heading-large">{{__("Contact Us")}}</div>
            <div class="sf-banner-breadcrumbs-nav">
              <ul class="list-inline">
                <li><a href="{{url('/')}}"> {{__("Home")}} </a></li>
                <li><a href="{{url('contact')}}">{{__("Contact")}}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Banner-->

    <!-- Contact Us-->
    <div class="aon-contact2-area p-t80 p-b50">
      <div class="container">

        <div class="section-content">

            <div class="row">
                <!--Left Section-->
                <div class="col-lg-6 aon-contact-media">

                    <div class="aon-contact-1-pic">
                        <img src="{{asset('front/images/contact-pic1.png')}}" alt="">
                    </div>
                    <div class="aon-contact-1-bg">

                    </div>

                </div>
                <!--Right Section-->
                <div class="col-lg-6">
                    <div class="aon-contact-1-info-wrap">

                        <div class="sf-contact-1-info-box">
                            <div class="sf-contact-1-icon">
                                <span><img src="{{asset('front/images/contact-us/1.png')}}" alt=""></span>
                            </div>
                            <div class="sf-contact-1-info">
                                <h4 class="sf-title">{{__('Address')}}</h4>
                                <p>@if(App::getLocale() == 'en'){{$site_settings->address_en}} @else {{$site_settings->address_ar}} @endif</p>
                            </div>
                        </div>

                        <div class="sf-contact-1-info-box">
                            <div class="sf-contact-1-icon">
                                <span><img src="{{asset('front/images/contact-us/2.png')}}" alt=""></span>
                            </div>
                            <div class="sf-contact-1-info">
                                <h4 class="sf-title">{{__('Email')}}</h4>
                                <p>{{$site_settings->email}} </p>
                            </div>
                        </div>

                        <div class="sf-contact-1-info-box">
                            <div class="sf-contact-1-icon">
                                <span><img src="{{asset('front/images/contact-us/3.png')}}" alt=""></span>
                            </div>
                            <div class="sf-contact-1-info">
                                <h4 class="sf-title">{{__("Phone Number")}}</h4>
                                <p>{{$site_settings->phone}}</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

      </div>
    </div>

    <!-- Contact Us-->
    <div class="section-full p-t150">
        <div class="container">

            <div class="sf-contact-form2-wrap">
                <div class="sf-con-form-title text-center">
                    <h2 class="m-b30">{{__("Contact Information")}}</h2>
                </div>
                <!--Contact Form-->
                <div class="sf-contact-form2 shadow">
                    <form action="{{route('send.contact')}}"   method="post">
                        @csrf
                        <div class="row">

                            <!-- COLUMNS 1 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="{{__('Name')}}" class="form-control" required>
                                </div>
                            </div>

                            <!-- COLUMNS 2 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="{{__('Email ')}}" class="form-control" required>
                                </div>
                            </div>
                            <!-- COLUMNS 3 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone_number" placeholder="{{__('Phone')}}" class="form-control">
                                </div>
                            </div>
                            <!-- COLUMNS 4 -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="subject" placeholder="{{__('subject')}}" class="form-control" required>
                                </div>
                            </div>

                            <!-- COLUMNS 5 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" placeholder="{{__('Message')}}" class="form-control" rows="4" required></textarea>
                                </div>
                            </div>

                            {{-- <div class="col-md-12">

                                <div class="g-recaptcha" data-sitekey="6LfcCr0eAAAAAN2P-3cJJC1StgxbUWvwELbMVjnp"></div>

                            </div> --}}

                        </div>
                        <div class="sf-contact-submit-btn text-center">
                            <button class="site-button" type="submit">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
                <!--Contact Form End-->
            </div>

        </div>
        <div class="sf-map-wrap grayscle-area">
    {!! $site_settings->map !!}
        </div>
      </div>

    </div>
<!-- Content END-->



@stop
