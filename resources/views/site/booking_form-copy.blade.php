



 @extends('layouts.app')
 @section('meta')
<meta name="description" content="{{$book_now['meta_description']}}">
<meta name="keywords" content="{{$book_now['meta_keywords']}}">
<meta name="author" content="{{config('app.name')}}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="language" content="English">

<!-- Social meta -->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="{{config('app.name')}} - @if(App::getLocale() === 'en') {{$book_now['title']}} @else {{$book_now['title_ar']}}  @endif"/>
<meta property="og:url" content="{{url()->current()}}"/>
<meta property="og:site_name" content="{{config('app.name')}}"/>
<meta property="og:description" content="{{$book_now['meta_description']}}" />
@stop
 @section('content')
    <div class="container ">

    <div class="panel-group ">
    <div class="panel panel-primary">
      <form class="form-horizontal" id="multistep_form" action="{{route('package.doBooking')}}" method="post">
            <!-- Form One-->
            <fieldset id="account">
              <div class="panel-body">
                  <!-- Search Bar Home START -->
                    <div class="aon-booking-wrap d-flex align-items-center justify-content-center">
                      <div class="aon-booking-form mt-5">
                            <div class="row">
                                <div class="col-md-12 mt-5">
                                    <a href="{{url('/')}}" class="site-button-link btn-back-to-home">{{__('Back to Home')}}</a>
                                    <div class="aon-form-logo">
                                        <img src="images/logo-dark1.png" alt=""/>
                                    </div>

                                </div>
                                @include('admin.includes.messages')
                                @if(isset($package))
                                <div class="col-md-12">
                                    <div class="aon-form-top d-flex justify-content-between align-items-center">
                                        <div class="aon-form-top-left d-flex">
                                            <div class="aon-form-doc-pic">
                                                <img src="images/pic1_1.jpg" alt=""/>
                                            </div>
                                            <div class="aon-form-doc-info">
                                                <strong> {{$package->title}}</strong>
                                                {{-- <span>12:00 PM / 24-02-2022</span> --}}
                                            </div>
                                                    <input type='hidden' name='package_id' value="{{$package->id}}">
                                        </div>
                                        <div class="aon-form-top-right">
                                            <div class="aon-form-consul-free">
                                                <strong>{{__("Fee")}}</strong>
                                                <span>{{$package->price}} {{__('currency')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <div class="col-md-12">
                                    <h2 class="aon-form-title">{{__('Book An Appointment')}}</h2>
                                </div>
                                @if( !isset($package))
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >{{__("Choose Your Package")}}</label>
                                        <div class="aon-inputicon-box">
                                             <select class="form-select" name='package_id' aria-label="i'll choose my insuance plan?">
                                                @foreach($allPackages as $p)
                                                <option value='{{$p->id}}'>{{$p->title}}</option>
                                               @endforeach
                                            </select>
                                            <i class="aon-input-icon fa fa-umbrella"></i>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <input type="hidden" value="{{$package->id}}">
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >{{__("Which Professional?")}}</label>
                                        <div class="aon-inputicon-box">
                                            <select class="form-select" id='sel_prof' name='prof_id' aria-label="i'll choose my insuance plan?">
                                                <option value='#' >{{__('Select Professional')}}</option>
                                                @foreach($team as $t)
                                                <option value='{{$t->id}}'>{{$t->name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="aon-input-icon fa fa-eye"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >{{__("Is This Your First Time?")}}</label>
                                        <div class="sf-radio-row d-flex">
                                            <div class="checkbox sf-radio-checkbox col-6">
                                                <input id="td111" name="is_first" value="0" type="radio">
                                                <label for="td111">{{__("No")}}</label>
                                            </div>
                                            <div class="checkbox sf-radio-checkbox col-6">
                                                <input id="td55" name="is_first" value="1" type="radio">
                                                <label for="td55">{{__("Yes")}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >{{__("Have You Seen This Professional Before?")}}</label>
                                        <div class="sf-radio-row d-flex">
                                            <div class="checkbox sf-radio-checkbox col-6">
                                                <input id="td1" name="is_prof" value="1" type="radio">
                                                <label for="td1">{{__("Yes")}}</label>
                                            </div>
                                            <div class="checkbox sf-radio-checkbox col-6">
                                                <input id="td2" name="is_prof" value="0" type="radio">
                                                <label for="td2">{{__("No")}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >Select an available time</label>
                                        <div class="aon-calen-box">
											<ul class="nav nav-tabs" id='tabs'>
                                                    {{-- <li class="active"><a data-toggle="tab" href="#1">Fri Oct 14 2022</a></li> --}}
                                                    {{-- <li><a data-toggle="tab" href="#2">Sat Oct 15 2022</a></li>
                                                    <li><a data-toggle="tab" href="#3">Sun Oct 16 2022</a></li>
                                                    <li><a data-toggle="tab" href="#4">Mon Oct 17 2022</a></li>
                                                    <li><a data-toggle="tab" href="#5">Tue Oct 18 2022</a></li>
                                                    <li><a data-toggle="tab" href="#6">Wen Oct 19 2022</a></li>
                                                    <li><a data-toggle="tab" href="#7">Thr Oct 20 2022</a></li> --}}
                                            </ul>


<div class="tab-content" id='coll'>

    {{-- <div id="2" class="tab-pane fade">
        <div class="sf-doc-timing-slots">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail active">
                                                                    <span>11PM - 12PM</span>
                                                                    <p>4 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>12PM - 1PM</span>
                                                                    <p>3 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>11AM - 12PM</span>
                                                                    <p>2 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>3PM - 4PM</span>
                                                                    <p>5 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>6AM - 7PM</span>
                                                                    <p>1 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>7AM - 8PM</span>
                                                                    <p>2 available</p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
    </div>
    <div id="3" class="tab-pane fade">
         <div class="sf-doc-timing-slots">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail active">
                                                                    <span>1PM - 2PM</span>
                                                                    <p>4 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>2PM - 3PM</span>
                                                                    <p>3 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>3PM - 4PM</span>
                                                                    <p>2 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>4PM - 5PM</span>
                                                                    <p>5 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>5AM - 7PM</span>
                                                                    <p>1 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>7AM - 8PM</span>
                                                                    <p>2 available</p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
    </div>
    <div id="4" class="tab-pane fade">
          <div class="sf-doc-timing-slots">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail active">
                                                                    <span>11PM - 12PM</span>
                                                                    <p>4 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>12PM - 1PM</span>
                                                                    <p>3 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>11AM - 12PM</span>
                                                                    <p>2 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>3PM - 4PM</span>
                                                                    <p>5 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>6AM - 7PM</span>
                                                                    <p>1 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>7AM - 8PM</span>
                                                                    <p>2 available</p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
    </div>

	  <div id="5" class="tab-pane fade">
          <div class="sf-doc-timing-slots">
                                                        <div class="row">

                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>11AM - 12PM</span>
                                                                    <p>2 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>3PM - 4PM</span>
                                                                    <p>5 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>6AM - 7PM</span>
                                                                    <p>1 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>7AM - 8PM</span>
                                                                    <p>2 available</p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
    </div>
	  <div id="6" class="tab-pane fade">
          <div class="sf-doc-timing-slots">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail active">
                                                                    <span>1PM - 3PM</span>
                                                                    <p>4 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>2PM - 3PM</span>
                                                                    <p>3 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>3PM - 42PM</span>
                                                                    <p>2 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>5PM - 7PM</span>
                                                                    <p>5 available</p>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
    </div>

	 <div id="7" class="tab-pane fade">
          <div class="sf-doc-timing-slots">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail active">
                                                                    <span>1PM - 3PM</span>
                                                                    <p>4 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>2PM - 3PM</span>
                                                                    <p>3 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>3PM - 42PM</span>
                                                                    <p>2 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>5PM - 7PM</span>
                                                                    <p>5 available</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="sf-doc-timing-slots-detail">
                                                                    <span>6PM - 7PM</span>
                                                                    <p>5 available</p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
    </div> --}}
  </div>








                                        </div>
                                        </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <button id="next1" type="button" class="next site-button w-100">
                                  {{__("Continue Booking")}} <i class="feather-arrow-right"></i>
                                </button>
                            </div>
                      </div>
                    </div>
                  <!-- Search Bar Home END -->
              </div>
            </fieldset>

            <!-- Form Two-->
            <fieldset id="personal">
             <div class="panel-body">
                <!-- Search Bar Home START -->
                <div class="aon-booking-wrap d-flex align-items-center justify-content-center">
                  <div class="aon-booking-form">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="aon-form-logo"><img src="images/logo-dark.png" alt=""/></div>
                            </div>
                            @if(isset($package))
                            <div class="col-md-12">
                                <div class="aon-form-top d-flex justify-content-between align-items-center">
                                    <div class="aon-form-top-left d-flex">
                                        <div class="aon-form-doc-pic">
                                            <img src="images/team/pic1.jpg" alt=""/>
                                        </div>
                                        <div class="aon-form-doc-info">
                                            <strong>{{$package->title}}</strong>
                                            {{-- <span>12:00 PM / 24-02-2022</span> --}}
                                        </div>

                                    </div>
                                    <div class="aon-form-top-right">
                                        <button type="button" id="previous1" class="previous aon-form-back-btn">
                                            <i class="fa fa-angle-double-left"></i> {{__('Back')}}
                                        </button>

                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <h2 class="aon-form-title">{{__("Tell us a bit about you")}}</h2>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                  <label >{{__("Individual Appointment Or a Gift")}}</label>
                                  <div class="sf-radio-row d-flex">
                                      <div class="checkbox sf-radio-checkbox col-6">
                                          <input id="td11" name="is_gift" value="0" type="radio">
                                          <label for="td11">{{__("Individual")}}</label>
                                      </div>
                                      <div class="checkbox sf-radio-checkbox col-6">
                                          <input id="td22" name="is_gift" value="1" type="radio">
                                          <label for="td22">{{__('Gift')}}</label>
                                      </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                  <label >{{__('Name')}}</label>
                                  <div class="aon-inputicon-box">
                                      <input class="form-control sf-form-control" name="full_name" type="text">
                                      <i class="aon-input-icon fa fa-user"></i>
                                  </div>
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                  <label >Last Name</label>
                                  <div class="aon-inputicon-box">
                                      <input class="form-control sf-form-control" name="last_name" type="text">
                                      <i class="aon-input-icon fa fa-user"></i>
                                  </div>
                                </div>
                            </div> --}}

                            <div class="col-md-12">
                                <div class="form-group">
                                  <label >{{__("Date of Birth")}}</label>
                                  <div class="aon-date-row row">
                                      <div class="col-4"><input class="form-control sf-form-control" name="birth_date" type="date" placeholder="Birth date"></div>

                                  </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                  <label >{{__("Gender")}}</label>
                                  <div class="sf-radio-row d-flex">
                                      <div class="checkbox sf-radio-checkbox col-6">
                                          <input id="td99" name="gender" value="Male" type="radio">
                                          <label for="td99">{{__("Male")}}</label>
                                      </div>
                                      <div class="checkbox sf-radio-checkbox col-6">
                                          <input id="td222" name="gender" value="Female" type="radio">
                                          <label for="td222">{{__("Female")}}</label>
                                      </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                              <button id="next2"  type="button" class="next site-button w-100">{{__("Continue Booking")}} <i class="feather-arrow-right"></i> </button>
                            </div>
                        </div>

                  </div>
                </div>
                <!-- Search Bar Home END -->

             </div>
            </fieldset>

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

                            @if(isset($package))
                            <div class="col-md-12">
                                <div class="aon-form-top d-flex justify-content-between align-items-center">
                                    <div class="aon-form-top-left d-flex">
                                        <div class="aon-form-doc-pic">
                                            <img src="images/team/pic1.jpg" alt=""/>
                                        </div>
                                        <div class="aon-form-doc-info">
                                            <strong>{{$package->title}}</strong>
                                            {{-- <span>12:00 PM / 24-02-2022</span> --}}
                                        </div>

                                    </div>
                                    <div class="aon-form-top-right">
                                        <button type="button" id="previous1" class="previous aon-form-back-btn">
                                            <i class="fa fa-angle-double-left"></i> {{__("Back")}}
                                        </button>

                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="col-md-12">
                                  <h2 class="aon-form-title">{{__("Continue with Phone & email")}}</h2>
                            </div>

                            <div class="col-md-12">
                                  <div class="form-group">
                                      <label >{{__("Phone")}}</label>
                                      <div class="aon-inputicon-box">
                                          <input class="form-control sf-form-control" name="phone" type="text">
                                          <i class="aon-input-icon fa fa-user"></i>
                                      </div>
                                  </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label >{{__("Email")}}</label>
                                    <div class="aon-inputicon-box">
                                        <input class="form-control sf-form-control" name="email" type="email">
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
                                <button  type="submit"  class="site-button w-100">{{__("Book")}} <i class="feather-arrow-right"></i> </button>
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

<!-- ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<!-- end ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>



        $(document).ready(function() {
            // var id = $( "#sel_cat" ).val();

            $('#sel_prof').change(function() {

                $('#tabs').empty();
                var id = $("#sel_prof").val();
                // console.log(id);







                $.ajax({
                    url: 'http://localhost/massage/public/ar/packageBooking/profTime/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var len = 0;
                        var c=0;
                        // console.log(response['data']);
                        if (response['data'] != null) {
                            len = Object.keys(response['data']).length;
                        //     var daytimes = $.map(response['data'], function(value, index){
                        //         return [value];
                        //     });
                        //     var dayes = $.map(response['data'], function(value, index){
                        //         return [new Date(index).toDateString()];
                        //     });

                        //     //  console.log(dayes);
                        //     $.each(dayes , function(index, val) {
                        //         // console.log(val);
                        //     var tabs=  '<li ><a data-toggle="tab" href="#'+c+'">'+val+'</a></li>';
                        //     var coll=' <div id="'+c+'" class="tab-pane fade in active"> <div class="sf-doc-timing-slots" > <div class="row" id="times">  </div> </div> </div>';
                        //     $("#tabs").append(tabs);
                        //     $("#coll").append(coll);


                        //     $.each(daytimes , function(key, v) {
                        //         // console.log(v);
                        //         for(i=0; i<= v.length; i++){
                        //             // console.log(v[i]);
                        //             var time = v[i] ;
                        //             var done=' <div class="col-lg-6"> <div class="sf-doc-timing-slots-detail active"> <span>'+time+'</span> <p>4 available</p> </div></div>'
                        //             $("#times").append(done);
                        //         }

                        // }); //end of 2nd each




                        //                 c++;

                        //             }); //end of first each




                        }

        // for new update

                         $.each(response['data'] , function(index, val) {
                                        //  console.log(index + val);
                                   var len = index.length;
                                    //    console.log(val[0]);
                                    if (len > 0) {
                                        var dayes = new Date(index).toDateString();
                                        var tabs=  '<li ><a data-toggle="tab" href="#'+c+'">'+dayes+'</a></li>';
                                         var coll=' <div id="'+c+'" class="tab-pane fade in active"> <div class="sf-doc-timing-slots" > <div class="row" id="times">  </div> </div> </div>';
                                        $("#tabs").append(tabs);
                                        $("#coll").append(coll);
                                        c++;
                                        $.each(val , function(key , v) {
                                            //  var date= new Date(index).toDateString();
                                    //  console.log(v);
                                            var time = v ;
                                            //    console.log(time);
                                            var date_value = index + ' ' + time;
                                            // var date_time= new Date(date_value).toDateString();
                                                //  console.log(date_value);
                var done=' <div class="col-lg-6"> <div class="sf-doc-timing-slots-detail active"> <span>'+time+'</span> <p>4 available</p> </div></div>'
                                    //  var option = '<div class="tab-pane fade show active" id="pills-'+index+'" role="tabpanel" aria-labelledby="pills-'+index+'-tab"> <div class="sf-doc-timing-slots"> <div class="row" id="sel_time"> <div class="col-lg-6"> <div class="sf-doc-timing-slots-detail active col-md-6"><input type="radio" name="from" value="'+ date_value +'"> <span>'+ time + '</span> </div> </div> </div> </div> </div>  </div>';
                                    //  var option = ' <div class="sf-doc-timing-slots-detail active col-md-6"><input type="radio" name="from" value="'+ date_value +'"> <span>'+ time + '</span>  </div>';

                                        // console.log(option);

                                    //  $("#pills-tabContent").append(option);
                                     $("#times").append(done);

                                    });
                                }



                                        });

                        // end for new update



                    }
                }); //end ajax














            }); //end on change
            }); //end on change

</script>







@stop
