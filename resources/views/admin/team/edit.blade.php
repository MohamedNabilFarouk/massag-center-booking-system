@extends('admin.layouts.master')
@section('content')

@include('admin.includes.messages')



<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('Team')}} / {{__('Update')}} </h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                            <form method="post" action="{{ route('team.update', $team->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Name')}} </label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="name" class="form-control form-control-lg" value="{{ $team->name }}" required placeholder="{{__('Name')}}">
                                    </div>
                                </div>
                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Title Ar')}}</label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="title_ar" class="form-control form-control-lg" value="{{ $team->title_ar }}" required placeholder="Title Arabic">
                                    </div>
                                </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Title En')}}</label>
                                        <div class="col-sm-10 ">
                                            <input type='text' name="title_en"  class="form-control form-control-lg" value="{{ $team->title_en }}" required placeholder="Title English">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Description Ar')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='des_ar' rows="4" id="editor">{{ $team->des_ar}}</textarea>

                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Description En')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='des_en' rows="4" id="editor">{{ $team->des_en}}</textarea>

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
                                            <input type="checkbox" name="is_special" class="form-check-input" value='1' @if($team->is_special == 1) checked @endif  id="customCheckBox1" >
                                            <label class="form-check-label" for="customCheckBox3">{{__('Moroco Bath Profissional')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-4 col-4">
                                        <div class="form-check custom-checkbox mb-3 checkbox-success">
                                            <input type="checkbox" name="status" class="form-check-input" value='0'  @if($team->status == 0) checked @endif  id="customCheckBox2" >
                                            <label class="form-check-label" for="customCheckBox3">{{__('Off Now')}}</label>
                                        </div>
                                    </div>



                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Image')}}</label>
                                        <div class="col-sm-4 ">
                                            <input type="file" name="image"    class="image_name">
                                        </div>
                                        <div class="col-sm-4 ">
                                            <img class="me-3 rounded" src="{{ $team->image}}" alt width="100px" height="100px">
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
