@extends('layouts.app')

@section('content')

 <div class="container">

    <div class="panel-group">
    <div class="panel panel-primary">
      <form  action='{{route("add.order")}}' method='POST'>
@csrf
            <!-- From Three-->
            <fieldset id="contact">
             <div class="panel-body">

                <!-- Search Bar Home START -->
                <div class="aon-booking-wrap d-flex align-items-center justify-content-center">
                  <div class="aon-booking-form aon-booking-area">
                      <div class="row">

                            <div class="col-md-12">
                                <div class="aon-form-logo"><img src="images/logo-dark.png" alt=""/></div>
                            </div>
                            <div class="col-md-12">
                            @include('admin.includes.messages')

                                <div class="aon-form-top d-flex justify-content-between align-items-center">
                                    <div class="aon-form-top-left d-flex">
                                        <div class="aon-form-doc-pic">
                                            <img src="images/team/pic1.jpg" alt=""/>
                                        </div>
                                        <div class="aon-form-doc-info">
                                            <strong>{{$product->price}}  {{__('currency')}}</strong>
                                            <span>{{$product->title}}</span>
                                            <input class="form-control sf-form-control"  value='{{$product->id}}' name="product_id" type="hidden">
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12">
                                  <h2 class="aon-form-title">{{__('Continue To Complete Checkout')}} </h2>
                            </div>

                            <div class="col-md-12">
                                  <div class="form-group">
                                      <label >{{__('Name')}}</label>
                                      <div class="aon-inputicon-box">
                                          <input class="form-control sf-form-control" name="name" type="text">
                                          <i class="aon-input-icon fa fa-user"></i>
                                      </div>
                                  </div>
                            </div>
                            <div class="col-md-12">
                                  <div class="form-group">
                                      <label >{{__('Phone')}}</label>
                                      <div class="aon-inputicon-box">
                                          <input class="form-control sf-form-control" name="phone" type="text" required>
                                          <i class="aon-input-icon fa fa-phone"></i>
                                      </div>
                                  </div>
                            </div>
                            <div class="col-md-12">
                                  <div class="form-group">
                                      <label >{{__('Address')}}</label>
                                      <div class="aon-inputicon-box">
                                          <input class="form-control sf-form-control" name="address" type="text" required>
                                          <i class="aon-input-icon fa fa-map"></i>
                                      </div>
                                  </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label >{{__("Email")}}</label>
                                    <div class="aon-inputicon-box">
                                        <input class="form-control sf-form-control" name="email" type="email" required>
                                        <i class="aon-input-icon fa fa-lock"></i>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label >Choose a payment option to book Appointment</label>
                                    <ul class="aon-book-plan">
                                        <li class="checkbox sf-radio-checkbox">
                                            <input id="td1a" name="abc" value="five" type="radio">
                                            <label for="td1a">
                                                <strong>$180</strong>
                                                <span>Pay Online - get instant 10% off on paying online</span>
                                            </label>
                                        </li>
                                        <li class="checkbox sf-radio-checkbox">
                                            <input id="td55a" name="abc" value="five" type="radio">
                                            <label for="td55a">
                                                <strong>$200</strong>
                                                <span>Pay later at the clinic</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                            <input class="site-button w-100"  value='{{__("Continue to Pay")}}'  type="submit" >
                                {{-- <button  type="button"  class="site-button w-100">Continue to Pay <i class="feather-arrow-right"></i> </button> --}}
                            </div>

                      </div>
                  </div>
                </div>
                <!-- Search Bar Home END -->

             </div>
            </fieldset>

        </form>
      </div>
    </div>
</div>

@stop
