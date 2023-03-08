@extends('admin.layouts.master')
@section('content')

                <section class="app-user-edit">
				<div class="card">
                        <h5 class="card-header">View Page</h5>
                                <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/pages">List Pages </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">View Page</li>
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
                                @if(\App\Libs\ACL::can('edit-'.$module))
<a href="{{url('admin')}}/{{$module}}/edit/{{$row->id}}" class="btn btn-primary">
    <i class="fa fa-edit"></i> {{trans('admin.Edit')}}
</a><br>
@endif
<div class="table-responsive">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered pull-left">
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Title')}}</td>
            <td width="75%" class="align-left">{{$row->title}}</td>
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Main image')}}</td>
            <td width="75%" class="align-left">
                @if($row->main_image)
                    <img src="uploads/small/{{$row->main_image}}">
                @endif
            </td>
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Meta Description')}}</td>
            <td width="75%" class="align-left">{{$row->meta_description}}</td>
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Meta Keywords')}}</td>
            <td width="75%" class="align-left">{{$row->meta_keywords}}</td>
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Updated at')}}</td>
            <td width="75%" class="align-left">{{$row->updated_at}}</td>
        </tr>
        @if(@$row->admin->name)
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Created by')}}</td>
            <td width="75%" class="align-left">{{@$row->admin->name}}</td>
        </tr>
        @endif
    </table>
</div>
                                <!-- users edit account form ends -->
                            </div>
                        </div>
                </section>

@endsection
