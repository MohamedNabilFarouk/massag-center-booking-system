@extends('admin.layouts.master')

@section('content')
  <!-- users edit start -->
                <section class="app-user-edit">
                    <div class="card">
                        <h5 class="card-header">إنشاء موظف جديد</h5>
                        
                    </div>
                    <div class="card">
                        <a href="admin/{{$module}}" class="btn btn-theme04"><i class="fa fa-backward"></i>الرجوع</a>
                        <div class="card-body">
                            <div class="tab-content">
                        {!! Form::model($row, ['url' => 'admin/'.$module.'/create', 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}
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
