@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')

 <!--**********************************
            Content body start
        ***********************************-->





					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rooms </h4>
                                <div>
                                    <a href='{{route('Rooms.create')}}'><span class="badge badge-lg badge-success">create +</span></a>
                                <a href='{{url('admin/price_calendar')}}'><span class="badge badge-lg badge-success">Price Calendar <i class="fa fa-calendar"></i></span></a>
                                </div>
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
                                                <th><strong>Room</strong></th>
                                                {{-- <th><strong>Title En</strong></th> --}}
                                                <th><strong>Title Ar</strong></th>
                                                {{-- <th><strong>Description En</strong></th>
                                                <th><strong>Description Ar</strong></th> --}}
                                                <th><strong> Night Price</strong></th>
                                                <th><strong> Night Price with Breakfast</strong></th>
                                                {{-- <th><strong>Show</strong></th> --}}
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($rooms as $row)
                                            <a href="{{route('Rooms.edit',$row->id)}}">
                                            <tr>
                                                <td>
                                                    <div class="room-list-bx d-flex align-items-center">
                                                        <img class="me-3 rounded" src="{{$row->main_image}}" alt>
                                                        <div>
                                                            <span class=" text-secondary fs-14 d-block">#{{$row->id}}</span>
                                                            <span class=" fs-16 font-w500 text-nowrap">{{$row->title}}</span>
                                                        </div>
                                                    </div>
                                                </td>



                                                {{-- <td>{{$row->title_en}}</td> --}}
                                                <td>{{$row->title_ar}}</td>
                                                {{-- <td>{{ Str::limit($row->des_en, 40) }}</td>
                                                <td>{{ Str::limit($row->des_ar, 40) }}</td> --}}
                                                <td>{{$row->night_price}}</td>
                                                <td>{{$row->night_price_with_breakfast}}</td>

                                                <td>
													<div class="d-flex">
														<a href="{{route('Rooms.edit',$row->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>

                                                       <form action="{{ route('Rooms.destroy', $row->id) }}" method="post" id='delform' style="display: inline-block">
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
                                    {{ $rooms->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>


        <!--**********************************
            Content body end
        ***********************************-->
        @stop
