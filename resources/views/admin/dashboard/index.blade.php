@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')

<!--**********************************
			Content body start
		***********************************-->

				<div class="row">
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xl-3 col-sm-6">
										<div class="card booking">
											<div class="card-body">
												<div class="booking-status d-flex align-items-center">
													<span>
														<svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" viewBox="0 0 28 20">
														  <path d="M27,14V7a1,1,0,0,0-1-1H6A1,1,0,0,0,5,7v7a3,3,0,0,0-3,3v8a1,1,0,0,0,2,0V24H28v1a1,1,0,0,0,2,0V17A3,3,0,0,0,27,14ZM7,8H25v6H24V12a2,2,0,0,0-2-2H19a2,2,0,0,0-2,2v2H15V12a2,2,0,0,0-2-2H10a2,2,0,0,0-2,2v2H7Zm12,6V12h3v2Zm-9,0V12h3v2ZM4,17a1,1,0,0,1,1-1H27a1,1,0,0,1,1,1v5H4Z" transform="translate(-2 -6)" fill="var(--primary)"/>
														</svg>
													</span>
													<div class="ms-4">
														<h2 class="mb-0 font-w600">{{count($bookings)}}</h2>
														<p class="mb-0 text-nowrap">{{__('All Bookings in Site')}}</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-sm-6">
										<div class="card booking">
											<div class="card-body">
												<div class="booking-status d-flex align-items-center">
													<span>
														<svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" viewBox="0 0 28 20">
														  <path d="M27,14V7a1,1,0,0,0-1-1H6A1,1,0,0,0,5,7v7a3,3,0,0,0-3,3v8a1,1,0,0,0,2,0V24H28v1a1,1,0,0,0,2,0V17A3,3,0,0,0,27,14ZM7,8H25v6H24V12a2,2,0,0,0-2-2H19a2,2,0,0,0-2,2v2H15V12a2,2,0,0,0-2-2H10a2,2,0,0,0-2,2v2H7Zm12,6V12h3v2Zm-9,0V12h3v2ZM4,17a1,1,0,0,1,1-1H27a1,1,0,0,1,1,1v5H4Z" transform="translate(-2 -6)" fill="var(--primary)"/>
														</svg>
													</span>
													<div class="ms-4">
														<h2 class="mb-0 font-w600">{{count($todayBookings)}}</h2>
														<p class="mb-0 text-nowrap ">{{__("Today's Booking")}}</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-sm-6">
										<div class="card booking">
											<div class="card-body">
												<div class="booking-status d-flex align-items-center">
													<span>
														<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
														  <path data-name="Path 1957" d="M129.035,178.842v2.8a5.6,5.6,0,0,0,5.6,5.6h14a5.6,5.6,0,0,0,5.6-5.6v-16.8a5.6,5.6,0,0,0-5.6-5.6h-14a5.6,5.6,0,0,0-5.6,5.6v2.8a1.4,1.4,0,0,0,2.8,0v-2.8a2.8,2.8,0,0,1,2.8-2.8h14a2.8,2.8,0,0,1,2.8,2.8v16.8a2.8,2.8,0,0,1-2.8,2.8h-14a2.8,2.8,0,0,1-2.8-2.8v-2.8a1.4,1.4,0,0,0-2.8,0Zm10.62-7-1.81-1.809a1.4,1.4,0,1,1,1.98-1.981l4.2,4.2a1.4,1.4,0,0,1,0,1.981l-4.2,4.2a1.4,1.4,0,1,1-1.98-1.981l1.81-1.81h-12.02a1.4,1.4,0,1,1,0-2.8Z" transform="translate(-126.235 -159.242)" fill="var(--primary)" fill-rule="evenodd"/>
														</svg>
													</span>
													<div class="ms-4">
														<h2 class="mb-0 font-w600">{{count($orders)}}</h2>
														<p class="mb-0">{{__("All Orders in Site")}}</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-3 col-sm-6">
										<div class="card booking">
											<div class="card-body">
												<div class="booking-status d-flex align-items-center">
													<span>
														<svg id="_009-log-out" data-name="009-log-out" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
														  <path data-name="Path 1957" d="M151.435,178.842v2.8a5.6,5.6,0,0,1-5.6,5.6h-14a5.6,5.6,0,0,1-5.6-5.6v-16.8a5.6,5.6,0,0,1,5.6-5.6h14a5.6,5.6,0,0,1,5.6,5.6v2.8a1.4,1.4,0,0,1-2.8,0v-2.8a2.8,2.8,0,0,0-2.8-2.8h-14a2.8,2.8,0,0,0-2.8,2.8v16.8a2.8,2.8,0,0,0,2.8,2.8h14a2.8,2.8,0,0,0,2.8-2.8v-2.8a1.4,1.4,0,0,1,2.8,0Zm-10.62-7,1.81-1.809a1.4,1.4,0,1,0-1.98-1.981l-4.2,4.2a1.4,1.4,0,0,0,0,1.981l4.2,4.2a1.4,1.4,0,1,0,1.98-1.981l-1.81-1.81h12.02a1.4,1.4,0,1,0,0-2.8Z" transform="translate(-126.235 -159.242)" fill="var(--primary)" fill-rule="evenodd"/>
														</svg>

													</span>
													<div class="ms-4">
														<h2 class="mb-0 font-w600">{{count($last7DaysOrders)}}</h2>
														<p class="mb-0">{{__("Weeks Orders")}}</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xl-6">
										<div class="card">
											<div class="card-header border-0 pb-0">
												<h4 class="fs-20">{{__("Today's Booking Schedule")}}</h4>
											</div>
											<div class="card-body pb-2 loadmore-content" id="BookingContent" style="height: 500px;overflow: scroll;">
												<div class="text-center event-calender border-bottom booking-calender">
													<input type="text" class="form-control d-none " id="datetimepicker1">
												</div>
												{{-- table here --}}
                                                <div class="table-responsive col-md-12">
                                                    <table class="table table-responsive-md">
                                                        <thead>
                                                            <tr>
                                                                {{-- <th style="width:50px;">
                                                                    <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                                        <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                                        <label class="form-check-label" for="checkAll"></label>
                                                                    </div>
                                                                </th> --}}
                                                                <th><strong>#</strong></th>
                                                                <th><strong>{{__("Package")}}</strong></th>
                                                                <th><strong>{{__("Customer")}}</strong></th>
                                                                <th><strong>{{__("Time")}}</strong></th>
                                                                <th><strong>{{__("Moroco Bath Time")}}</strong></th>
                                                                <th><strong>{{__("Total")}}</strong></th>
                                                                <th><strong>{{__("Profissional")}}</strong></th>
                                                                <th><strong>{{__("Moroco Bath Profissional")}}</strong></th>
                                                                <th><strong>{{__("Gender")}}</strong></th>
                                                                <th><strong>{{__("Birthdate")}}</strong></th>

                                                                <th><strong>{{__("first time")}}</strong></th>
                                                                <th><strong>{{__("canceled")}}</strong></th>
                                                                <th><strong>{{__("Paid")}}</strong></th>

                                                                <th><strong>{{__("Action")}}</strong></th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($todayBookings as $row)


                                                            <tr>

                                                                <td><strong>{{$row->id}}</strong></td>
                                                                {{-- <td><div class="d-flex align-items-center"><img src="images/avatar-1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">{{$row->title_en}}</span></div></td> --}}
                                                                <td>
                                                                    <div class="room-list-bx d-flex align-items-center">

                                                                        <div>
																		<span class=" fs-16 font-w500 text-nowrap">{{$row->package->title ?? ''}}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
																<td> <span class=" fs-16 font-w500 text-nowrap">{{__("Name")}}:  {{$row->full_name ?? $row->user->name ?? ''}}</span><br>
                                                    <span class=" fs-16 font-w500 ">{{__("Email")}}:   {{$row->email ?? $row->user->email?? ''}} </span><br>
                                                        <span class=" fs-16 font-w500 text-nowrap">{{__("Phone")}}:  {{$row->phone ?? $row->user->phone ?? ''}} </span>

                                                </td>
                                                                <td><span class=" fs-16 font-w500 text-nowrap">{{\Carbon\Carbon::parse($row->from)->toDayDateTimeString()}} {{__('To')}} <br> {{\Carbon\Carbon::parse($row->to)->format(' g:i A')}}</span></td>
                                                              @if($row->special_from)
                                                                <td><span class=" fs-16 font-w500 text-nowrap"> {{\Carbon\Carbon::parse($row->special_from)->toDayDateTimeString() ?? '-'}} {{__('To')}} <br> {{\Carbon\Carbon::parse($row->special_to)->format('g:i A') ??'-'}}</span></td>
                                                               @else
                                                               <td>-</td>
                                                                @endif
                                                                <td>{{$row->total}} {{__('currency')}}</td>
                                                                <td>{{$row->team->name ?? '-'}}</td>
                                                                <td>{{$row->specialTeam->name ?? '-'}}</td>
                                                                <td>{{$row->gender}}</td>
                                                                <td>{{$row->birth_date}}</td>
                                                                <td>{{$row->is_first ? 'Yes':'No'}}</td>


                                                                <td>

                                                                    <form action="{{ route('booking.update', $row->id) }}" method="post" id='updateform' style="display: inline-block">
                                                                        @csrf
                                                                        @method('put')
                                                                        @if($row->is_canceled == 0)
                                                                        <input type='hidden' name='is_canceled' value='1'>
                                                                    <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure Cancel this Booking ?')"><i class="fa fa-times"></i></button>
                                                                    @else
                                                                    {{-- <span class="btn btn-success shadow btn-xs sharp"><i class="fa fa-check"></i></span> --}}
                                                                    <input type='hidden' name='is_canceled' value='0'>
                                                                    <button class="btn btn-success shadow btn-xs sharp" onclick="return confirm('Are you sure To Re-Booking ?')"><i class="fa fa-check"></i></button>


                                                                    @endif

                                                                </form>
                                                                    </td>



                                                                    <td>

                                                                        <form action="{{ route('booking.update', $row->id) }}" method="post" id='updateform' style="display: inline-block">
                                                                            @csrf
                                                                            @method('put')
                                                                            @if($row->is_paid != 1)
                                                                            <input type='hidden' name='is_paid' value='1'>
                                                                        {{-- <span class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-times"></i></span> --}}
                                                                        <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure To Mark Booking  As Paid ?')"><i class="fa fa-times"></i></button>

                                                                        @else
                                                                        {{-- <span class="btn btn-success shadow btn-xs sharp" ><i class="fa fa-check"></i></span> --}}
                                                                        <input type='hidden' name='is_paid' value='0'>
                                                                        <button class="btn btn-success shadow btn-xs sharp" onclick="return confirm('Are you sure To Mark Booking  As Not Paid ?')"><i class="fa fa-check"></i></button>

                                                                        @endif
                                                                    </form>
                                                                      </td>

                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a href="{{route('details',$row->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                                        <a href="{{route('admin.booking.update',$row->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pen"></i></a>

                                                                        <form action="{{route('booking.destroy',$row->id)}}" method="post" id='delform' style="display: inline-block">
                                                                            @csrf
                                                                            @method('delete')

                                                                        <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                                                       </form>
                                                                    </div>
                                                                </td>
                                                            </tr>


                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
											</div>
											<div class="card-footer border-0 m-auto pt-0">
												{{-- <a href="javascript:void(0);" class="btn  btn-link m-auto dlab-load-more fs-16 font-w500 text-secondary" id="Booking" rel="ajax/booking.html">View more</a> --}}
											</div>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="card">
											<div class="card-header border-0 pb-0">
												<h4 class="fs-20">{{__("Week's Orders Schedule")}}</h4>
											</div>
											<div class="card-body pb-2 loadmore-content" id="BookingContent">
												<div class="text-center event-calender border-bottom booking-calender">
													<input type="text" class="form-control d-none " id="datetimepicker1">
												</div>
                                                @foreach($last7DaysOrders as $row)
                                                {{-- @dd($row->product->main_image) --}}
												<div class="rooms mt-3 d-flex align-items-center justify-content-between flex-wrap">
													<div class="d-flex align-items-center mb-3">
														<img src="{{$row->product->main_image }}" alt>
														<div class="ms-4 bed-text">
															<h4>{{$row->product->title}}</h4>
															<div class="users d-flex align-items-center">
																{{-- <img src="{{ asset('dashboard/images/user1.jpg') }}" alt> --}}
																<div>
																	<span class="fs-16 font-w500 me-3">{{$row->user->name}}</span>
																	<span>{{\Carbon\Carbon::parse($row->created_at)->toDayDateTimeString()}}</span><br>
																	<span><strong>{{__("Address")}}:</strong> {{$row->address}}</span>
																</div>
															</div>
														</div>
													</div>
													{{-- <span class="date bg-secondary mb-3">3</span> --}}
												</div>
											@endforeach
											</div>
											<div class="card-footer border-0 m-auto pt-0">
												{{-- <a href="javascript:void(0);" class="btn  btn-link m-auto dlab-load-more fs-16 font-w500 text-secondary" id="Booking" rel="ajax/booking.html">View more</a> --}}
											</div>
										</div>
									</div>
									{{-- <div class="col-xl-6">
										<div class="row">
											<div class="col-xl-12">
												<div class="card">
													<div class="card-header border-0 flex-wrap">
														<h4 class="fs-20">Reservation Stats</h4>
														<div class="card-action coin-tabs">
															<ul class="nav nav-tabs" role="tablist">
																<li class="nav-item">
																	<a class="nav-link " data-bs-toggle="tab" href="#Daily1" role="tab">Daily</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link " data-bs-toggle="tab" href="#weekly1" role="tab">Weekly</a>
																</li>
																<li class="nav-item">
																	<a class="nav-link active" data-bs-toggle="tab" href="#monthly1" role="tab">Monthly</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="card-body pb-0">
														<div class="d-flex flex-wrap">
															<span class="me-sm-5 me-0 font-w500">
																<svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
																  <rect width="13" height="13" fill="#135846"/>
																</svg>

																Check In
															</span>
															<span class="fs-16 font-w600 me-4">23,451 <small class="text-success fs-12 font-w400">+0.4%</small></span>
															<span class="me-sm-5 ms-0 font-w500">
																<svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
																  <rect width="13" height="13" fill="#E23428"/>
																</svg>
																Check Out
															</span>
															<span class="fs-16 font-w600">20,441</span>
														</div>
														<div class="tab-content">
															<div class="tab-pane fade show active" id="Daily1">
																<div id="chartBar" class="chartBar"></div>
															</div>
															<div class="tab-pane fade " id="weekly1">
																<div id="chartBar1" class="chartBar"></div>
															</div>
															<div class="tab-pane fade " id="monthly1">
																<div id="chartBar2" class="chartBar"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="card bg-secondary">
													<div class="card-body">
														<div class="d-flex align-items-end pb-4 justify-content-between">
															<span class="fs-14 font-w500 text-white">Available Room Today</span>
															<span class="fs-20 font-w600 text-white"><span class="pe-2"></span>683</span>
														</div>
														<div class="progress default-progress h-auto">
															<div class="progress-bar bg-white progress-animated" style="width: 60%; height:13px;" role="progressbar">
																<span class="sr-only">60% Complete</span>
															</div>
														</div>

													</div>
												</div>
											</div>
											<div class="col-xl-6 col-sm-6">
												<div class="card bg-secondary">
													<div class="card-body">
														<div class="d-flex align-items-end pb-4 justify-content-between">
															<span class="fs-14 font-w500 text-white">Sold Out Room Today</span>
															<span class="fs-20 font-w600 text-white"><span class="pe-2"></span>156</span>
														</div>
														<div class="progress default-progress h-auto">
															<div class="progress-bar bg-white progress-animated" style="width: 30%; height:13px;" role="progressbar">
																<span class="sr-only">30% Complete</span>
															</div>
														</div>

													</div>
												</div>
											</div>
											<div class="col-xl-12">
												<div class="card">
													<div class="card-body">
														<div class="row">
															<div class="col-xl-3 col-sm-3 col-6 mb-4 col-xxl-6">
																<div class="text-center">
																	<h3 class="fs-28 font-w600">569</h3>
																	<span class="fs-16">Total Concierge</span>
																</div>
															</div>
															<div class="col-xl-3 col-sm-3 col-6 mb-4 col-xxl-6">
																<div class="text-center">
																	<h3 class="fs-28 font-w600">2,342</h3>
																	<span class="fs-16">Total Customer</span>
																</div>
															</div>
															<div class="col-xl-3 col-sm-3 col-6 mb-4 col-xxl-6">
																<div class="text-center">
																	<h3 class="fs-28 font-w600">992</h3>
																	<span class="fs-16">Total Room</span>
																</div>
															</div>
															<div class="col-xl-3 col-sm-3 col-6 mb-4 col-xxl-6">
																<div class="text-center">
																	<h3 class="fs-28 font-w600">76k</h3>
																	<span class="fs-16 wspace-no">Total Transaction</span>
																</div>
															</div>
															<div class="mb-5 mt-4 d-flex align-items-center">
																<div>
																	<h4><a href="javascript:void(0);" class="text-secondary">Let Travl Generate Your Annualy Report Easily</a></h4>
																	<span class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 		incididunt ut labo
																	</span>
																</div>
																<div><a href="javascript:void(0);" class="ms-5"><i class="fas fa-arrow-right fs-20"></i></a></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div> --}}
								</div>
							</div>
							{{-- <div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="fs-20">Latest Review by Customers</h4>
									</div>
									<div class="card-body pt-0">
										<div class="front-view-slider owl-carousel owl-carousel owl-loaded owl-drag owl-dot">
											<div class="items">
												<div class="customers border">
													<p class="fs-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
													<div class="d-flex justify-content-between align-items-center mt-4">
														<div class="customer-profile d-flex ">
														<img src="{{ asset('dashboard/images/user5.jpg') }}" alt>
														<div class="ms-3">
															<h5 class="mb-0"><a href="javascript:void(0);">Kusnaidi Anderson</a></h5>
															<span>4m ago</span>
														</div>
														</div>
														<div class="customer-button text-nowrap">
															<a href="javascript:void(0);"><i class="far fa-check-circle text-success"></i></a>
															<a href="javascript:void(0);"><i class="far fa-times-circle text-danger"></i></a>
														</div>
													</div>
												</div>
											</div>
											<div class="items">
												<div class="customers border">
													<p class="fs-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
													<div class="d-flex justify-content-between align-items-center mt-4">
														<div class="customer-profile d-flex ">
														<img src="{{ asset('dashboard/images/user6.jpg') }}" alt>
														<div class="ms-3">
															<h5 class="mb-0"><a href="javascript:void(0);">Kusnaidi Anderson</a></h5>
															<span>4m ago</span>
														</div>
														</div>
														<div class="customer-button text-nowrap">
															<a href="javascript:void(0);"><i class="far fa-check-circle text-success"></i></a>
															<a href="javascript:void(0);"><i class="far fa-times-circle text-danger"></i></a>
														</div>
													</div>
												</div>
											</div>
											<div class="items">
												<div class="customers border">
													<p class="fs-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
													<div class="d-flex justify-content-between align-items-center mt-4">
														<div class="customer-profile d-flex ">
														<img src="{{ asset('dashboard/images/user7.jpg') }}" alt>
														<div class="ms-3">
															<h5 class="mb-0"><a href="javascript:void(0);">Kusnaidi Anderson</a></h5>
															<span>4m ago</span>
														</div>
														</div>
														<div class="customer-button text-nowrap">
															<a href="javascript:void(0);"><i class="far fa-check-circle text-success"></i></a>
															<a href="javascript:void(0);"><i class="far fa-times-circle text-danger"></i></a>
														</div>
													</div>
												</div>
											</div>
											<div class="items">
												<div class="customers border">
													<p class="fs-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
													<div class="d-flex justify-content-between align-items-center mt-4">
														<div class="customer-profile d-flex ">
														<img src="{{ asset('dashboard/images/user5.jpg') }}" alt>
														<div class="ms-3">
															<h5 class="mb-0"><a href="javascript:void(0);">Kusnaidi Anderson</a></h5>
															<span>4m ago</span>
														</div>
														</div>
														<div class="customer-button text-nowrap">
															<a href="javascript:void(0);"><i class="far fa-check-circle text-success"></i></a>
															<a href="javascript:void(0);"><i class="far fa-times-circle text-danger"></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> --}}
						</div>
					</div>
				</div>

		<!--**********************************
			Content body end
		***********************************-->
        @stop
