@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')

 <!--**********************************
            Content body start
        ***********************************-->





					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{__("Team")}} </h4><a href='{{route('team.create')}}'><span class="badge badge-lg badge-success">{{__('create')}} +</span></a>
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
                                                <th><strong>{{__('Title En')}}</strong></th>
                                                <th><strong>{{__('Title Ar')}}</strong></th>
                                                <th><strong>{{__('Description En')}}</strong></th>
                                                <th><strong>{{__("Description Ar")}}</strong></th>
                                                <th><strong>{{__("Off Day")}}</strong></th>
                                                <th><strong>{{__("Status")}}</strong></th>


                                                <th><strong>{{__("Action")}}</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($team as $row)
                                            <a href="{{route('team.edit',$row->id)}}">
                                            <tr>

                                                <td><strong>{{$row->id}}</strong></td>
                                                {{-- <td><div class="d-flex align-items-center"><img src="images/avatar-1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">{{$row->title_en}}</span></div></td> --}}
                                                <td>
                                                    <div class="room-list-bx d-flex align-items-center">
                                                        <img class="me-3 rounded" src="{{$row->image}}" alt>
                                                        <div>
                                                            <span class=" text-secondary fs-14 d-block">#{{$row->id}}</span>
                                                            <span class=" fs-16 font-w500 text-nowrap">{{$row->name}}</span>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{$row->title_en}}</td>
                                                <td>{{$row->title_ar}}</td>
                                                <td>{!! Str::limit($row->des_en, 40) !!}</td>
                                                <td>{!! Str::limit($row->des_ar, 40) !!}</td>
                                                <td>{{$row->off_day}}</td>

                                                <td>@if($row->status == 1) {{__('active')}} @else {{__("off")}} @endif </td>

                                                <td>
													<div class="d-flex">
														<a href="{{route('team.edit',$row->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <form action="{{route('team.destroy',$row->id)}}" method="post" id='delform' style="display: inline-block">
                                                            @csrf
                                                            @method('delete')

                                                        <button class="btn btn-danger shadow btn-xs sharp"      data-confirm="{{ trans('Are you sure?') }}"      ><i class="fa fa-trash"></i></button>
                                                        {{-- <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure?')"          ><i class="fa fa-trash"></i></button> --}}
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
                                    {{ $team->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>


        <!--**********************************
            Content body end
        ***********************************-->


        @stop
