@extends('layouts.app')
@section('meta')
<meta name="description" content="{{$home['meta_description']}}">
<meta name="keywords" content="{{$home['meta_keywords']}}">
<meta name="author" content="{{config('app.name')}}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="language" content="English">

<!-- Social meta -->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="{{config('app.name')}} - @if(App::getLocale() === 'en') {{$home['title']}} @else {{$home['title_ar']}}  @endif"/>
<meta property="og:url" content="{{url()->current()}}"/>
<meta property="og:site_name" content="{{config('app.name')}}"/>
<meta property="og:description" content="{{$home['meta_description']}}" />
@stop
@section('content')

     <!-- CONTENT START -->
	 <div class="page-content">

        <!-- BANNER SECTION START -->
        <section class="aon-banner2-wrap">
@include('admin.includes.messages')

            <div class="aon-banner2-row">
                <div class="container">
                    <div class="row">
                        <!--Left Section-->
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="aon-banner2-left">
                                <h2 class="aon-banner2-heading">@if(App::getLocale() == 'en'){!!$site_settings->home_text!!} @else {!!$site_settings->home_text_ar!!}@endif </h2>
								<h5 class="aon-banner2-heading1">@if(App::getLocale() == 'en'){!!$site_settings->home_subtext!!}@else {!!$site_settings->home_subtext_ar!!} @endif </h5>
                            </div>
                        </div>
                        <!--Right Section-->


                    </div>
                </div>
            </div>
        </section>
        <!-- BANNER SECTION END -->
        @if(App::getLocale()=='en')
        <!-- About Massage Section -->
        <section class="aon-med-how-work">
            <div class="container-fluid g-0">

                <div class="row g-0">
                    <div class="col-lg-6 col-md-12 d-flex flex-wrap">
                        <div class="aon-how-work-left d-flex flex-wrap justify-content-end w-100">
                            <div class="aon-howLeft-col">
                                <h2 class="aon-howLeft-title mb-4">Professional hands restore your balance</h2>
                                <div class="aon-howLeft-text">Our insistence on providing a high level of service .. makes us always the best</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 d-flex flex-wrap">
                         <div class="aon-how-work-right d-flex flex-wrap justify-content-start w-100">
                             <div class="aon-howRight-col">
                                <div class="section-head mb-5">
                                    <span class="aon-sub-title">Working</span>
                                    <h2 class="aon-title">How To Book a Package</h2>
                                </div>
                                <ul class="list-unstyled m-0">
                                    <li class="mb-4">
                                        <div class="aon-hwork-list d-flex">
                                            <div class="aon-hwork-list-icon">
                                                <img src="{{asset('uploads/services/11.png')}}" alt>
                                            </div>
                                            <div class="aon-hwork-list-text">
                                                <h4>Choose Your Package</h4>
                                                <p>From Book Now link or from packages</p>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="mb-4">
                                        <div class="aon-hwork-list d-flex">
                                            <div class="aon-hwork-list-icon">
                                                <img src="{{asset('front/images/2.png')}}" alt>
                                            </div>
                                            <div class="aon-hwork-list-text">
                                                <h4>Choose professional By Name</h4>
                                                <p>Choose profissional and select prefered Date then select available Time According to Profissional Availability </p>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="mb-4">
                                        <div class="aon-hwork-list d-flex">
                                            <div class="aon-hwork-list-icon">
                                                <img src="{{asset('front/images/2.png')}}" alt>
                                            </div>
                                            <div class="aon-hwork-list-text">
                                                <h4>Complete the important informaTion</h4>
                                                <p>fill your important information to get very profissional session</p>
                                            </div>
                                          </div>
                                    </li>
                                    {{-- <li class="mb-0">
                                        <div class="aon-hwork-list d-flex">
                                            <div class="aon-hwork-list-icon">
                                                <img src="{{asset('front/images/3_1.png')}}" alt>
                                            </div>
                                            <div class="aon-hwork-list-text">
                                                <h4>The massage process</h4>
                                                <p>The massage process is carried out according to the highest levels of professionalism and scientific methods - in which we follow all massage equations and theories of prevention and treatment.</p>
                                            </div>
                                          </div>
                                    </li> --}}
                                </ul>
                             </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- About Doctor Section END -->
          @else

                  <!-- About Massage Section -->
        <section class="aon-med-how-work">
            <div class="container-fluid g-0">

                <div class="row g-0">
                    <div class="col-lg-6 col-md-12 d-flex flex-wrap">
                        <div class="aon-how-work-left d-flex flex-wrap justify-content-end w-100">
                            <div class="aon-howLeft-col">
                                <h2 class="aon-howLeft-title mb-4">أيادي محترفة تعيد إحياء توازنك</h2>
                                <div class="aon-howLeft-text">	اصرارنا على تقديم مستوى عالي في الخدمة .. يجعلنا دوماً الأفضل
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 d-flex flex-wrap">
                         <div class="aon-how-work-right d-flex flex-wrap justify-content-start w-100">
                             <div class="aon-howRight-col">
                                <div class="section-head mb-5">
                                    {{-- <p class="aon-sub-title">كيفية العمل </p> --}}
                                    <h2 class="aon-title">خطوات الحجز في مساج ماجد</h2>
                                </div>
                                <ul class="list-unstyled m-0">
                                    <li class="mb-4">
                                        <div class="aon-hwork-list d-flex">
                                            <div class="aon-hwork-list-icon">
                                                <img src="{{asset('uploads/services/11.png')}}" alt>
                                            </div>
                                            <div class="aon-hwork-list-text">
                                                <h4>اختر الباقة</h4>
                                                <p>من رابط الحجز الآن أو من الباقات
                                                </p>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="mb-4">
                                        <div class="aon-hwork-list d-flex">
                                            <div class="aon-hwork-list-icon">
                                                <img src="{{asset('front/images/2.png')}}" alt>
                                            </div>
                                            <div class="aon-hwork-list-text">
                                                <h4>اختر المدرب بالاسم</h4>
                                                <p>اختر المدرب وحدد التاريخ المفضل ثم حدد الوقت المتاح حسب التوفر للمدرب</p>
                                            </div>
                                          </div>
                                    </li>
                                    <li class="mb-0">
                                        <div class="aon-hwork-list d-flex">
                                            <div class="aon-hwork-list-icon">
                                                <img src="{{asset('front/images/3_1.png')}}" alt>
                                            </div>
                                            <div class="aon-hwork-list-text">
                                                <h4>أكمل المعلومات المهمة</h4>
                                                <p>	املأ معلوماتك المهمة للحصول على جلسة احترافية للغاية</p>
                                            </div>
                                          </div>
                                    </li>
                                </ul>
                             </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- About Doctor Section END -->

          @endif

        <!-- Service Categories Section -->
		<div class="paddingarea"></div><div class="paddingarea"></div>

        <section class="aon-med-srv-cat-area bg-white">
            <div class="container">

                <!--Title Section Start-->
            	<div class="section-head center">
                    <span class="aon-sub-title">{{__('Services')}}</span>
                    <h2 class="aon-title">{{__('Say goodbye to your stress')}}</h2>
                    <p>{{__('All your tension from life pressure ends with our luxurious massage packages which ensure the elimination of stress and the provision of powerful renewable energy to your body')}}</p>
                </div>
                <!--Title Section End-->

                <div class="section-content">
                    <div class="aon-med-srv-cat-section">
                       <ul class="justify-content-center">
                        @foreach($services as $s)
                           <li>
                               <!--one-->
                               <div class="aon-med-sevices-cat aon-icon-effect">
                                   <div class="media">
                                       <span class="aon-icon">
                                        <a href="{{route('get.service.details',$s->id)}}">
                                               <img src="{{$s->main_image}}" alt="{{$s->title}}">
                                        </a>
                                       </span>
                                   </div>
                                   <div class="aon-med-serices-cat-info">
                                       <h4><a href="{{route('get.service.details',$s->id)}}"> {{$s->title}}</a></h4>
                                   </div>
                               </div>
                           </li>
                  @endforeach











                       </ul>
                    </div>
                    <div class="aon-addmore-btn-section">
                        <a href="javascripr:;" class="aon-addplus"><i class="feather-plus"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Service Categories END -->


 @if(App::getLocale()=='en')
        <!-- Appointment Section -->
			<div class="paddingarea"></div><div class="paddingarea"></div>
        <section class="aon-med-appoint-area2">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="media">
                            <img src="{{asset('front/images/large-pic3.png')}}" alt>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <!--Title Section Start-->
                        <div class="aon-med-appoint-area2-content">
                            <div class="section-head white">
                                <span class="aon-sub-title">Registraton</span>
                                <h2 class="aon-title">Want to Make an Appointment Easily?</h2>
                                <p>Regain your health and mobility. Leave your pain behind. Do the things you love.
                                    Our team of health professionals is dedicated to providing you with the best medical solutions for your injury or condition. Our specialists collaborate to find pain treatments.</p>
                                <a href="{{route('package.getAllPackageBooking')}}" class="site-button">Book Now</a>
                            </div>
                        </div>
                        <!--Title Section End-->
                    </div>
                </div>


                <div class="section-content">



                </div>

            </div>
        </section>
        <!-- Appointment Section END -->

         <!-- We are Building  Section -->
         <section class="aon-med-future-area bg-white">
            <div class="container">
                <div class="section-content">
                    <div class="aon-med-future-section">
                        <div class="row ">

                            <div class="col-lg-6 col-md-12">
                                <div class="section-head left">
                                    <span class="aon-sub-title">Building</span>
                                    <h2 class="aon-title">We are Building Sustainable Future.</h2>
                                    <ul class="list-check-style2">
										 <li>
                                            <i class="feather-check"></i>
                                            <h3 class="list-title">Say goodbye to your stress</h3>
                                            <p>All your tension from life pressure ends with our luxurious massage packages which ensure the elimination of stress and the provision of powerful renewable energy to your body</p>
                                        </li>
                                        <li>
                                            <i class="feather-check"></i>
                                            <h3 class="list-title">Healthy Shine</h3>
                                            <p>When exhaustion overwhelm you and form dark spots covering your body & soul Get rid of them now with packages that trigger your troubles and perfect your relaxation  </p>
                                        </li>
                                        <li>
                                            <i class="feather-check"></i>
                                            <h3 class="list-title">Recovery Map</h3>
                                            <p>A package for ultimate body recovery through exposing your body to hot steam & Deducting your body pain through your foot</p>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="aone-med-future-r-section">
                                    <ul>
                                        <li class="animate-v2">
                                            <div class="aone-med-future-l-inner shine-hover">
                                                <div class="aone-med-future-content">
                                                    <span><img src="{{asset('front/images/icon1_1.png')}}" alt></span>
                                                    <h3>Prove you the experience</h3>
                                                    <p> with live footage Happily, answer all your questions & concerns</p>
                                                </div>
                                                <div class="media shine-box">
                                                    <img src="{{asset('front/images/1.jpg')}}" alt>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="animate-v3">
                                            <div class="aone-med-future-r-inner shine-hover">
                                                <div class="media shine-box">
                                                    <img src="{{asset('front/images/2.jpg')}}" alt>
                                                </div>
                                                <div class="aone-med-future-content">
                                                    <span><img src="{{asset('front/images/icon2_1.png')}}" alt></span>
                                                    <h3>You are in safe hands</h3>
                                                    <p>We Provide you with general awareness about the significance of Massage  </p>
                                                </div>

                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- We are Building Section End-->
