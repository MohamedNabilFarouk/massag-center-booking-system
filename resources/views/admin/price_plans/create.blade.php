@extends('admin.layouts.master')
@section('content')

@include('admin.includes.messages')



<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Price Plan Create</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                            <form method="post" action="{{url('admin/price_plans/create')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Title Arabic</label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="title_ar" class="form-control form-control-lg" value="{{ old('title_ar') }}" required placeholder="Title Arabic">
                                    </div>
                                </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Title English</label>
                                        <div class="col-sm-10 ">
                                            <input type='text' name="title"  class="form-control form-control-lg" value="{{ old('title') }}" required placeholder="Title English">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Price</label>
                                        <div class="col-sm-4 ">
                                            <input type='number'   step="0.01" name="price" class="form-control form-control-lg" value="{{ old('price') }}" required placeholder="price">
                                        </div>
                                    </div>

                                    <div class="col-12  mt-5 ">
                                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                    </div>
                            </form>

                </div>
            </div>
        </div>
    </div>

@stop
