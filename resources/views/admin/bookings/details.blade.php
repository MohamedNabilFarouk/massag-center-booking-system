
@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')


@if(isset($booking))
<!--**********************************
            Content body start
        ***********************************-->
        <div class="">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">{{__('Booking')}} </a></li>
						{{-- <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('Details')}}</a></li> --}}
					</ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card mt-3">
                            <div class="card-header"> {{__("Booking")}} <strong>{{\Carbon\Carbon::parse($booking->from)->toDayDateTimeString() ?? \Carbon\Carbon::parse($booking->special_from)->toDayDateTimeString()}}</strong> <span class="float-end">
                                    <strong>{{__('Status')}}:</strong>@if($booking->is_paid == 0) {{__('Not Paid')}} @else  {{__('paid')}} @endif</span> </div>
                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>{{__('From')}}:</h6>
                                        <div> <strong>{{\Carbon\Carbon::parse($booking->from)->format('g:i A') ?? ''}}</strong> </div>

                                    </div>
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>{{__("To")}}:</h6>
                                        <div> <strong>{{\Carbon\Carbon::parse($booking->to)->format('g:i A') ??'-'}}</strong> </div>
                                    </div>



                                    <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                        <div class="row align-items-center">
											<div class="col-sm-12">

                                                <span>{{__('Profissional')}} : <strong >{{$booking->team->name ?? '-'}}</strong><br>
                                                <span>{{__("Moroco Bath Profissional")}} : <strong >{{$booking->specialTeam->name ?? '-'}}</strong><br>
                                                <span>{{__('Name')}} : <strong > {{$booking->full_name ?? $booking->user->name?? ''}}</strong><br>
                                                <span>{{__('Phone')}} : <strong >{{ $booking->phone ?? $booking->user->phone ?? ''}}</strong><br>
                                                <span>{{__('Email')}} : <strong >{{ $booking->email  ?? $booking->user->email ?? ''}}</strong><br>
                                                    {{-- <strong>1DonateWffyhwAjskoEwXt83pHZxhLTr8H</strong></span><br> --}}

                                            </div>
                                            <div class="col-sm-3 mt-3"> <img src="images/qr.png" alt class="img-fluid width110"> </div>
                                        </div>
                                    </div>
                                    @if($booking->special_from)
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>{{__("Moroco Bath Time")}} {{__('from')}}:</h6>
                                        <div> <strong>{{\Carbon\Carbon::parse($booking->special_from)->format('g:i A') ?? '-'}}</strong> </div>

                                    </div>
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>{{__("Moroco Bath Time")}} {{__('to')}}:</h6>
                                        <div> <strong>{{\Carbon\Carbon::parse($booking->special_to)->format('g:i A') ?? '-'}}</strong> </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>{{__('Package')}}</th>
                                                <th>{{__('First Time')}}</th>
                                                <th>{{__('know This Professional')}} </th>
                                                <th>{{__('Individual')}} {{__('OR')}} {{__('Gift')}}</th>
                                                <th >{{__('Gender')}}</th>
                                                <th >{{__('Birth date')}}</th>
                                                <th >{{__("Phone")}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td class="center">{{$booking->id}}</td>
                                                <td class="center">{{$booking->package->title}}</td>
                                                <td class="center">@if($booking->is_first == 1) {{__("Yes")}} @else {{__("No")}} @endif</td>
                                                <td class="center">@if($booking->is_prof == 1) {{__("Yes")}} @else {{__("No")}} @endif</td>
                                                <td class="center">@if($booking->is_gift == 1) {{__("Gift")}} @else {{__("Individual")}} @endif</td>
                                                <td class="center">{{$booking->gender}}</td>
                                                <td class="center">{{$booking->birth_date}}</td>
                                                <td class="center">{{  $booking->phone  ?? $booking->user->phone ?? ''}}</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5"> </div>
                                    <div class="col-lg-4 col-sm-5 ms-auto">
                                        <table class="table table-clear">
                                            <tbody>

                                                <tr>
                                                    <td class="left"><strong>{{__("Total")}}</strong></td>
                                                    <td class="right"><strong>{{$booking->total}} {{__('currency')}}</strong><br>
                                                        {{-- <strong>0.15050000 BTC</strong></td> --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        @endif
@stop
