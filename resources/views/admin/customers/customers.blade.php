
@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')

 <!--**********************************
            Content body start
        ***********************************-->





					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{__('Customers')}} </h4><a href='{{route('user.export')}}'><span class="badge badge-lg badge-primary">{{__('Export')}} </span></a>
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
                                                <th><strong>{{__('Name')}}</strong></th>
                                                <th><strong>{{__('Email')}}</strong></th>
                                                <th><strong>{{__('Phone')}}</strong></th>

                                                <th><strong>{{__('Action')}}</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customers as $row)
                                            <a href="#">
                                            <tr>

                                                <td><strong>{{$row->id}}</strong></td>
                                                {{-- <td><div class="d-flex align-items-center"><img src="images/avatar-1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">{{$row->title_en}}</span></div></td> --}}

                                                <td>{{$row->name}}</td>
                                                <td>{{$row->email}}</td>
                                                <td>{{$row->phone}}</td>


                                                <td>
													<div class="d-flex">
														{{-- <a href="{{url('admin/customers/edit'.'/'.$row->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a> --}}
                                                        <form action="{{url('admin/customers/delete/'.$row->id)}}" method="post" id='delform' style="display: inline-block">
                                                            @csrf
                                                            @method('GET')

                                                        <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                                       </form>
													</div>
												</td>
                                            </tr>
                                        </a>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $customers->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>


        <!--**********************************
            Content body end
        ***********************************-->
        @stop
