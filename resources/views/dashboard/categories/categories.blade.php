@extends('layouts.layout')

@section('content')

    <head>
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('my-assets/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('my-assets/app-assets/vendors/css/extensions/swiper.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('my-assets/app-assets/vendors/css/extensions/toastr.min.css') }}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css/components.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/ltr-css/ltr.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css/themes/bordered-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/app-assets/css/themes/semi-dark-layout.css') }}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('my-assets/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('my-assets/app-assets/css/pages/app-ecommerce-details.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('my-assets/app-assets/css/plugins/forms/form-number-input.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('my-assets/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('my-assets/assets/css/style.css') }}">
        <!-- END: Custom CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- app e-commerce details start -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <!-- Related Products starts -->
                        <div class="card-body">
                            <div class="mt-4 mb-2 text-center">
                                <h4>Categories</h4>
                            </div>
                            <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                                <div class="swiper-wrapper">

                                    @foreach ($categories as $category)
                                        <div class="swiper-slide col-6 mx-2">
                                            <a href="javascript:void(0)">
                                                <div
                                                    class="item-heading d-flex w-100 justify-content-between align-items-center">
                                                    <h5 class="text-truncate mb-0">{{ $category->title }}</h5>
                                                    <div class="dropdown my-auto">
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-toggle hide-arrow mr-1" id="todoActions"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i data-feather="more-vertical"
                                                                class="font-medium-2 text-body"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="todoActions">
                                                            <a class="dropdown-item" href="{{ route('categories.show',$category->id) }}">
                                                                <i data-feather="eye" class="align-middle mr-50"></i>
                                                                <span class="align-middle">Preview</span>
                                                            </a>
                                                            <a class="dropdown-item" href="{{ route('categories.edit',$category->id) }}">
                                                                <i data-feather="edit" class="align-middle mr-50"></i>
                                                                <span class="align-middle">Edit</span>
                                                            </a>
                                                            {{-- <a class="dropdown-item" href="{{ route('categories.destroy',$category->id) }}">
                                                                <i data-feather="trash-2" class="align-middle mr-50"></i>
                                                                <span class="align-middle">Delete</span>
                                                            </a> --}}
                                                            {{-- <form class="dropdown-item" action="{{ route('categories.destroy', $category->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    <input type="submit" class="align-middle mr-50" value="Delete">

                                                              </form> --}}
                                                              {!! Form::open(['method' => 'DELETE', 'url' => route('categories.destroy', $category->id), 'style' => 'display:inline']) !!}

                                                        {!! Form::button('<i data-feather="trash-2" class="align-middle mr-50"></i>delete', ['type' => 'submit', 'class' => 'btn btn-defult', 'title' => 'Delete ', 'onclick' => 'return confirm("Confirm delete?")']) !!}

                                                        {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="img-container w-50 mx-auto py-75">
                                                    <img src="{{ $category->logo }}" class="img-fluid" alt="image" />
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                        <i data-feather="plus-square"></i>
                                                        <a href="{{ route('SubCategories',$category->id) }}" style="color: aliceblue;">Sub
                                                            Category
                                                        </a></button>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" checked
                                                            id="categoryStutes1" />
                                                        <label class="custom-control-label" for="categoryStutes1"></label>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach





                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <!-- Related Products ends -->
                    </div>
                </section>
                <!-- app e-commerce details end -->

            </div>
        </div>
        <div class="content-body">
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
                                            <i data-feather="plus-square"></i><span class="d-none d-sm-block">Add
                                                Category</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
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
                            <div class="card-body">
                                <form method="post" action="{{ route('categories.store') }}" id="upload_form"
                                    enctype="multipart/form-data" class="invoice-repeater">
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <div>
                                        <div>
                                            <div class="media mb-2">
                                                <img id="output"
                                                    src="{{ asset('my-assets/app-assets/images/avatars/placeholder.png') }}"
                                                    alt="users avatar"
                                                    class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer img-container img-thumbnail"
                                                    height="90" width="90" />
                                                <div class="media-body mt-50">
                                                    <div class="col-12 d-flex mt-1 px-0">
                                                        <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                            <span class="d-none d-sm-block">Add</span>
                                                            <input class="form-control" type="file" name="logo" id="change-picture"
                                                            hidden accept="image/png, image/jpeg, image/jpg" />
                                                            {{-- <input class="form-control" name="logo" id="change-picture"
                                                                type="file" hidden accept="image/png, image/jpeg, image/jpg"
                                                                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"> --}}
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
                                                            aria-describedby="itemname" placeholder="Item English Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="itemname">Item Arabic Name</label>
                                                        <input type="text" name="title_ar" class="form-control"
                                                            id="itemname" aria-describedby="itemname"
                                                            placeholder="Item Arabic Name" />
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
        </div>
    </div>
@endsection
