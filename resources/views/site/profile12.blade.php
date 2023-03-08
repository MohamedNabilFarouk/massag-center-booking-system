

@extends('layouts.app')
@section('content')

@php
   $bookings =App\Models\Booking::where('user_id',auth()->user()->id)->orderBy('id','desc')->limit(10)->get();
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

    <div class="container ">

    <div class="panel-group mt-5">
    <div class="panel panel-primary">
        @include('admin.includes.messages')
      <form action="{{route('profile.update')}}" method="post" class="form-horizontal" >
        @csrf
            <!-- Form Two-->
            <fieldset id="personal">
             <div class="panel-body" style="margin-top: 100px;">
                <!-- Search Bar Home START -->
                <div class="aon-booking-wrap d-flex align-items-center justify-content-center">
                  <div class="aon-booking-form">


                        <div class="row">



                            <div class="col-md-12">
                                <h2 class="aon-form-title">{{__("Edit Your Profile")}}</h2>

                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                  <label >{{__('Name')}}</label>
                                  <div class="aon-inputicon-box">
                                      <input class="form-control sf-form-control" value='{{auth()->user()->name}}' name="name" type="text">
                                      <i class="aon-input-icon fa fa-user"></i>
                                  </div>
                                  @error('name')<div class="error alert alert-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                  <label >{{__('Email')}}</label>
                                  <div class="aon-inputicon-box">
                                      <input class="form-control sf-form-control" value='{{auth()->user()->email}}' name="email" type="email">
                                      <i class="aon-input-icon fa fa-envelope"></i>
                                  </div>
                                  @error('email')<div class="error alert alert-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label >{{__('Phone')}}</label>
                                  <div class="aon-inputicon-box">
                                      <input class="form-control sf-form-control" value='{{auth()->user()->phone}}' name="phone" type="text">
                                      <i class="aon-input-icon fa fa-phone"></i>
                                  </div>
                                  @error('phone')<div class="error alert alert-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>





                            <div class="col-md-12">
                              <button type="submit" class="next site-button w-100">{{__("Save")}} <i class="feather-arrow-right"></i> </button>
                            </div>


							<div class="row">


                            <div class="col-md-12">
                                <h2 class="aon-form-title"> {{__('Your Booking')}}</h2>

                            </div>

                                <div class="col-md-12">
                                      <table style="width: 100%">
  <tr>
  <th>#</th>
  <th>{{__('Package')}}</th>
  <th>{{__('Total')}}</th>
  <th>{{__('Time')}}</th>
  </tr>
  @foreach ( $bookings as $row )


  <tr>
  <td><a href="#">{{$row->id}}</a></td>
  <td><a href="#">{{$row->package->title}}</a></td>
  <td><span>{{$row->total}} {{__('currency')}}</span></td>
  <td><span><td><span class=" fs-16 font-w500 text-nowrap">{{\Carbon\Carbon::parse($row->from)->toDayDateTimeString()}} {{__('To')}} <br> {{\Carbon\Carbon::parse($row->to)->toDayDateTimeString()}}</span></td></span></td>
  {{-- <td><span>Pending</span></td> --}}
  </tr>

  @endforeach
</table>

<div class="col-12 d-flex justify-content-center mt-5">
    {{-- {{ $bookings->withQueryString()->links('pagination::bootstrap-4') }} --}}
    {{-- {{$b->appends(array_except(Request::query(), 'orderPage'))->links('pagination::bootstrap-4')}} --}}

</div>
                           </div>

                            </div>


                            {{--  --}}


                            <div class="row">


                                <div class="col-md-12">
                                    <h2 class="aon-form-title"> {{__('Your Orders')}}</h2>

                                </div>

                                    <div class="col-md-12">
                                          <table style="width: 100%">
      <tr>
      <th>#</th>
      <th>{{__('Package')}}</th>
      <th>{{__('Total')}}</th>
      <th>{{__('Time')}}</th>
      </tr>
      @foreach ( $orders as $row )


      <tr>
      <td><a href="#">{{$row->id}}</a></td>
      <td><a href="#">{{$row->product->title}}</a></td>
      <td><span>{{$row->total}} {{__('currency')}}</span></td>
      <td><span><td><span class=" fs-16 font-w500 text-nowrap">{{\Carbon\Carbon::parse($row->created_at)->toDayDateTimeString()}} </span></td>
      {{-- <td><span>Pending</span></td> --}}
      </tr>

      @endforeach
    </table>

    <div class="col-12 d-flex justify-content-center mt-5">
        {{-- {{$orders->appends(array_except(Request::query(), 'orderPage'))->links('pagination::bootstrap-4')}} --}}
        {{-- {{ $orders ->withQueryString()->links('pagination::bootstrap-4') }} --}}
    </div>
                               </div>

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




<script>
  $(document).ready(function(){
    var form_count = 1, form_count_form, next_form, total_forms;
    total_forms = $("fieldset").length;
    $(".next").click(function(){

          let previous = $(this).closest("fieldset").attr('id');
          let next = $('#'+this.id).closest('fieldset').next('fieldset').attr('id');
          $('#'+next).show();
          $('#'+previous).hide();
          setProgressBar(++form_count);

    });

    $(".previous").click(function(){

          let current = $(this).closest("fieldset").attr('id');
          let previous = $('#'+this.id).closest('fieldset').prev('fieldset').attr('id');
          $('#'+previous).show();
          $('#'+current).hide();
          setProgressBar(--form_count);

    });

  });
  </script>
@stop

