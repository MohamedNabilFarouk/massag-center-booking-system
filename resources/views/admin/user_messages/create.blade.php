@extends('admin.layouts.master')

@section('content')
  <!-- users edit start -->
                <section class="app-user-edit">
                    <div class="card">
                        <h5 class="card-header">إرسال رسالة لفني</h5>
                        <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="admin/dashboard">الرئيسية</a></li>
                                            <li class="breadcrumb-item"><a href="admin/{{$module}}">عرض الرسائل</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">ارسال رسالة</li>
                                        </ol>
                                    </nav>
                                </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                        {!! Form::model($row, ['url' => 'admin/'.$module.'/create', 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}
                        @include('admin.'.$module.'.form',$row)
                        {!! Form::submit("حفظ" ,['class' => 'btn btn-primary']) !!}

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
