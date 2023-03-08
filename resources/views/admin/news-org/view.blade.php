@extends('admin.layouts.master')

@section('title')
<h3><i class="fa fa-angle-right"></i>{{ trans('admin.View') }} {{trans("admin.News")}}</h3>
<a href="admin/{{$module}}" class="btn btn-danger"><i class="fa fa-backward"></i> {{trans('admin.Go back')}}</a>
@stop

@section('content')
@if(\App\Libs\ACL::can('edit-'.$module))
<a href="{{url('/admin')}}/{{$module}}/edit/{{$row->id}}" class="btn btn-primary">
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
            <td width="25%" class="align-left">{{trans('admin.Date')}}</td>
            <td width="75%" class="align-left">{{$row->post_date}}</td>
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Summary')}}</td>
            <td width="75%" class="align-left">{{$row->summary}}</td>
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Content')}}</td>
            <td width="75%" class="align-left">{!!$row->content!!}</td>
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Main image')}}</td>
            <td width="75%" class="align-left">
                @if($row->main_image)
                <img src="{{$row->main_image}}" style="width:10%">
                @endif
            </td>
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Other images')}}</td>
            {{-- <td width="75%" class="align-left">
                @if($row->other_images)
                    @foreach($row->other_images as $key=>$value)
                        <img src="uploads/small/{{$value}}">
                    @endforeach
                @endif
            </td> --}}
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Published')}}</td>
            <td width="75%" class="align-left">{{($row->published)?trans('admin.Yes'):trans('admin.No')}}</td>
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Meta description')}}</td>
            <td width="75%" class="align-left">{{$row->meta_description}}</td>
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Meta keywords')}}</td>
            <td width="75%" class="align-left">{{$row->meta_keywords}}</td>
        </tr>
        <tr>
            <td width="25%" class="align-left">{{trans('admin.Created at')}}</td>
            <td width="75%" class="align-left">{{$row->created_at}}</td>
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
@stop
