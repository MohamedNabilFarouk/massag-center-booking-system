@extends('admin.layouts.master')
@section('content')

@include('admin.includes.messages')



<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('Social Media')}}</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                            <form method="post" action="{{ route('settings.social.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @foreach ($social_settings as $index => $social)

                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{ $social->key }}</label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="{{ $social->key }}" class="form-control form-control-lg" value="{{ $social->value }}"  placeholder="{{ $social->key }}">
                                    </div>
                                </div>

                                @endforeach








                                    <div class="col-12  mt-5 ">
                                        <button type="submit" class="btn btn-primary mb-2">{{__("Submit")}}</button>
                                    </div>
                            </form>

                </div>
            </div>
        </div>
    </div>

@stop

