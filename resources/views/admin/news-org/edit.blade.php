@extends('admin.layouts.master')

@section('title')
<h3><i class="fa fa-angle-right"></i>{{ trans('admin.Edit') }} {{trans("admin.News")}}</h3>
<a href="{{url('admin')}}/{{$module}}" class="btn btn-theme04"><i class="fa fa-backward"></i> {{trans('admin.Go back')}}</a>
@stop

@section('content')
{!! Form::model($row, ['url' => 'admin/'.$module.'/edit/'.$row->id, 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}

@include('admin.'.$module.'.form',$row)
{!! Form::submit(trans('admin.Save') ,['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@stop
