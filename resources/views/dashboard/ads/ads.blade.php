@extends('layouts.layout')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
</head>
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#new-task-modal"
                style="width: 200px;">
                Add advertisements
            </button>
            <!-- Congratulations Card -->
            <div class="content-body">
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
                <section class="app-user-view">
                    <div class="row mt-3">

                        @foreach ($ads as $ad)
                            <div class="col-md-6 col-12">
                                <div class="card"
                                    style=" background-image:url({{ $ad->image }});  background-repeat: no-repeat;  background-size: cover;">
                                    <div class="card-body d-flex justify-content-start flex-column">
                                        <div class="d-flex justify-content-between align-items-center mb-4">

                                            <div class="custom-control custom-switch">
                                                {{-- <input type="checkbox" class="custom-control-input"
                                                    {{ $ad->is_active == 1 ? ' checked' : '' }} id="{{$ad->id}}" name = "is_active"/> --}}
                                                <input type="checkbox" data-id="{{ $ad->id }}" name="is_active"
                                                    class="js-switch" {{ $ad->is_active == 1 ? 'checked' : '' }}>
                                                {{-- <label class="custom-control-label"
                                                    for="{{$ad->id}}"></label> --}}
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="d-flex justify-content-start mx-2"
                                                    style="background-color: #0f0f0f5b; width: 140px; border-radius: 10px;">
                                                    <strong class="text-white text-center w-100"
                                                        style="padding: 5px;">{{ $ad->updated_at }}</strong>
                                                </div>
                                                <div class="dropdown my-auto">
                                                    <a href="javascript:void(0);" class="dropdown-toggle hide-arrow mr-1"
                                                        id="todoActions" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i data-feather="more-vertical" class="font-medium-2 text-body"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                        aria-labelledby="todoActions">
                                                        <a class="dropdown-item" href="{{ route('ads.edit', $ad->id) }}">
                                                            <i data-feather="edit" class="align-middle mr-50"></i>
                                                            <span class="align-middle">Edit</span>
                                                        </a>

                                                        {!! Form::open(['method' => 'DELETE', 'url' => route('ads.destroy', $ad->id), 'style' => 'display:inline']) !!}

                                                        {!! Form::button('<i data-feather="trash-2" class="align-middle mr-50"></i>delete', ['type' => 'submit', 'class' => 'btn btn-defult', 'title' => 'Delete ', 'onclick' => 'return confirm("Confirm delete?")']) !!}

                                                        {!! Form::close() !!}


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <div class="d-flex justify-content-start"
                                                style="background-color: rgb(38, 148, 111); width: 140px; border-radius: 10px;">
                                                <strong
                                                    class="text-white text-center w-100 py-1">{{ $ad->title }}</strong>
                                            </div>
                                            <div class="d-flex justify-content-start mt-1">
                                                <h3 class="mb-1 text-black text-break">{{ $ad->description }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
        <!--/ Congratulations Card -->
        <!-- Dynamic Pagination with reload starts -->
        <div class="col-12 d-flex justify-content-center">
            {{-- <ul class="pagination url1-links my-1"></ul> --}}
            {{ $ads->links('pagination::bootstrap-4') }}
        </div>
        <!-- Dynamic Pagination with reload ends -->
        <div class="content-body">
            <div class="body-content-overlay"></div>
            <div class="todo-app-list">
                <!-- Right Sidebar starts -->
                <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
                    <div class="modal-dialog sidebar-lg">
                        <div class="modal-content p-0">

                            <form method="post" action="{{ route('ads.store') }}" enctype="multipart/form-data"
                                id="form-modal-todo" class="todo-modal needs-validation">
                                @csrf
                                <div class="modal-header align-items-center mb-1">
                                    <h5 class="modal-title">Add</h5>
                                    <div class="todo-item-action d-flex align-items-center justify-content-between ml-auto">
                                        <span class="todo-item-favorite cursor-pointer mr-75"><i data-feather="star"
                                                class="font-medium-2"></i></span>
                                        <button type="button" class="close font-large-1 font-weight-normal py-0"
                                            data-dismiss="modal" aria-label="Close">
                                            ×
                                        </button>
                                    </div>
                                </div>
                                <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                    <div class="action-tags">
                                        {{-- <div class="media mb-2">
                                        <img src="../../../app-assets/images/avatars/placeholder.png"
                                            alt="users avatar"
                                            class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer img-container img-thumbnail"
                                            height="90" width="200" />
                                        <div class="media-body mt-50">
                                            <div class="col-12 d-flex mt-1 px-0">
                                                <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                    <span class="d-none d-sm-block">Add</span>
                                                    <input class="form-control" type="file" id="change-picture"
                                                        hidden accept="image/png, image/jpeg, image/jpg" />
                                                    <span class="d-block d-sm-none">
                                                        <i class="mr-0" data-feather="plus-square"></i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}
                                        <div class="media mb-2">
                                            <img src="{{ asset('my-assets/app-assets/images/avatars/placeholder.png') }}"
                                                alt="users avatar"
                                                class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer img-container img-thumbnail"
                                                height="90" width="200" />
                                            <div class="media-body mt-50">
                                                <div class="col-12 d-flex mt-1 px-0">
                                                    <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                        <span class="d-none d-sm-block">Add</span>
                                                        <input class="form-control" type="file" name="image"
                                                            id="change-picture" hidden
                                                            accept="image/png, image/jpeg, image/jpg" />
                                                        <span class="d-block d-sm-none">
                                                            <i class="mr-0" data-feather="plus-square"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title" class="form-label">English Title</label>
                                            <input type="text" id="title" name="title"
                                                class="new-todo-item-title form-control" placeholder="Title" />
                                        </div>
                                        <div class="form-group">
                                            <label for="title_ar" class="form-label">Arabic Title</label>
                                            <input type="text" id="title_ar" name="title_ar"
                                                class="new-todo-item-title form-control" placeholder="Title Ar" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">English Description</label>
                                            <textarea name="description" id="event-description-editor"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Arabic Description</label>
                                            <textarea name="description_ar" id="event-description-editor"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="link" class="form-label">Link</label>
                                            <input type="text" id="link" name="link"
                                                class="new-todo-item-title form-control" placeholder="Link" />
                                        </div>
                                        <div class="form-group">
                                            <label for="expiry_date" class="form-label">Due Date</label>
                                            <input type="datetime-local" class="form-control task-due-date"
                                                id="task-due-date" name="expiry_date" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-1">
                                    <button type="submit" class="btn btn-primary add-todo-item ml-1">Add</button>
                                    <button type="button" class="btn btn-outline-secondary add-todo-item"
                                        data-dismiss="modal">
                                        Cancel
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Sidebar ends -->
        </div>
    </div>

    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html, {
                size: 'small'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-switch').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let userId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('Active') }}',
                    data: {
                        'is_active': status,
                        'id': userId
                    },
                    success: function(data) {
                        console.log(data.message);
                    }
                });
            });
        });
    </script>
@endsection
