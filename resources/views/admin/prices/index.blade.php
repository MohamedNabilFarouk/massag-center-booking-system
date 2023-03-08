@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')

 <!--**********************************
            Content body start
        ***********************************-->





					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Best Prices </h4><a href='{{route('Bestprices.create')}}'><span class="badge badge-lg badge-success">create +</span></a>
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
                                                <th><strong>Title En</strong></th>
                                                <th><strong>Title Ar</strong></th>
                                                <th><strong>Description En</strong></th>
                                                <th><strong>Description Ar</strong></th>
                                                <th><strong>Price</strong></th>
                                                <th><strong>Show</strong></th>
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prices as $row)
                                            <a href="{{route('Bestprices.edit',$row->id)}}">
                                            <tr>

                                                <td><strong>{{$row->id}}</strong></td>
                                                {{-- <td><div class="d-flex align-items-center"><img src="images/avatar-1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">{{$row->title_en}}</span></div></td> --}}
                                                <td>{{$row->title_en}}</td>
                                                <td>{{$row->title_ar}}</td>
                                                <td>{!! Str::limit($row->des_en, 10) !!}</td>
                                                <td>{!! Str::limit($row->des_ar, 10) !!}</td>
                                                <td>{{$row->price}}</td>
                                                <td><div class="d-flex align-items-center">
                                                    @if($row->status == 1)
                                                    <i class="fa fa-circle text-success me-1"></i> Yes
                                                     @else
                                                    <i class="fa fa-circle text-danger me-1"></i> No

                                                     @endif
                                                    </div></td>
                                                <td>
													<div class="d-flex">
														<a href="{{route('Bestprices.edit',$row->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        @if(count($prices)> 3)
                                                        <form action="{{route('Bestprices.destroy',$row->id)}}" method="post" id='delform' style="display: inline-block">
                                                            @csrf
                                                            @method('delete')

                                                        <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                                       </form>
													@endif
                                                        </div>
												</td>
                                            </tr>
                                        </a>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $prices->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>


        <!--**********************************
            Content body end
        ***********************************-->
        @stop
