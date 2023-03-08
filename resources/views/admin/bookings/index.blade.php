@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')

 <!--**********************************
            Content body start
        ***********************************-->





					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{__("Bookings")}} </h4><a href='{{route('booking.export')}}'><span class="badge badge-lg badge-primary">{{__("Export")}} </span></a>
                                {{-- <a href='{{route('booking.create')}}'><span class="badge badge-lg badge-success">create +</span></a> --}}
                            </div>

                            <div class="card-body">
                                <form action="{{ route('booking.filter') }}" method="get"  >
                                    @csrf
                                    {{-- form here --}}
                                    <div class="row">
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label">{{__("Profissional")}}</label>
                                            <select id="inputState" name='prof_id' class="default-select form-control wide">
                                                <option value=''>{{__("Choose...")}}</option>
                                                @foreach ( $prof as $p )
                                                <option value="{{$p->id}}">{{$p->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label">{{__("Package")}}</label>
                                            <select id="inputState" name='package_id' class="default-select form-control wide">
                                                <option value=''>{{__("Choose...")}}</option>
                                                @foreach ( $package as $c )
                                                <option value="{{$c->id}}">{{$c->title}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    <div class="col-md-3">
                                    <div class="form-group">
                                        <label >{{__("From")}}</label>
                                        <div class="aon-date-row">
                                        <input class="form-control sf-form-control" name="from" type="date" placeholder="{{__("from date")}}">

                                        </div>
                                      </div>
                                    </div>
                                      <div class="col-md-3">
                                    <div class="form-group">
                                        <label >{{__("To")}}</label>
                                        <div class="aon-date-row ">
                                            <input class="form-control sf-form-control" name="to" type="date" placeholder="{{__("to date")}}">

                                        </div>
                                      </div>
                                    </div>
                                </div>
                                 <button class='btn btn-success' type=submit>{{__("Filter")}}</span></button>

                                </form>
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
                                            {{-- @dd($bookings) --}}
                                            @foreach ($bookings as $row)


                                             <tr>

                                                <td><strong>{{$row->id}}</strong></td>
                                                {{-- <td><div class="d-flex align-items-center"><img src="images/avatar-1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">{{$row->title_en}}</span></div></td> --}}
                                                <td>
                                                    <div class="room-list-bx d-flex align-items-center">

                                                        <div>
                                                            <span class=" fs-16 font-w500 text-nowrap">{{@$row->package->title}}</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                
                                                <td> <span class=" fs-16 font-w500 text-nowrap">{{__("Name")}}:  {{$row->full_name ?? $row->user->name ?? ''}}</span><br>
                                                    <span class=" fs-16 font-w500 ">{{__("Email")}}:   {{$row->email ?? $row->user->email?? ''}} </span><br>
                                                        <span class=" fs-16 font-w500 text-nowrap">{{__("Phone")}}:  {{$row->phone ?? $row->user->phone ?? ''}} </span>

                                                </td>
                                                <td><span class=" fs-16 font-w500 text-nowrap">@if($row->from){{\Carbon\Carbon::parse($row->from)->toDayDateTimeString()}} {{__('To')}} <br> {{\Carbon\Carbon::parse($row->to)->format(' g:i A')}} @else {{__('-')}} @endif</span></td>

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
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $bookings->withQueryString()->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>


        <!--**********************************
            Content body end
        ***********************************-->
        @stop
