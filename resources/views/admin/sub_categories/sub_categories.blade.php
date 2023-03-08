@extends('admin.layouts.master')
@section('content')

<div class="card">
                        <h5 class="card-header">{{\App\Models\Category::where("id",$category_id)->first()->title}} Sub Categories</h5>
                                <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/categories">Categories </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">{{\App\Models\Category::where("id",$category_id)->first()->title}} Sub Categories</li>
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
                            </div>

                            <div class="card-body">
                                <form method="post" action="{{ url('admin/sub-categories/create') }}" enctype="multipart/form-data"
                                    class="invoice-repeater">
                                    @csrf
                                    <div >
                                        <div>
                                           
                                            <div class="row d-flex align-items-end">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="itemname">Item English Name</label>
                                                        <input type="text" class="form-control" id="itemname"
                                                            aria-describedby="itemname" placeholder="Item English Name" name="title" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="itemname">Item Arabic Name</label>
                                                        <input type="text" class="form-control" id="itemname"
                                                            aria-describedby="itemname" placeholder="Item Arabic Name" name="title_ar" />
                                                    </div>
                                                </div>
												<div class="col-md-4 col-12">
												 <div class="media mb-2">
                                                <img src="{{ asset('my-assets/app-assets/images/avatars/placeholder.png') }}"
                                                    alt="users avatar"
                                                    class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer img-container img-thumbnail"
                                                    height="90" width="90" />
                                                <div class="media-body mt-50">
                                                    <div class="col-12 d-flex mt-1 px-0">
                                                        <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                            <span class="d-none d-sm-block">Add</span>
                                                            <input class="form-control" type="file" id="change-picture"
                                                                hidden accept="image/png, image/jpeg, image/jpg" name="logo" />
                                                            <span class="d-block d-sm-none">
                                                                <i class="mr-0" data-feather="plus-square"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
												</div>
                                                <input type="hidden" class="form-control" id="itemname"
                                                            aria-describedby="itemname" placeholder="Item Arabic Name" name="category_id"
                                                           value="{{ $category_id }}"  />
                                                {{-- <div class="col-md-2 col-12 mb-50">
                                                    <div class="form-group">
                                                        <button class="btn btn-outline-danger text-nowrap px-1"
                                                            data-repeater-delete type="button">
                                                            <i data-feather="x" class="mr-25"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <hr />
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                <i data-feather="plus" class="mr-25"></i>
                                                <span>Add Sub Category</span>
                                            </button>
                                        </div>
                                    </div> --}}
                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                        <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                            Changes</button>
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
        <div class="content-body">
		
                <!-- app e-commerce details start -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <!-- Related Products starts -->
                        <div class="card-body">
                            <div class="mt-4 mb-2 text-center">
                                <h4>Sub Categories</h4>
                            </div>
                            <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                                <div class="swiper-wrapper">



                                    @foreach ($sub_categories as $sub_category)
                                        <div class="swiper-slide col-6 mx-2">
                                            <a href="javascript:void(0)">
                                                <div
                                                    class="item-heading d-flex w-100 justify-content-between align-items-center">
                                                    <h5 class="text-truncate mb-0">{{ $sub_category->title }}</h5>
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
                                                            <a class="dropdown-item" href="{{ url('admin/sub-categories/view/'.$sub_category->id) }}">
                                                                <i data-feather="eye" class="align-middle mr-50"></i>
                                                                <span class="align-middle">Preview</span>
                                                            </a>
                                                            <a class="dropdown-item" href="{{ url('admin/sub-categories/edit/'.$sub_category->id)  }}">
                                                                <i data-feather="edit" class="align-middle mr-50"></i>
                                                                <span class="align-middle">Edit</span>
                                                            </a>
                                                            <a class="dropdown-item" href="{{ url('admin/sub-categories/delete/'.$sub_category->id)  }}">
                                                                <i data-feather="trash-2" class="align-middle mr-50"></i>
                                                                <span class="align-middle">Delete</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="img-container w-50 mx-auto py-75">
                                                    <img src="{{ $sub_category->logo }}" class="img-fluid"
                                                        alt="image" />
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <label class="invoice-Stutes-title mb-0" for="categoryStutes1"></label>
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
				
           


@endsection
