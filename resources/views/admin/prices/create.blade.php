@extends('admin.layouts.master')
@section('content')

@include('admin.includes.messages')



<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Best Prices Create</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                            <form method="post" action="{{ route('Bestprices.store') }}" enctype="multipart/form-data">
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
                                            <input type='text' name="title_en"  class="form-control form-control-lg" value="{{ old('title_en') }}" required placeholder="Title English">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Description Arabic</label>
                                        <div class="col-sm-10 ">

                                            <textarea class="form-control" name='des_ar' rows="4" id="editor">{{ old('des_ar') }}</textarea>

                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Description English</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='des_en' rows="4" id="editor">{{ old('des_en') }}</textarea>

                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Price</label>
                                        <div class="col-sm-4 ">
                                            <input type='number' name="price" class="form-control form-control-lg" value="{{ old('price') }}" required placeholder="price">
                                        </div>
                                    </div>






                                    <div class="mb-3 row mt-5">
                                        <div class="form-check form-switch form-check-custom form-check-solid ">
                                            <input class="form-check-input col-sm-5 " type="checkbox" value="1" name='status' id="status" />
                                            <label class="form-check-label col-sm-2 col-form-label col-form-label-lg" for="flexSwitchDefault">
                                                Show In Home Page
                                            </label>
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
