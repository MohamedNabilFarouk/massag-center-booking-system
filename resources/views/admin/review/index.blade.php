@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')

 <!--**********************************
            Content body start
        ***********************************-->





					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reviews </h4>
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
                                                <th><strong>User</strong></th>
                                                <th><strong>Booking</strong></th>
                                                <th><strong>Overall</strong></th>
                                                <th><strong>Room Service</strong></th>
                                                <th><strong>Staff</strong></th>
                                                <th><strong>Comfort</strong></th>
                                                <th><strong>Location</strong></th>
                                                <th><strong>Free WIFI</strong></th>
                                                <th><strong>Comment</strong></th>
                                                <th><strong>Published</strong></th>
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reviews as $row)
                                            <a href="{{route('Reviews.update',$row->id)}}">
                                            <tr>

                                                <td><strong>{{$row->id}}</strong></td>
                                                {{-- <td><div class="d-flex align-items-center"><img src="images/avatar-1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">{{$row->title_en}}</span></div></td> --}}
                                                <td>{{$row->user->name}}</td>
                                                <td>{{$row->booking_id}}</td>
                                                <td>{{ $row->overall }}</td>
                                                <td>{{ $row->room_service }}</td>
                                                <td>{{ $row->staff }}</td>
                                                <td>{{ $row->comfort }}</td>
                                                <td>{{ $row->location }}</td>
                                                <td>{{ $row->free_wifi }}</td>
                                                <td>{{ $row->comment }}</td>

                                                <td><div class="d-flex align-items-center">
                                                    @if($row->published == 1)
                                                    <i class="fa fa-circle text-success me-1"></i> Yes
                                                     @else
                                                    <i class="fa fa-circle text-danger me-1"></i> No
                                                     @endif
                                                    </div>
                                                </td>
                                                <td>
													<div class="d-flex">
                                                    <form action="{{ route('Reviews.update', $row->id) }}" method="post" id='updateform' style="display: inline-block">
                                                            @csrf
                                                            @method('put')
                                                            @if($row->published == 1)
                                                        <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure?')"><i class="fa fa-times"></i></button>
                                                        @else
                                                        <button class="btn btn-success shadow btn-xs sharp" onclick="return confirm('Are you sure?')"><i class="fa fa-check"></i></button>

                                                        @endif
                                                    </form>
                                                        <form action="{{ route('Reviews.destroy', $row->id) }}" method="post" id='delform' style="display: inline-block">
                                                            @csrf
                                                            @method('delete')

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
                                    {{ $reviews->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>


        <!--**********************************
            Content body end
        ***********************************-->
        @stop
