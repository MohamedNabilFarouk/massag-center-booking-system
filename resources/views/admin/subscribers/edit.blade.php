@extends('admin.layouts.master')
@section('content')

                <section class="app-user-edit">
				<div class="card">
                        <h5 class="card-header">Create Subscriber</h5>
                                <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/subscribers">List Subscriber </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Create Subscriber</li>
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
                                    action="{{ url('admin/subscribers/edit/'.$row->id) }}" enctype="multipart/form-data">
                                    @method('POST')

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Email</label>
                                                <input type="text" class="form-control" placeholder="Email"
                                                  value="{{@$row->email}}" name="email" id="name" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="published">Published</label>
                                                <select class="form-control" name="published" id="published">
                                                    <option value="1" {{ (@$row->published) == '1' ? 'selected' : '' }}>Published</option>
                                                    <option value="0" {{ (@$row->published) == '0' ? 'selected' : '' }}>Unpublished</option>
                                                </select>
                                            </div>
                                        </div>

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