@else
 <!-- Appointment Section -->
 <div class="paddingarea"></div><div class="paddingarea"></div>
 <section class="aon-med-appoint-area2">
     <div class="container">
         <div class="row">
             <div class="col-md-5">
                 <div class="media">
                     <img src="{{asset('front/images/large-pic3.png')}}" alt>
                 </div>
             </div>
             <div class="col-md-7">
                 <!--Title Section Start-->
                 <div class="aon-med-appoint-area2-content">
                     <div class="section-head white">
                         <span class="aon-sub-title">التسجيل</span>
                         <h2 class="aon-title">هل تريد تحديد موعد بسهولة ؟</h2>
                         <p>استعد صحتك وحركتك. اترك الألم وراءك. افعل الأشياء التي تحبها.
                             يتعاون المتخصصون لدينا لإيجاد علاجات للألم.</p>
                         <a href="{{route('package.getAllPackageBooking')}}" class="site-button">أحجز الأن</a>
                     </div>
                 </div>
                 <!--Title Section End-->
             </div>
         </div>


         <div class="section-content">



         </div>

     </div>
 </section>
 <!-- Appointment Section END -->


  <!-- We are Building  Section -->
  <section class="aon-med-future-area bg-white">
    <div class="container">
        <div class="section-content">
            <div class="aon-med-future-section">
                <div class="row ">

                    <div class="col-lg-6 col-md-12">
                        <div class="section-head left">
                            <span class="aon-sub-title">عن مساج ماجد</span>
                            <h2 class="aon-title">نحن نبني مستقبل مستدام.</h2>
                            <ul class="list-check-style2">
                                 <li>
                                    <i class="feather-check"></i>
                                    <h3 class="list-title">قل وداعا لضغطك</h3>
                                    <p>ينتهي كل التوتر الناتج عن ضغط الحياة مع باقات التدليك الفاخرة التي تضمن التخلص من التوتر وتوفير طاقة متجددة قوية لجسمك</p>
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    <h3 class="list-title">إشراق صحي</h3>
                                    <p>عندما يربكك الإرهاق ويشكل بقعًا داكنة تغطي جسدك وروحك ، تخلص منها الآن بحزم تثير مشاكلك وتساعد على الاسترخاء.  </p>
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    <h3 class="list-title">خريطة تعافيك</h3>
                                    <p>حزمة للتعافي النهائي للجسم من خلال تعريض جسمك للبخار الساخن والتخلص من آلام جسمك من خلال قدمك</p>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="aone-med-future-r-section">
                            <ul>
                                <li class="animate-v2">
                                    <div class="aone-med-future-l-inner shine-hover">
                                        <div class="aone-med-future-content">
                                            <span><img src="{{asset('front/images/icon1_1.png')}}" alt></span>
                                            <h3>تثبت لك التجربة</h3>
                                            <p> مع لقطات حية لحسن الحظ ، أجب على جميع أسئلتك ومخاوفك</p>
                                        </div>
                                        <div class="media shine-box">
                                            <img src="{{asset('front/images/1.jpg')}}" alt>
                                        </div>
                                    </div>
                                </li>
                                <li class="animate-v3">
                                    <div class="aone-med-future-r-inner shine-hover">
                                        <div class="media shine-box">
                                            <img src="{{asset('front/images/2.jpg')}}" alt>
                                        </div>
                                        <div class="aone-med-future-content">
                                            <span><img src="{{asset('front/images/icon2_1.png')}}" alt></span>
                                            <h3>أنت في أيد أمينة</h3>
                                            <p>نوفر لك الوعي العام بأهمية التدليك </p>
                                        </div>

                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- We are Building Section End-->
