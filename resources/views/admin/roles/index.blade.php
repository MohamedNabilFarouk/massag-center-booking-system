@extends('admin.layouts.master')
@section('styles')
@stop

@section('content')
<!-- users list start -->
                <section class="app-user-list">
                    <!-- users filter start -->
                    <div class="card">
                        <h5 class="card-header">Jobs List</h5>
                    </div>
                    <!-- users filter end -->
                    <!-- list section start -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            @if(App\Libs\ACL::can('create-'.$module))
                            <a type="button" data-toggle="modal" data-target="#modals-slide-in"   class="add-new btn btn-primary mt-50">Add New Job<i class="fa fa-plus"></i></a>
                            @endif
                            <table class="user-list-table table">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="25%">Job Name</th>
                                        <th width="25%">Procedures</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rows as $row)
            <tr>
                <td class="center">{{$row->name}}</td>
                <td class="center">
                    @if(App\Libs\ACL::can('edit-'.$module))
                    <a class="btn btn-success btn-xs edit" href="{{url('admin')}}/{{$module}}/edit/{{@$row->id}}" type="button" data-toggle="modal" data-target="#modals-slide-in-edit"  data-id="{{@$row->id}}"  data-title="{{@$row->name}}" data-desc="{{@$row->description}}" title="تعديل">
                        <i data-feather="edit"></i>
                    </a>
                    @endif
                    @if(App\Libs\ACL::can('delete-'.$module))
                    <a class="btn btn-danger btn-xs" href="{{url('admin')}}/{{$module}}/delete/{{@$row->id}}" title="مسح">
                         <i data-feather="trash-2"></i>
                    </a>
                    @endif

                    @if(App\Libs\ACL::can('permissions-'.$module))
                    <a class="btn btn-primary btn-xs" href="{{url('admin')}}/{{$module}}/permissions/{{@$row->id}}" title="تعديل الصلاحيات" >
                         <i data-feather="eye"></i>
                    </a>
                    @endif


                </td>
            </tr>
            @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- list section end -->


                     <!-- Modal to add new user starts-->
                        <div class="modal fade " id="modals-slide-in">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                {!! Form::model(null, ['url' => 'admin/'.$module.'/create', 'method' => 'post','class'=>'add-new-user modal-content pt-0 style-form','enctype'=>'multipart/form-data'] ) !!}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel16">New Job</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-fullname">Job Title </label>
                                            @php $input='name'; @endphp
                                            {!! Form::text($input,null,['class'=>'form-control dt-full-name',"placeholder"=>"Sales","required"]) !!}

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-uname">Description</label>
                                            @php $input='description'; @endphp
                                            {!! Form::textarea($input,null,['class'=>'form-control', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>

                                        <br />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">Save</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- Modal to add new user Ends-->


                     <!-- Modal to add new user starts-->
                     <div class="modal fade " id="modals-slide-in-edit">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                {!! Form::model(null, ['url' => 'admin/'.$module.'/edit', 'method' => 'post','class'=>'add-new-user modal-content pt-0 style-form','enctype'=>'multipart/form-data','id'=>'editform'] ) !!}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="myModalLabel16">Edit Job</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-fullname">job Title </label>
                                            @php $input='name'; @endphp
                                            {!! Form::text($input,null,["id"=>"formtitle",'class'=>'form-control dt-full-name',"placeholder"=>"مدير عام","required"]) !!}

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-uname">Description</label>
                                            @php $input='description'; @endphp
                                            {!! Form::textarea($input,null,["id"=>"formdesc",'class'=>'form-control', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>

                                        <br />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">Save</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- Modal to add new user Ends-->
                </section>
                <!-- users list ends -->
@stop

@section('javascripts')
  <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    <!-- BEGIN: Page Vendor JS-->

    <script>
        $('.user-list-table').DataTable();

        $(".edit").on("click",function(){
            $("#formtitle").val( $(this).attr("data-title"));
            $("#formdesc").val( $(this).attr("data-desc"));
            $("#editform").attr("action",'{{url("admin")}}/{{$module}}/edit/'+$(this).attr("data-id"))
        });

    </script>
    <!-- END: Page Vendor JS-->
@stop
