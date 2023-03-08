@extends('admin.layouts.master')
@section('content')

@include('admin.includes.messages')



<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('Team')}} / {{__('create')}}</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                            <form method="post" action="{{ route('team.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Name')}}</label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="name" class="form-control form-control-lg" value="{{ old('name') }}" required placeholder="{{__("Name")}}">
                                    </div>
                                </div>
                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Title Ar')}}</label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="title_ar" class="form-control form-control-lg" value="{{ old('title_ar') }}" required placeholder="{{__('Title Ar')}}">
                                    </div>
                                </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Title En')}}</label>
                                        <div class="col-sm-10 ">
                                            <input type='text' name="title_en"  class="form-control form-control-lg" value="{{ old('title_en') }}" required placeholder="{{__("Title En")}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Description Ar')}}</label>
                                        <div class="col-sm-10 ">

                                            <textarea class="form-control" name='des_ar' rows="4" id="editor">{{ old('des_ar') }}</textarea>

                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Description En')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='des_en' rows="4" id="editor">{{ old('des_en') }}</textarea>

                                        </div>
                                    </div>


                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Week OFF Day')}}</label>
                                        <div class="col-sm-10 ">
                                            <input type="date" class="form-control" name='off_day' >

                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-xxl-4 col-4">
                                        <div class="form-check custom-checkbox mb-3 checkbox-success">
                                            <input type="checkbox" name="is_special" class="form-check-input" value='1'  id="customCheckBox1" >
                                            <label class="col-sm-2 col-form-label col-form-label-lg" for="customCheckBox3">{{__('Moroco Bath Profissional')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-4 col-4">
                                        <div class="form-check custom-checkbox mb-3 checkbox-success">
                                            <input type="checkbox" name="status" class="form-check-input" value='1'  id="customCheckBox2" >
                                            <label class="col-sm-2 col-form-label col-form-label-lg" for="customCheckBox3">{{__('Off Now')}}</label>
                                        </div>
                                    </div>


                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Image')}}</label>
                                        <div class="col-sm-4 ">
                                            <input type="file" name="image"    class="image_name">
                                        </div>
                                    </div>







                                    <div class="col-12  mt-5 ">
                                        <button type="submit" class="btn btn-primary mb-2">{{__('Submit')}}</button>
                                    </div>
                            </form>

                </div>
            </div>
        </div>
    </div>

@stop
