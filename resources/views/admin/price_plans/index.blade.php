@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')

 <!--**********************************
            Content body start
        ***********************************-->





					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Price Plans </h4><a href='{{url('admin/price_plans/create')}}'><span class="badge badge-lg badge-success">create +</span></a>
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
                                                <th><strong>title</strong></th>
                                                <th><strong>Title Ar</strong></th>
                                                <th><strong>Price</strong></th>
                                                <th><strong>Action</strong></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rows as $row)
                                            <a href="{{url('admin/price_plans/edit/'.$row->id)}}">
                                            <tr>

                                                <td><strong>{{$row->id}}</strong></td>
                                                <td>{{$row->title}}</td>
                                                <td>{{$row->title_ar}}</td>
                                                <td>{{$row->price}}</td>

                                                <td>
													<div class="d-flex">
														<a href="{{url('admin/price_plans/edit/'.$row->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
														<a href="{{url('admin/price_plans/delete/'.$row->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
												</td>
                                            </tr>
                                        </a>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $rows->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>


        <!--**********************************
            Content body end
        ***********************************-->
        @stop
