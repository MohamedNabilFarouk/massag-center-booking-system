@extends('admin.layouts.master')
@section('content')

                <section class="app-user-edit">
				<div class="card">
                        <h5 class="card-header">Edit Customer</h5>
                                <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/customers">List Customers </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
                                        </ol>
                                    </nav>
                                </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
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
                                <!-- users edit media object ends -->
                                <!-- users edit account form start -->
                                <form method="post"
                                    action="{{ url('admin/customers/edit/'. $customer->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- users edit media object start -->
                                    <div class="media mb-2">
                                        @if ($customer->profile_img == null)
                                        <img src="{{ asset('my-assets/app-assets/images/avatars/placeholder.png') }}" alt="users avatar"
                                            class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer"
                                            height="90" width="90"  />
                                            @else
                                        <img src="{{ $customer->profile_img }}" alt="users avatar"
                                            class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer"
                                            height="90" width="90"  />
                                            @endif
                                        <div class="media-body mt-50">
                                            <h4>{{ $customer->name }}</h4>
                                            <div class="col-12 d-flex mt-1 px-0">
                                                <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                    <span class="d-none d-sm-block">Change</span>
                                                    <input class="form-control" name="profile_img"  type="file" id="change-picture" hidden
                                                        accept="image/png, image/jpeg, image/jpg" />
                                                    <span class="d-block d-sm-none">
                                                        <i class="mr-0" data-feather="edit"></i>
                                                    </span>
                                                </label>
                                                {{-- <button class="btn btn-outline-secondary d-none d-sm-block">Remove</button>
                                                <button class="btn btn-outline-secondary d-block d-sm-none">
                                                    <i class="mr-0" data-feather="trash-2"></i>
                                                </button> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" placeholder="Username"
                                            value="" name="name" id="username" />
                                    </div>
                                </div> --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" placeholder="Name"
                                                    value="{{ $customer->name }}" name="name" id="name" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="mobile">Mobile</label>
                                                <input type="text" class="form-control" placeholder="Mobile"
                                                    value="{{ $customer->mobile }}" name="mobile" id="mobile" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="published">Published</label>
                                                <select class="form-control" name="published" id="published">
                                                    <option value="1" {{ ($customer->published) == '1' ? 'selected' : '' }}>Published</option>
                                                    <option value="0" {{ ($customer->published) == '0' ? 'selected' : '' }}>Unpublished</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" value="WinDon Technologies Pvt Ltd"
                                            placeholder="Company name" id="company" />
                                    </div>
                                </div> --}}
                                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                            <button type="submit" id="upload"
                                        class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit account form ends -->
                            </div>
                        </div>
                </section>
 
@endsection
