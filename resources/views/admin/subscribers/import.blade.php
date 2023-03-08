@extends('admin.layouts.master')

@section('title')
<h3><i class="fa fa-angle-right"></i>{{ trans('admin.Import') }} {{trans("admin.Subscribers")}}</h3>
<a href="{{url('admin')}}/{{$module}}" class="btn btn-theme04"><i class="fa fa-backward"></i> {{trans('admin.Go back')}}</a><br><br>
@stop

@section('content')
{!! Form::model($row, ['url' => url('admin').'/'.$module.'/import', 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}


{!! Form::hidden("admin_id",App\Libs\Adminauth::user()->id,['class'=>'form-control']) !!}
@php $input='import_file'; @endphp
<div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
    {!! Form::rawLabel($input,trans('admin.Import file')."<em class='red'>*</em>",['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file($input,['class'=>'form-control','accept'=>'.xlsx, .xls']) !!}
        @foreach($errors->get($input) as $message)
        <span class = 'help-inline text-danger'>{{ $message }}</span>
        @endforeach
    </div>
</div>



{!! Form::submit(trans('admin.Save') ,['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@stop
