@extends('layouts.app')
@section('content')

@php
   $bookings =App\Models\Booking::where([['user_id',auth()->user()->id],['is_canceled','0']])->orderBy('id','desc')->limit(10)->get();
   $orders =App\Models\Order::where('user_id',auth()->user()->id)->orderBy('id','desc')->limit(10)->get();
@endphp


<!-- LOADING AREA START ===== -->
<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
        <div class="cssload-wrap">
            <div class="cssload-container">
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
            <span class="cssload-dots"></span>
        </div>
        </div>
    </div>
</div>
<!-- LOADING AREA  END ====== -->



      <!-- Content -->
      <div class="page-content">

        <!--Provider Banner Area -->
        <div class="aon-pro-benner-area">
          <div class="aon-pro-banner-row">
            <div class="aon-pro-banner-content">
                <div class="sf-doc-pro-card-media">
                   <div class="sf-doc-pr-media-inner">
                     <img src="{{asset('front/images/pic1_1.jpg')}}" alt="">
                     <i class="fa fa-check"></i>
                   </div>
                </div>
                <div class="aon-doc-pro-card-name">
                    <h3>{{auth()->user()->name}}</h3>
                    <p>{{auth()->user()->email}}</p>

                    <p >{{auth()->user()->phone}}</p>

                </div>


            </div>
          </div>
        </div>
        <!--Provider Banner Area End -->

        <!-- Left & right section -->
        <div class="aon-profile1-page-wrap p-b90">
            <div class="container">
                @include('admin.includes.messages')
                <form action="{{route('profile.update')}}" method="post" class="form-horizontal" >
                  @csrf
                <div class="row">

                    <!-- Left Part bar start -->
                    <div class="col-lg-12">

                        <!--Profile Info-->
                        <div class="sf-doc-full-detail card-shadow-box mb-4" id="aon-about-area">
                            <div class="sf-doc-full-detail-head">
                                <div class="sf-doc-info-wrap">
                                    <h3>{{__("Edit Your Profile")}}</h3>

                        <div class="col-lg-12">
                            <div class="form-group">
                              <label >{{__('Name')}}</label>
                              <div class="aon-inputicon-box">
                                  <input class="form-control sf-form-control" value='{{auth()->user()->name}}' name="name" type="text">
                                  <i class="aon-input-icon fa fa-user"></i>
                              </div>
                              @error('name')<div class="error alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>



                        <div class="col-lg-12">
                              <div class="form-group">
                                  <label >{{__('Phone')}}</label>
                                  <div class="aon-inputicon-box">
                                      <input class="form-control sf-form-control" value='{{auth()->user()->phone}}' name="phone"type="text">
                                      <i class="aon-input-icon fa fa-user"></i>
                                  </div>
                                  @error('phone')<div class="error alert alert-danger">{{ $message }}</div>@enderror
                              </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label >{{__('Email')}}</label>
                                <div class="aon-inputicon-box">
                                    <input class="form-control sf-form-control" value='{{auth()->user()->email}}' name="email" type="email">
                                    <i class="aon-input-icon fa fa-lock"></i>
                                </div>
                                  @error('email')<div class="error alert alert-danger">{{ $message }}</div>@enderror

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-md-12">
                                <button type="submit" class="next site-button w-100">{{__("Save")}} <i class="feather-arrow-right"></i> </button>
                              </div>
                        </div>

                                </div>

                            </div>




                        </div>



                       <!--Profile Info-->
                       <div class="sf-doc-full-detail card-shadow-box mb-4" id="aon-pricing-area">
                           <h3>{{__('Your Booking')}}</h3>
                           <div class="sf-doc-price-list-head">
                              <table class="col-lg-12 table table-striped" >
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Package')}}</th>
                                    <th>{{__('Total')}}</th>
                                    <th>{{__('Time')}}</th>
{{-- @dd(\Carbon\Carbon::now()->subHours(24)) --}}
                                    <th>{{__('Edit')}}</th>
                                    <th>{{__('Delete')}}</th>
                                    </tr>
                                    @foreach ( $bookings as $index=> $row )

                                        <tr>
                                        <td>{{$index+1}}</td>
                                        <td><a href="#">{{@$row->package->title}}</a></td>
                                        <td>{{$row->total}} {{__('currency')}}</td>
                                        <td>{{\Carbon\Carbon::parse($row->from)->toDayDateTimeString()}} {{__('To')}} <br> {{\Carbon\Carbon::parse($row->to)->format(' g:i A')}}</td>
                                        @if($row->created_at->diffInHours(\Carbon\Carbon::now()) < 24)


                                        <td><a href="{{route('site.booking.update',$row->id)}}">{{__('Edit')}}</a></td>
                                        <td><a href="{{route('profile.cancelBooking',$row->id)}}" onclick="return confirm('Are you sure to cancel the reservation?')">{{__('Delete')}}</a></td>
                                        @else
                                        <td></td>
                                        <td></td>
                                        @endif
                                        </tr>
                                    @endforeach

                                        <!-- The Modal -->
{{-- <div id="myModal" class="modal1">

<!-- Modal content -->
<div class="modal-content1">
<span class="close">&times;</span>
<p>Are you sure to cancel the reservation?</p>
  <center>
  <button class="deletebtn">Delete</button>
  <button class="cancelbtn">Cancel</button>
  </center>
</div>

</div> --}}

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}
</script>



</table>
                           </div>

                        </div>





                         <!--Profile Info-->
                       <div class="sf-doc-full-detail card-shadow-box mb-4" id="aon-pricing-area">
                           <h3>{{__('Your Orders')}}</h3>
                           <div class="sf-doc-price-list-head">
                              <table class="col-lg-12  table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>{{__('Product')}}</th>
                                    <th>{{__('Total')}}</th>
                                    <th>{{__('Time')}}</th>
                                </tr>
                                @foreach ( $orders as $index=>$row )
                                    <tr>
                                        <td><a href="#">{{$index+1}}</a></td>
                                        <td><a href="#">{{@$row->product->title}}</a></td>
                                        <td><span>{{$row->total}} {{__('currency')}}</span></td>
                                        <td><span class=" fs-16 font-w500 text-nowrap">{{\Carbon\Carbon::parse($row->created_at)->toDayDateTimeString()}} </span></td>
                                    </tr>

                                @endforeach





</table>
                           </div>

                        </div>



                    </div>
                    <!-- Left Part END -->





                </div>
            </div>
        </div>
        <!-- Left & right section  END -->



        </div>
    <!-- Content END-->


@stop
