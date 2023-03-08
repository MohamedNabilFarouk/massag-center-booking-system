@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')

 <!--**********************************
            Content body start
        ***********************************-->





					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{__("Orders")}} </h4><a href='{{route('order.export')}}'><span class="badge badge-lg badge-primary">{{__("Export")}} </span></a>
                                {{-- <a href='{{route('booking.create')}}'><span class="badge badge-lg badge-success">create +</span></a> --}}
                            </div>
                            <div class="card-body">
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
                                                <th><strong>{{__("Product")}}</strong></th>
                                                <th><strong>{{__("Customer")}}</strong></th>
                                                <th><strong>{{__("Address")}}</strong></th>
                                                <th><strong>{{__("Total")}}</strong></th>
                                                <th><strong>{{__("Ordered At")}}</strong></th>

                                                <th><strong>{{__("Paid")}}</strong></th>
                                                <th><strong>{{__("Action")}}</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $row)

                                            <tr>

                                                <td><strong>{{$row->id}}</strong></td>
                                                {{-- <td><div class="d-flex align-items-center"><img src="images/avatar-1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">{{$row->title}}</span></div></td> --}}
                                                <td>
                                                    <div class="room-list-bx d-flex align-items-center">
                                                        <img class="me-3 rounded" src="{{$row->product->main_image}}" alt>
                                                        <div>

                                                            <span class=" fs-16 font-w500 text-nowrap">{{$row->product->title_en}}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> <span class=" fs-16 font-w500 text-nowrap">{{__("Name")}}: {{$row->user->name?? ''}}</span><br>
                                                    <span class=" fs-16 font-w500 text-nowrap">{{__("Email")}}: {{$row->user->email?? ''}}</span><br>
                                                        <span class=" fs-16 font-w500 text-nowrap">{{__("Phone")}}: {{$row->user->phone?? ''}}</span>

                                                </td>
                                                <td>{{$row->address}}</td>
                                                <td>{{$row->total}} {{__("currency")}}</td>
                                                <td><span class=" fs-16 font-w500 text-nowrap">{{\Carbon\Carbon::parse($row->created_at)->toDayDateTimeString()}} </span></td>











                                                <td>


                                                        @if($row->is_paid != 1)
                                                    <span class="btn btn-danger shadow btn-xs sharp" ><i class="fa fa-times"></i></span>

                                                    @else
                                                    <span class="btn btn-success shadow btn-xs sharp" ><i class="fa fa-check"></i></span>

                                                    @endif




                                                <td>
													<div class="d-flex">
                                                        <form action="{{route('orders.destroy',$row->id)}}" method="post" id='delform' style="display: inline-block">
                                                            @csrf
                                                            @method('delete')

                                                        <button class="btn btn-danger shadow btn-xs sharp" data-confirm="{{ trans('Are you sure?') }}"><i class="fa fa-trash"></i></button>
                                                       </form>
													</div>
												</td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $orders->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>


        <!--**********************************
            Content body end
        ***********************************-->
        @stop
