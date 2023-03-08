@extends('admin.layouts.master')

@section('title')
<h3><i class="fa fa-angle-right"></i>{{ trans('admin.Create') }} {{trans("admin.News")}}</h3>
<a href="{{url('admin')}}/{{$module}}" class="btn btn-theme04"><i class="fa fa-backward"></i> {{trans('admin.Go back')}}</a>
@stop
{{-- @include('admin.includes.messages') --}}
@section('content')

{!! Form::model($row, ['url' => app()->getLocale().'/admin/'.$module.'/create', 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}
@include('admin.'.$module.'.form',$row)
{!! Form::submit(trans('Save') ,['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@stop
