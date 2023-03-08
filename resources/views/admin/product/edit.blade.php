@extends('admin.layouts.master')
@section('content')

@include('admin.includes.messages')



<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('Product')}} / {{__("Update")}} </h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                            <form method="post" action="{{ route('Products.update', $product->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Title Ar')}}</label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="title_ar" class="form-control form-control-lg" value="{{ $product->title_ar }}" required placeholder="Title Arabic">
                                    </div>
                                </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Title En')}}</label>
                                        <div class="col-sm-10 ">
                                            <input type='text' name="title_en"  class="form-control form-control-lg" value="{{ $product->title_en }}" required placeholder="Title English">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Description Ar')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='des_ar' rows="4" id="editor">{{ $product->des_ar}}</textarea>

                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Description En')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='des_en' rows="4" id="editor">{{ $product->des_en}}</textarea>

                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__("Price")}}</label>
                                        <div class="col-sm-4 ">
                                            <input type='number'  min="0" step="any" name="price" class="form-control form-control-lg" value="{{ $product->price}}" required placeholder="price">
                                        </div>
                                    </div>


                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__("Image")}}</label>
                                        <div class="col-sm-4 ">
                                            <input type="file" name="main_image"    class="image_name">
                                        </div>
                                        <div class="col-sm-4 ">
                                            <img class="me-3 rounded" src="{{ $product->main_image}}" alt width="100px" height="100px">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__("Gallery")}}</label>
                                        <div class="col-sm-4 ">
                                            <input type="file" name="gallery[]"   class="image_name" multiple>
                                        </div>
                                    </div>


                                    <div class="col-12  mt-5 ">
                                        <button type="submit" class="btn btn-primary mb-2">{{__("Submit")}}</button>
                                    </div>
                            </form>

                </div>
            </div>
        </div>
    </div>

@stop
