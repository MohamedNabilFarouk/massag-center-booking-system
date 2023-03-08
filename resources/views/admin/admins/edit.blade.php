@extends('admin.layouts.master')


@section('content')
  <!-- users edit start -->
                <section class="app-user-edit">
                    <div class="card">
                        <h5 class="card-header">Edit Employee</h5>
                                <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/{{$module}}">List Employees </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
                                        </ol>
                                    </nav>
                                </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                        {!! Form::model($row, ['url' => url('admin').$module.'/edit/'.$row->id, 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}
                        @include('admin.'.$module.'.form',$row)
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
