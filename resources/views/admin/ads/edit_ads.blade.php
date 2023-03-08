@extends('admin.layouts.master')

@section('content')

            <div class="body-content-overlay"></div>
            <div class="content-wrapper">
                <div class="col-12">
				<div class="card">
                        <h5 class="card-header">Edit Ads</h5>
                                <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/ads">List Ads </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit Ads </li>
                                        </ol>
                                    </nav>
                                </div>
                    </div>
					
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{url('admin/ads/edit'.'/'.$ads->id)}}" class="todo-modal needs-validation" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                                <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                    <div class="action-tags">
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
                                        <div class="media mb-2">
                                            <img src="{{$ads->image}}"
                                                alt="users avatar"
                                                class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer img-container img-thumbnail"
                                                height="90" width="200" />
                                            <div class="media-body mt-50">
                                                <div class="col-12 d-flex mt-1 px-0">
                                                    <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                        <span class="d-none d-sm-block">Add</span>
                                                        <input class="form-control" type="file" name="image" id="change-picture"
                                                            hidden accept="image/png, image/jpeg, image/jpg" />
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
                                                    <label for="title" class="form-label">English
                                                        Title</label>
                                                        <input type="text" id="title" name="title"
                                                        class="new-todo-item-title form-control"
                                                        placeholder="Title" value="{{$ads->title}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="title_ar" class="form-label">Arabic
                                                        Title</label>
                                                        <input type="text" id="title_ar" name="title_ar"
                                                        class="new-todo-item-title form-control"
                                                        placeholder="Title" value="{{$ads->title_ar}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="link" class="form-label">Link</label>
                                                        <input type="text" id="link" name="link"
                                                        class="new-todo-item form-control"
                                                        placeholder="link" value="{{$ads->link}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="expiry_date" class="form-label">Due Date</label>
                                                    <input type="datetime-local" class="form-control task-due-date"
                                                        id="task-due-date" name="expiry_date" value="{{ date('Y-m-d\TH:i', strtotime($ads->expiry_date)) }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="form-label">English Description</label>
                                                    <textarea name="description"
                                                        id="event-description-editor"
                                                        class="form-control">{{$ads->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Arabic Description</label>
                                                    <textarea name="description_ar"
                                                        id="event-description-editor"
                                                        class="form-control">{{$ads->description_ar}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-1">
                                    <button type="submit" class="btn btn-primary add-todo-item ml-1">Save</button>
                                    {{-- <button type="button" class="btn btn-outline-secondary add-todo-item"
                                        data-dismiss="modal">
                                        Cancel
                                    </button> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Sidebar ends -->

@endsection
