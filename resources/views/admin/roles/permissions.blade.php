@extends('admin.layouts.master')

@section('content')
  <!-- users edit start -->
                <section class="app-user-edit">
                    <div class="card">
                        <h5 class="card-header">Job Permissions</h5>
                        <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/{{$module}}">Jobs List</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Job Permissions</li>
                                        </ol>
                                    </nav>
                                </div>
                    </div>
                    <style media="screen">
                    label {
                      font-weight: 200;
                    }
                    </style>
                    @php
                    if (@$permissions) {
                        $final_roles = array();
                        $category = "";
                        foreach ($permissions as $role) {
                            if ($category != $role->category) {
                                $category = $role->category;
                                unset($value);
                            }
                            $key = $role->category;
                            $value[$role->id] = $role->title;
                            $final_roles[$key] = $value;
                        }
                    }
                    @endphp

                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                        {!! Form::model($row, ['url' => url('admin/'.$module).'/permissions/'.$row->id, 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}
                       <div class="clearfix"></div>
                        @if($final_roles)
                        <div class="control-group">
                            <label class="control-label" for="permissions">
                                <h3>الصلاحيات
                                </h3>
                            </label>
                        </div>
                        
                        @if($final_roles)
                        <div class="control-group">
                            <div class="table-responsive">
                              <label >
                                  <input id="selectAll" for="Paragraphs" name="selectAll" type="checkbox" value="1">
                                  Select All
                              </label>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered display resize ">
                                    <thead>
                                        <tr>
                                            <th width="20%">Module</th>
                                            <th width="80%">Actions</th>
                                        </tr>
                                    </thead>
                                    @foreach ($final_roles as $key => $value)
                                    <tr>
                                        <td>
                                            <label class="control-label role_head">
                                                {!! Form::checkbox('heades[]',1,null,['class'=>'heads main_head_'.str_replace(' ','',$key),'id'=>$key,'for'=>str_replace(' ','',$key)]) !!} &nbsp;&nbsp;&nbsp;&nbsp;{{ucfirst($key)}}
                                            </label>
                                        </td>
                                        <td>
                                            @foreach ($value as $k => $v)
                        
                                                <label class=" control-label" for="role_{{$k}}">{!! Form::checkbox('role_list[]',$k,null,['class'=>'childs head_'.str_replace(' ','',$key),'id'=>'role_'.$k,'for'=>str_replace(' ','',$key)]) !!} {{ucfirst($v)}}</label>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        @endif
                        @endif
                        <div class="clearfix"></div>
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
    $(function () {
        $("#selectAll").change(function () {
            if ($(this).is(':checked')) {
                $('.heads, .childs').prop('checked', true);
            } else {
                $('.heads, .childs').prop('checked', false);
            }
            console.log("yes");
        });
        $(".heads").change(function () {
            var key = $(this).attr("for");
            console.log(".head_" + key);
            $(".head_" + key).prop('checked', $(this).prop("checked"));
        });
        $(".childs").change(function () {
            var head = $(this).attr("for");
            if ($(this).is(':checked')) {
                $('.main_head_' + head).prop('checked', true);
            } else {
                if ($(".head_" + head + ":checked").size() == 0) {
                    $('.main_head_' + head).prop('checked', false);
                }
            }
        });
        $(".childs").each(function (index) {
            var head = $(this).attr("for");
            if ($(this).is(':checked')) {
                $('.main_head_' + head).prop('checked', true);
            } else {
                if ($(".head_" + head + ":checked").size() == 0) {
                    $('.main_head_' + head).prop('checked', false);
                }
            }
        });
    });


    var arr= {!! json_encode($row->permissions->toArray(),true) !!};
    for(i=0;i<arr.length;i++){
      console.log('#role_'+arr[i].pivot.role_id);
      $('#role_'+arr[i].pivot.permission_id).trigger('click');
    }
</script>
@stop
