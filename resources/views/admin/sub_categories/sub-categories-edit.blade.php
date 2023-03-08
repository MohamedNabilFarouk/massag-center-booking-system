@extends('admin.layouts.master')
@section('content')
<div class="card">
                        <h5 class="card-header">Edit Sub Category</h5>
                                <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/categories">Categories </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit Sub Categories</li>
                                        </ol>
                                    </nav>
                                </div>
                    </div>


        <section class="form-control-repeater">
            <div class="row">
                <!-- Invoice repeater -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab"
                                        data-toggle="tab" href="#account" aria-controls="account" role="tab"
                                        aria-selected="true">
                                        <i data-feather="edit"></i><span class="d-none d-sm-block">Edit
                                          Sub-Category</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="warn-with-time">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            @if ($errors->any())
                                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}

                            @endif
                        </div>
                            <form method="post" action="{{ url('admin/sub-categories/edit/'.$category->id) }}" id="upload_form"
                                enctype="multipart/form-data" class="invoice-repeater">
                                @csrf
                                  @method('PUT')
                                <div>
                                    <div>
                                        <div class="media mb-2">
                                            <img id="output"
                                                src="{{$category->logo}}"
                                                alt="users avatar"
                                                class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer img-container img-thumbnail"
                                                height="90" width="90" />
                                            <div class="media-body mt-50">
                                                <div class="col-12 d-flex mt-1 px-0">
                                                    <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                        <span class="d-none d-sm-block">Add</span>
                                                        {{-- <input class="form-control" type="file" id="change-picture"
                                                        hidden accept="image/png, image/jpeg, image/jpg" /> --}}
                                                        <input class="form-control" name="logo" id="change-picture"
                                                            type="file" hidden accept="image/png, image/jpeg, image/jpg"
                                                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                                        <span class="d-block d-sm-none">
                                                            <i class="mr-0" data-feather="plus-square"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="itemname">Item English Name</label>
                                                    <input type="text" class="form-control" name="title" id="itemname"
                                                        aria-describedby="itemname" value="{{$category->title}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="itemname">Item Arabic Name</label>
                                                    <input type="text" name="title_ar" class="form-control"
                                                        id="itemname" aria-describedby="itemname"
                                                        value="{{$category->title_ar}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                    <button type="submit" id="upload"
                                        class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Invoice repeater -->
            </div>
        </section>

@endsection
