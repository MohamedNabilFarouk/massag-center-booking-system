@extends('layouts.app')
 @section('meta')
<meta name="description" content="{{$book_now['meta_description'] }}">
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
                                            </div>
                                                    <input type='hidden' @if($package->is_special == 1) class="special" @elseif($package->with_special == 1) class="with_special" @endif id="package" name='package_id' value="{{$package->id}}">
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
                                             <select class="form-select" name='package_id' id='package' aria-label="i'll choose my insuance plan?">
                                                <option value='#' >{{__("Choose Your Package")}}</option>
                                                @foreach($allPackages as $p)

                                                <option  @if($p->is_special == 1) class="special"  data-cat ='special'  @elseif($p->with_special == 1) class="with_special"  data-cat='with'  @endif value='{{$p->id}}'>{{$p->title}}</option>
                                               @endforeach
                                            </select>
                                            <i class="aon-input-icon fa fa-umbrella"></i>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <input type="hidden" value="{{$package->id}}">
                                @endif







                                {{-- Non Morocco Spa profissional --}}
                                <div class="col-md-12" id='non_special_prof'>
                                    <div class="form-group">
                                        <label >{{__("Which Professional?")}}</label>
                                        <div class="aon-inputicon-box">
                                            <select class="form-select" id='sel_prof' name='prof_id' aria-label="i'll choose my insuance plan?">
                                                <option value='#' >{{__("Select Professional")}}</option>
                                                @foreach($team as $t)
                                                @if($t->is_special == 0)
                                                <option value='{{$t->id}}'>{{$t->name}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            <i class="aon-input-icon fa fa-eye"></i>
                                            <label class="text-center"style="color:red; font-size:12px" id="prof_err"></label>

                                        </div>
                                    </div>
                                </div>
                            {{-- end non Morocco Spa profissional --}}


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label >{{__("Select an available time")}}</label>
                                    <div class="aon-calen-box">
                                        {{-- <ul class="nav nav-pills mb-3 aon-custom-nav sf-doc-timeing-card-nav" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Today<span> 31 Day</span></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Tomorrow<span> 01 June</span></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">More Date<span>See Calender</span></button>
                                        </li>
                                        </ul> --}}

                                        {{-- @dd(Carbon\Carbon::now()->addDays(7)->toDateString()) --}}
                                        <div class="aon-date-row row">
                                            <div class="col-4"><input class="form-control sf-form-control"  id='date' type="date" placeholder="Select Day" min="{{Carbon\Carbon::now()->toDateString()}}" max="{{Carbon\Carbon::now()->addDays(7)->toDateString()}}"  ></div>
                                            {{-- <div class="col-4"><input class="form-control sf-form-control"  id='date' type="date" placeholder="Select Day" min="{{Carbon\Carbon::now()->toDateString()}}" max="{{Carbon\Carbon::now()->subDays(-7)}}"  ></div> --}}

                                        </div>









                                        <label class="text-center"style="color:red; font-size:12px" id="date_err"></label>
                                        <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <!-- Timing slots start-->
                                               <div class="sf-doc-timing-slots">
                                                    <div class="row" id='sel_time'>
                                                        {{-- <div class="col-lg-6" style="width:40%; margin:30px"> --}}
                                                            {{-- <div class="sf-doc-timing-slots-detail active">
                                                                <span>9AM - 12PM</span>
                                                                <p>0 available</p>
                                                            </div> --}}
                                                        {{-- </div> --}}




                                                    </div>
                                                    </div>
                                                </div>
                                            <!-- Timing slots list End-->
                                        </div>


                                        {{-- <input type="date" name='from'>
                                        <input type="date" name='to'> --}}
                                    </div>
                                    </div>
                            </div>



{{-- Morocco Spa profissional --}}
                                <div class="col-md-12" id='special_prof'>
                                    <div class="form-group">
                                        <label >{{__("Which Morocco Bath Professional?")}}</label>
                                        <div class="aon-inputicon-box">
                                            <select class="form-select" id='sel_special_prof' name='special_prof_id' aria-label="i'll choose my insuance plan?">
                                                <option value='#' >{{__("Select Professional")}}</option>
                                                @foreach($team as $t)
                                                @if($t->is_special == 1)
                                                <option value='{{$t->id}}'>{{$t->name}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            <i class="aon-input-icon fa fa-eye"></i>
                                            <label class="text-center"style="color:red; font-size:12px" id="prof_err"></label>

                                        </div>
                                    </div>
                                </div>

{{--  end Morocco Spa profissional --}}



<div class="col-md-12">
                                    <div class="form-group">
                                        {{-- <label >{{__("Select an available time")}}</label> --}}
                                        <div class="aon-calen-box">
                                            {{-- <ul class="nav nav-pills mb-3 aon-custom-nav sf-doc-timeing-card-nav" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Today<span> 31 Day</span></button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Tomorrow<span> 01 June</span></button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">More Date<span>See Calender</span></button>
                                            </li>
                                            </ul> --}}

                                            {{-- @dd(Carbon\Carbon::now()->addDays(7)->toDateString()) --}}










                                            <label class="text-center"style="color:red; font-size:12px" id="date_err"></label>
                                            <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <!-- Timing slots start-->
                                                   <div class="sf-doc-timing-slots">
                                                        <div class="row" id='sel_special_time'>
                                                            {{-- <div class="col-lg-6" style="width:40%; margin:30px"> --}}
                                                                {{-- <div class="sf-doc-timing-slots-detail active">
                                                                    <span>9AM - 12PM</span>
                                                                    <p>0 available</p>
                                                                </div> --}}
                                                            {{-- </div> --}}




                                                        </div>
                                                        </div>
                                                    </div>
                                                <!-- Timing slots list End-->
                                            </div>


                                            {{-- <input type="date" name='from'>
                                            <input type="date" name='to'> --}}
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

                                        </div>

                                    </div>
                                    <div class="aon-form-top-right">
                                        <button type="button" id="previous1" class="previous aon-form-back-btn">
                                            <i class="fa fa-angle-double-left"></i> Back
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
                                          <label for="td22">{{__("Gift")}}</label>
                                      </div>
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-12" id='fullname'>
                                <div class="form-group">
                                  <label >{{__("Name")}}</label>
                                  <div class="aon-inputicon-box">
                                      <input class="form-control sf-form-control" id='fullnameInput' name="full_name"  type="text">
                                      <i class="aon-input-icon fa fa-user"></i>
                                  </div>
                                </div>
                            </div>

                            

                             <div class="col-md-6">
                                <div class="form-group">
                                  <label >{{__('Phone')}}</label>
                                  <div class="aon-inputicon-box">
                                      <input class="form-control sf-form-control" name="phone" type="text">
                                      <i class="aon-input-icon fa fa-user"></i>
                                  </div>
                                </div>
                            </div> 
                             <div class="col-md-6">
                                <div class="form-group">
                                  <label >{{__('Email')}}</label>
                                  <div class="aon-inputicon-box">
                                      <input class="form-control sf-form-control" name="email" type="email">
                                      <i class="aon-input-icon fa fa-user"></i>
                                  </div>
                                </div>
                            </div> 


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

                            {{-- <div class="col-md-12">
                              <button id="next2"  type="button" class="next site-button w-100">{{__("Continue Booking")}} <i class="feather-arrow-right"></i> </button>
                            </div> --}}
                            <div class="col-md-12">
                                <button  type="submit"  class="site-button w-100">{{__("Continue to Pay")}} <i class="feather-arrow-right"></i> </button>
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

                            {{-- UPDATE --}}

                            {{-- <div class="col-md-12">
                                  <h2 class="aon-form-title">{{__("Continue with Phone & email")}}</h2>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                  <div class="form-group">
                                      <label >{{__("Phone")}}</label>
                                      <div class="aon-inputicon-box">
                                          <input class="form-control sf-form-control" name="phone" type="text">
                                          <i class="aon-input-icon fa fa-user"></i>
                                      </div>
                                  </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label >{{__("Email")}}</label>
                                    <div class="aon-inputicon-box">
                                        <input class="form-control sf-form-control" name="email" type="email">
                                        <i class="aon-input-icon fa fa-lock"></i>
                                    </div>
                                </div>
                            </div> --}}
{{-- END UPDATE --}}
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

                            {{-- <div class="col-md-12">
                                <button  type="submit"  class="site-button w-100">{{__("Continue to Pay")}} <i class="feather-arrow-right"></i> </button>
                            </div> --}}

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

<script>



        $(document).ready(function() {
            // var id = $( "#sel_cat" ).val();

// $('#fullname').hide();
// $('#special_prof').hide();

// $('#td22').on('click', function() {
//     $('#fullname').show();
// });
// $('#td11').on('click', function() {
//     $('#fullname').hide();
//     $('#fullnameInput').val(null);

// });


// add field of special prof

// for packages page
var package = $("#package").val();

            var special = $(".special").val();
            var with_special = $(".with_special").val();

if (special == package){
    $('#special_prof').show();
     $('#non_special_prof').hide();
     $('#sel_time').hide();
     $('#sel_prof').val(null);
 } else if(with_special == package){
    $('#special_prof').show();
     $('#non_special_prof').show();
} else {
    $('#special_prof').hide();
    $('#sel_special_prof').val(null);
    $('#sel_special_time').hide();
    //  $('#non_special_prof').show();
}



// for book now page

$('#package').change(function() {
    // $('#sel_special_time').empty();
    $('#sel_time').empty();
    var package = $("#package").val();
    var cat = $(this).find(':selected').data('cat');
            var special = $(".special").val();
            var with_special = $(".with_special").val();
            //  alert(special);
if (cat == 'special'){
    $('#special_prof').show();
     $('#non_special_prof').hide();
     $('#sel_time').hide();
     $('#sel_special_time').show();
     $('#sel_prof').val(null);
} else if(cat == 'with'){
    $('#special_prof').show();
     $('#non_special_prof').show();
     $('#sel_special_time').show();
     $('#sel_time').show();
} else {
    $('#special_prof').hide();
    $('#sel_special_prof').val(null);
     $('#non_special_prof').show();
    $('#sel_special_time').hide();
}
});

// end add field




            $('#date , #sel_prof,#package').change(function() {
                // alert(' prof');
                $('#sel_time').empty();
                var id = $("#sel_prof").val();
                var special_prof_id = $("#sel_special_prof").val();
                var date = $("#date").val();
                var package = $("#package").val();
                // alert(date);
                // console.log(id);
                $.ajax({
                    url: './profTime/' + id+'/'+ date +'/'+package,
                    // url: './profTime/' + id+'/'+ date +'/'+package+'/'+special_prof_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var len = 0;
                        if (response['data'] != null) {
                            len = response['data'].length;
                        }

                        // for new update

                                    // $.each(arr , function(index, val) {
                                    // console.log(index, val);
                                    //     });

                        // end for new update
                        // '01 Jan 1970 00:00:00 GMT'
                        // alert(response['data'][0].toLocaleTimeString())
// alert(new Date(response['data'][0]))
                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {

                                 var date = new Date(Date.parse(response['data'][i]));


                                //   var  date =new Date(Date.replace("-", " ", Date.parse(response['data'][i])));
                                //   var  date =date.replace("-", " "));
                                var test = response['data'][i];
                                // var t   =  new Date(response['data'][i]).toDateString()
                                // alert(test);
                                //  var date = new Date(Date.parse(response['data'][i]));
                                var date_value = date.toISOString().slice(0, 19).replace('T', ' ');

                                //  var date_plus = date_value.setHours(date_value.getHours() + 1);
//   console.log(i);
//   console.log(len);
// if(i+1 < len){
                                //  var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") + '  -  ' +  new Date(response['data'][i + 1]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") ;
                                 var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") ;
                                //  var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") + '  -  ' + new Date(date.setHours(date.getHours() + 1)).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") ;
// }else{
//     var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
// }
                                //   console.log(test);
                                 // var name = response['data'][i].name_ar;
                                var option = ' <div class="sf-doc-timing-slots-detail col-md-6" style="width:40%; margin:5px 30px 0 0"><input type="radio" id="nonspecialfrom" name="from" value="'+ test +'"> <span>'+ date_dispaly +  '<br>'+new Date(response['data'][i]).toDateString()+'</span>  </div>';
                                $("#sel_time").append(option);
                                //  $('#sub').append(sub);
                            }
                        }else{
            $("#sel_time").append("<span class='text-danger'>{{__('Not Available in this Date')}}</span>");
        }
                    }
                }); //end ajax
            }); //end on change





            // ajax 22


            $('#date , #sel_special_prof').change(function() {
// alert('special prof');
$('#sel_special_time').empty();

var special_prof_id = $("#sel_special_prof").val();
var date = $("#date").val();
var package = $("#package").val();
 var time =  $("#nonspecialfrom").val();
 time = new Date(time).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
 if(with_special == package){
 var AJAXURL = './SpecialprofTime/' + special_prof_id+'/'+ date +'/'+ package +'/'+ time
 }else{
    var AJAXURL ='./SpecialprofTime/' + special_prof_id+'/'+ date ;
 }
//  alert(time);
// console.log(id);
$.ajax({
    url:AJAXURL ,
    // url: './SpecialprofTime/' + special_prof_id+'/'+ date +'/'+ package +'/'+ time ,
    // url: './profTime/' + id+'/'+ date +'/'+package+'/'+special_prof_id,
    type: 'get',
    dataType: 'json',
    success: function(response) {
        var len = 0;

        if (response['data'] != null) {
            len = response['data'].length;
        }

        // for new update

                    // $.each(arr , function(index, val) {
                    // console.log(index, val);
                    //     });

        // end for new update
        // '01 Jan 1970 00:00:00 GMT'
        // alert(response['data'][0].toLocaleTimeString())
// alert(new Date(response['data'][0]))
        if (len > 0) {
            // Read data and create <option >
            for (var i = 0; i < len; i++) {

                 var date = new Date(Date.parse(response['data'][i]));


                //   var  date =new Date(Date.replace("-", " ", Date.parse(response['data'][i])));
                //   var  date =date.replace("-", " "));
                var test = response['data'][i];
                // var t   =  new Date(response['data'][i]).toDateString()
                // alert(test);
                //  var date = new Date(Date.parse(response['data'][i]));
                var date_value = date.toISOString().slice(0, 19).replace('T', ' ');

                //  var date_plus = date_value.setHours(date_value.getHours() + 1);
//   console.log(i);
//   console.log(len);
// if(i+1 < len){
                 var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") ;
                //  var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") + '  -  ' + new Date(date.setHours(date.getHours() + 1)).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") ;
// }else{
// var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
// }
                //   console.log(test);
                 // var name = response['data'][i].name_ar;
                var option = ' <div class="sf-doc-timing-slots-detail col-md-6" style="width:40%; margin:5px 30px 0 0"><input type="radio" id="from" name="special_from" value="'+ test +'"> <span>'+ date_dispaly +  '<br>'+new Date(response['data'][i]).toDateString()+'</span>  </div>';
                $("#sel_special_time").append(option);
                //  $('#sub').append(sub);
            }
        }else{
            $("#sel_special_time").append("<span class='text-danger'>{{__('Not Available in this Date')}}</span>");
        }
    }
}); //end ajax
}); //end on change









//             $('#next1').on('click', function(event) {
//                 var from = $('#from').val();
//                 var prof_id = $('#sel_prof').val();
//                 if((prof_id == '#')){


//                 // alert('* Prof required');
//                 event.preventDefault();
//                 $('#prof_err').html('* Prof required');
//                 // return false;
//                }else if((from == null)){
//         // alert('noo');
//                 //    price = '<span class="danger"><p>* Number of copies and Number of Pages must be more than 0 </p></span>';
//                    event.preventDefault();
//                 $('#date_err').html('* select booking time');
//                     //  return false;
//                }
//             //    }else if(city_price == null){
//             //     event.preventDefault();
//             //     $('#city_err').html('* You Have To  Choose City');
//             //     return false;
//             //    }else if(lang_price == null){
//             //     event.preventDefault();
//             //     $('#lang_err').html('* You Have To  Choose Translation Language');
//             //     return false;


// });

            // #button first.click
            // prof require
            // and date require
            // from require

            }); //end on doc

</script>



<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
          viewMode: 'years',
          format: 'YYYY-MM-DD'
        });
    });
</script>



@stop
