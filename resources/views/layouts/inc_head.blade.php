<div class="page-wraper">

    <!-- HEADER START -->
<header class="site-header header-style-3 mobile-sider-drawer-menu">
   <div class="sticky-header main-bar-wraper  navbar-expand-lg">
       <div class="main-bar">

           <div class="container clearfix">
               <!--Logo section start-->
               <div class="logo-header">
                   <div class="logo-header-inner logo-header-one">
                       <a href="{{url('/')}}">
                           <img class="logo-pic-one" src="{{asset('front/images/logo-light.png')}}" alt>
                           <img class="logo-pic-two" src="{{asset('front/images/logo-dark.png')}}" alt>
                       </a>
                   </div>
               </div>
               <!--Logo section End-->

               <!-- NAV Toggle Button -->
               <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggler collapsed">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar icon-bar-first"></span>
                   <span class="icon-bar icon-bar-two"></span>
                   <span class="icon-bar icon-bar-three"></span>
               </button>

               <!-- MAIN Vav -->
               <div class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-center">

                                               <ul class=" nav navbar-nav">
                       <li class="has-child current-menu-item"><a href="{{url('/')}}">{{__('Home')}}</a>

                       </li>

                       <li class="has-child"><a href="{{url('about')}}">{{__('About us')}}</a>

                       </li>

                       <li class="has-child">
                           <a href="{{url('packages')}}">{{__('Packages')}}</a>

                       </li>

                       <li class="has-child">
                           <a href="{{url('Shop')}}">{{__('Shop')}}</a>

                       </li>

                       <li class="has-child"><a href="{{url('news')}}">{{__('Blog')}}</a>

                       </li>



                       <li class="has-child"><a href="{{url('packageBooking/AllPackages')}}">{{__('Book Now')}}</a>

                       </li>

                       <li class="has-child"><a href="{{url('contact')}}">{{__('Contact')}}</a>

                       </li>

                   </ul>

               </div>

               <!-- Header Right Section-->
               <div class="extra-nav header-2-nav">
                   <div class="extra-cell">
                    @guest
                       <!--Sign up-->
                       <a href="{{route('createAccount')}}" class="site-button-link aon-btn-signup m-l20">
                           <i class="fa fa-user"></i> {{__('Sign up')}}
                       </a>
                      @endauth
                      @auth
                      <a href="{{url('/profile')}}" class="site-button-link aon-btn-signup m-l20">
                        <i class="fa fa-user"></i> {{Auth::user()->name}}
                        </a>
                      <a href="{{url('/logout')}}" class="site-button-link aon-btn-signup m-l20">
                        <img src="https://img.icons8.com/ios-glyphs/30/ffffff/logout-rounded--v1.png"/ width="25">
                        </a>
                      @endauth
                      @if(\App::getLocale() == 'en')
                       <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="site-button-link aon-btn-signup m-l20">
                           <i class="fa fa-globe"></i> AR
                       </a>
                       @else
                       <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="site-button-link aon-btn-signup m-l20">
                        <i class="fa fa-globe"></i> En
                    </a>
                    @endif

                        </div>

                   </div>

           </div>

       </div>
   </div>
</header>
<!-- HEADER END -->

