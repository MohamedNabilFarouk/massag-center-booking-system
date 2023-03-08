@extends('layouts.app')
@section('content')
<style>
 @media (min-width: 300px) {
      #left {
        display: none !important;
      }
    }
    @media (min-width: 992px) {
        #left {
          display: block !important;
        }
      }
    </style>
<div class="page-wraper">


  <!-- CONTENT START -->
  <div class="page-content">


      <!-- Search Bar Home START -->
      <div class="aon-login-wrap d-flex">
           <div class="aon-login-left "   id='left'>
               <div class="aon-login-heading">
                   <div class="aon-login-text mt-5">
                     {{__('Your Trust is Our Greatest Incentive !')}}
                   </div>
                   <div class="aon-login-pic ">
                       <img src="{{asset('front/images/banner2/doctor.png')}}" alt=""/>
                   </div>
               </div>
          </div>
           <div class="aon-login-right d-flex flex-wrap align-items-center">
               <div class="aon-login-area">
               {{-- <div class="col-md-12">
                   <div class="site-logo login-sign-logo">
                       <a href="index.html"><img src="{{asset('front/images/logo-dark1.png')}}" alt=""/></a>
                   </div>
               </div> --}}

               <div class="col-md-12">

                   <div class="login-sign-head">
                       <strong>{{__('Welcome Back')}}</strong>
                       <span>{{__('login_subtitle')}}</span>
                   </div>
               </div>
               @include('admin.includes.messages')
              <ul class="nav nav-pills mb-3 aon-custom-nav aon-login-sign-tabs calen-list-nav m-b30" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                      <div class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-one" role="tab" aria-selected="true">{{__('LOG IN')}}</div>
                  </li>
                  <li class="nav-item" role="presentation">
                      <div class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-two" role="tab" aria-selected="false">{{__('REGISTRATION')}}</div>
                  </li>
              </ul>
              <div class="tab-content" >
                  <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-home-tab">
                      <form class="aon-login-form" action="{{route('do.login')}}" method='post'>
                        @csrf
                       <div class="row">
                           <div class="col-md-12">
                               <div class="form-group">
                                  <label>{{__('Phone')}}</label>
                                  <div class="aon-inputicon-box">
                                      {{-- <input class="form-control sf-form-control" name="email"   required> --}}
                                <input id="identify" type="text" class="form-control @error('identify') is-invalid @enderror" name="identify" value="{{ old('identify') }}" required autocomplete="identify" autofocus>

                                      <i class="aon-input-icon fa fa-phone"></i>
                                  </div>
                               </div>
                           </div>
                           <div class="col-md-12">
                               <div class="form-group">
                                  <label>{{__('Password')}}</label>
                                  <div class="aon-inputicon-box">
                                      <input class="form-control sf-form-control" name="password" type="password" required>
                                      <i class="aon-input-icon fa fa-lock"></i>
                                  </div>
                               </div>
                           </div>
                           {{-- <div class="col-md-12">
                              <div class="form-group d-flex aon-login-option justify-content-between">
                                  <div class="aon-login-opleft">
                                       <div class="checkbox sf-radio-checkbox">
                                          <input id="td2_2" name="abc" value="five" type="checkbox">
                                          <label for="td2_2">تذكرنى</label>
                                      </div>
                                  </div>
                                  <div class="aon-login-opright">
                                      <a href="#">نسيت كلمة المرور</a>
                                  </div>
                              </div>
                           </div> --}}
                           <div class="col-md-12">
                              <button type="submit" class="site-button w-100">{{__('Submit')}} <i class="feather-arrow-right"></i> </button>
                           </div>
                       </div>
                   </form>
                  </div>
                  <div class="tab-pane fade" id="pills-two" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <form class="aon-login-form" action="{{route('register')}}" method='post'>
                        @csrf
                           <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label >{{__('Name')}}</label>
                                      <div class="aon-inputicon-box">
                                          <input class="form-control sf-form-control" name="name" type="text" placeholder="{{__('Name')}}" required>
                                          <i class="aon-input-icon fa fa-user"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label >{{__('Email ')}}</label>
                                      <div class="aon-inputicon-box">
                                          <input class="form-control sf-form-control" name="email" type="email" placeholder="{{__('Email ')}}" >
                                          <i class="aon-input-icon fa fa-user"></i>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label >{{__('Phone')}}</label>
                                      <div class="aon-inputicon-box">
                                          <input class="form-control sf-form-control" name="phone" type="number" placeholder="{{__('Phone')}}" required>
                                          <i class="aon-input-icon fa fa-phone"></i>
                                      </div>
                                  </div>
                              </div>



                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label >{{__('Password')}}</label>
                                      <div class="aon-inputicon-box">
                                          <input class="form-control sf-form-control" name="password" type="password" placeholder="{{__('Password')}}" required>
                                          <i class="aon-input-icon fa fa-lock"></i>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label >{{__('Confirm Password')}}</label>
                                      <div class="aon-inputicon-box">
                                          <input class="form-control sf-form-control" name="password_confirmation" type="password" placeholder="{{__('Confirm Password')}}" required>
                                          <i class="aon-input-icon fa fa-lock"></i>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-12">
                                  <div class="form-group sign-term-con">
                                      <div class="checkbox sf-radio-checkbox">
                                          <input id="td33" name="abc" value="five" type="checkbox" required>
                                          <label style="margin-right:20px" for="td33">{{__("I've read and agree with your")}} <a href="#">{{__('Privacy Policy')}}</a> & <a href="#">{{__('Terms & Conditions')}}</a> </label>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-12">
                                  <button type="submit" class="site-button w-100">{{__('Submit')}} <i class="feather-arrow-right"></i> </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              </div>

           </div>
      </div>
      <!-- Search Bar Home END -->


  </div>
  <!-- CONTENT END -->


</div>
@stop
