@extends('admin.layouts.master')

@section('content')
  <!-- users edit start -->
                <section class="app-user-edit">
                    <div class="card">
                        <h5 class="card-header">Edit Account Info </h5>
                        
                    </div>
                    <div class="card">
                        <a href="admin/{{$module}}" class="btn btn-theme04"><i class="fa fa-backward"></i>الرجوع</a>
                        <div class="card-body">
                            <div class="tab-content">
                        {!! Form::model($row, ['url' => 'admin/'.$module.'/edit-account', 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}
@php $input='name'; @endphp
<div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
	<label for="itemname">Name</label>
    <div class="col-md-6">
        {!! Form::text($input,null,['class'=>'form-control']) !!}
        @foreach($errors->get($input) as $message)
        <span class = 'help-inline text-danger'>{{ $message }}</span>
        @endforeach
    </div>
</div>
@php $input='email'; @endphp
<div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
	<label for="itemname">Email</label>
    <div class="col-md-6">
        {!! Form::email($input,null,['class'=>'form-control']) !!}
        @foreach($errors->get($input) as $message)
        <span class = 'help-inline text-danger'>{{ $message }}</span>
        @endforeach
    </div>
</div>
@php $input='profile_img'; @endphp
<div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
	<label for="itemname">Profile Pic</label>
    <div class="col-md-4">
        {!! Form::file($input,['class'=>'form-control']) !!}
        <img src="uploads/admin_images/{{@$row[$input]}}" height="50">
        @foreach($errors->get($input) as $message)
        <span class = 'help-inline text-danger'>{{ $message }}</span>
        @endforeach
    </div>
</div>
{!! Form::submit("Save",['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->
@stop

@section('javascripts')
<script>
    $(document).ready(function () {
  $(".select2").select2();
  });
</script>
@stop