@endif



         <!-- Pricing Section -->
        <section class="aon-med-price1-area bg-white">
            <div class="container">

                <!--Title Section Start-->
            	<div class="section-head center">
                    <span class="aon-sub-title">{{__('Pricing')}}</span>
                    <h2 class="aon-title">{{__('Our Pricing Plan')}}</h2>

                </div>
                <!--Title Section End-->

                <div class="section-content">
                    <div class="aon-med-team-section">
                        <div class="row justify-content-center">
                            @foreach($plan as $index => $p)
                            <div class="col-lg-4 col-md-6">
                                <div class="aon-price1-box  @if($index == 1) active-plan @endif">

                                    <div class="aon-price1-num"><sub>{{__('currency')}}</sub>{{$p->price}}</div>
                                    <div class="aon-price1-time">{{$p->title}}</div>
                                    <ul class="aon-price1-list list-unstyled">

                                        @php
                                        $str=str_replace("</p>\r\n","\n",$p->des);
                                        // dd($str);
                                        @endphp



                                        <li> {!! $str !!} </li>

                                    </ul>
                                    <a href='{{route("package.getPackageBooking" ,$p->id)}}' class="site-button aon-price1-btn">{{__('Book Now')}}</a>

                                </div>
                            </div>
                          @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Pricing Section END -->

        <!-- Product Section -->
		<div class="aon-med-shop-area">
			<div class="container">
				<!--Title Section Start-->
                <div class="section-head center">
                    <span class="aon-sub-title">{{__('Shop')}}</span>
                    <h2 class="aon-title">{{__('Our Products')}}</h2>

                </div>
                <!--Title Section End-->


				<div class="section-content">
                    <div class="owl-carousel shop-style1-slider aon-owl-arrow">

        @foreach ($products as $p )

                        <!--block 4-->
                        <div class="item">
                            <div class="ser-shop-style1-box  ser-shine-hover animate" data-animate="zoomIn" data-duration="1.0s" data-delay="0.1s" data-offset="100">
                                <div class="ser-shop-media">
                                    <a href="{{route('get.product.details',$p->slug)}}"><img src="{{$p->main_image}}" alt='{{$p->title}}'></a>
                                    {{-- <span class="bedge">New</span> --}}
                                    {{-- <ul class="shop-item-controls">
                                        <li><a href="javascript:;"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul> --}}
                                </div>
                                <div class="ser-shop-info">
                                    <h4 class="ser-shop-title"><a href="#">{{$p->title}}</a></h4>
                                    <div class="ser-pro-item-price">
                                        <strong>{{$p->price}} {{__('currency')}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
				</div>

			</div>
		</div>
		<!-- Product Section END -->

        <!-- Testimonial Section -->
		<div class="aon-med-testimonial2-area">
			<div class="container">
				<!--Title Section Start-->
                <div class="section-head center">
                    <span class="aon-sub-title">{{__('Testimonials')}}</span>
                    <h2 class="aon-title">{{__('What People Say')}}</h2>
                </div>
                <!--Title Section End-->

{{--
				<div class="section-content">
                    <div class="aon-testimonial2-contaent-wrap">


                        <div class="aon-med-testimonial2-left">
                            <div class="owl-carousel aon-med-testimonial aon-owl-arrow left">
@foreach ($reviews as $r )


                                <!-- COLUMNS 1 -->
                                <div class="item">

                                    <div class="aon-med-testimonial-2">
                                        <div class="aon-df-rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <div class="aon-testimonial-quote"><i class="fa fa-quote-left"></i></div>
                                        <p>{{$r->comment}}</p>

                                        <div class="aon-testimonial-name">{{$r->user->name}}</div>
                                        <div class="aon-testimonial-position">{{__('Client')}}</div>
                                    </div>

                                </div>
                            @endforeach


                            </div>
                        </div>

                        <div class="aon-med-testimonial2-right">
                            <div class="aon-large-circle-wrap">
                                <div class="media">
                                    <img src="{{asset('front/images/large-pic.jpg')}}" alt>
                                </div>
                                <span class="ring1 animate-v2"><img src="{{asset('front/images/r-img3.png')}}" alt></span>
                                <span class="ring2 animate-v3"><img src="{{asset('front/images/r-img2.png')}}" alt></span>
                                <span class="ring3 animate-v2"><img src="{{asset('front/images/r-img1.png')}}" alt></span>
                                <span class="ring4 animate-v3"><img src="{{asset('front/images/large-pic3.jpg')}}" alt></span>
                                <span class="ring5 animate-v2"><img src="{{asset('front/images/large-pic2.jpg')}}" alt></span>
                                <span class="ring6 animate-v3"></span>
                                <span class="ring7 animate-v2"></span>
                                <span class="ring8 animate-v3"></span>
                            </div>
                        </div>

                    </div>

				</div> --}}


                <div class="section-head center">
                    <a href="{{$social_settings['4']->value}}" target="_blank"><img src="{{asset('images/google.png')}}" width="400px" height="277px" alt=""></a>
                </div>




			</div>
		</div>
		<!-- Testimonial Section END -->

         <!-- Find Doctor Section -->
        <section class="aon-med-srv-cat-area  bg-light-gray">





                       <div class="sf-map-wrap grayscle-area">
                        {!! $site_settings->map !!}
                       {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d43437.34132917009!2d46.68427268797679!3d24.731411644299357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f02c8793f9459%3A0xed13218a67f87b84!2sAlkhaimah%20Theme%20Park!5e0!3m2!1sen!2seg!4v1663679002627!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                    </div>

        </section>
        <!-- Find Doctor END -->




        </div>
        <!-- CONTENT END -->








@stop
