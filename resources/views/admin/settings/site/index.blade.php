@extends('admin.layouts.master')
@section('content')

@include('admin.includes.messages')



<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('Site Settings')}}</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                            <form method="post" action="{{ route('settings.site.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                {{-- <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Traspotration Service Fees')}}</label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="transportation_fees" class="form-control form-control-lg" value="{{ $site_settings -> transportation_fees }}"  placeholder="{{__("transportation fees")}}">
                                    </div>
                                </div> --}}
                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Phone')}}</label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="phone" class="form-control form-control-lg" value="{{ $site_settings -> phone }}"  placeholder="{{__('Phone')}}">
                                    </div>
                                </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Address')}} {{__('en')}}</label>
                                        <div class="col-sm-10 ">
                                            <input type='text' name="address_ar"  class="form-control form-control-lg" value="{{ $site_settings -> address_ar}}"  placeholder="{{__('Address')}} {{__('ar')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Address')}} {{__('en')}}</label>
                                        <div class="col-sm-10 ">
                                            <input type='text' name="address_en"  class="form-control form-control-lg" value="{{ $site_settings -> address_en}}"  placeholder="{{__('Address')}}{{__('en')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Email')}}</label>
                                        <div class="col-sm-10 ">
                                            <input type='email' name="email"  class="form-control form-control-lg" value="{{ $site_settings -> email}}"  placeholder="{{__('Email')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Embed Map')}}</label>
                                        <div class="col-sm-10 ">
                                            <input type='text' name="map"  class="form-control form-control-lg" value="{{ $site_settings -> map}}"  placeholder="{{__('Embed Map')}}">
                                        </div><br>
                                        {!! $site_settings -> map !!}

                                    </div>

                                    <hr/> <h5 class="card-title">{{__('Home Page settings')}}</h5>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Home Page Header Text En')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='home_text' rows="4" id="editor">{{ $site_settings -> home_text}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Home Page Header Text Ar')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='home_text_ar' rows="4" id="editor">{{ $site_settings -> home_text_ar}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Home Page Header Sub-Text En')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='home_subtext' rows="4" id="editor">{{ $site_settings -> home_subtext}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Home Page Header Sub-Text Ar')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='home_subtext_ar' rows="4" id="editor">{{ $site_settings -> home_subtext_ar}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('About Mission and Vision En')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='mission' rows="4" id="editor">{{ $site_settings -> mission}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('About Mission and Vision Ar')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='mission_ar' rows="4" id="editor">{{ $site_settings -> mission_ar}}</textarea>
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

