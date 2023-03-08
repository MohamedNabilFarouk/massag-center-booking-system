@extends('admin.layouts.master')

@section('content')
@include('admin.includes.messages')

  <!-- users edit start -->
                <section class="app-user-edit">
                    <div class="card">
                        <h5 class="card-header">Change Password</h5>

                    </div>
                    <div class="card">
                        <a href="{{url('/admin/dashboard')}}" class="btn btn-theme04"><i class="fa fa-backward"></i>الرجوع</a>
                        <div class="card-body">
                            <div class="tab-content">
{!! Form::model($row, ['url' => 'admin/'.$module.'/change-password', 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}

@php $input='old_password'; @endphp
<div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
	<label for="itemname">Old Password</label>

    <div class="col-md-6">
        {!! Form::password($input,['class'=>'form-control','required'=>'required']) !!}
        @foreach($errors->get($input) as $message)
        <span class = 'help-inline text-danger'>{{ $message }}</span>
        @endforeach
    </div>
</div>
@php $input='password'; @endphp
<div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
	<label for="itemname">New Password</label>
    <div class="col-md-6">
        {!! Form::password($input,['class'=>'form-control']) !!}
        @foreach($errors->get($input) as $message)
        <span class = 'help-inline text-danger'>{{ $message }}</span>
        @endforeach
    </div>
</div>
@php $input='password_confirmation'; @endphp
<div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
	<label for="itemname">New Password Confirmation</label>
    <div class="col-md-6">
        {!! Form::password($input,['class'=>'form-control']) !!}
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
