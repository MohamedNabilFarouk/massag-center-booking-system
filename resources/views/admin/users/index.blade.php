@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/css-rtl/pages/app-user.css">
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
@stop

@section('content')
<!-- users list start -->
                <section class="app-user-list">
                    <!-- users filter start -->
                    <div class="card">
                        <h5 class="card-header">عرض الفنيين</h5>
                    </div>
                    <!-- users filter end -->
                    <!-- list section start -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            @if(App\Libs\ACL::can('create-'.$module))
                            <a  data-toggle="modal" data-target="#modals-slide-in"  ><button class="add-new btn btn-primary mt-50"> <i class="fa fa-plus"></i> إضافة فني جديد</button></a>
                            @endif
                            <table class="user-list-table table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>الأسم</th>
                                        <th>رقم الفني</th>
                                                                                <th>الفرع</th>

                                        <th>تاريخ الانشاء</th>
                                        @if(isset($rows[0]->published))
                                        @if(App\Libs\ACL::can('publish-'.$module))
                                        <th>مفعل?</th>
                                        @endif
                                        @endif
                                        <th>إجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rows as $row)
                                    <tr>
                                        <td class="center">{{$row->name}}</td>
                                        <td class="center">{{$row->mobile}}</td>
                                                                                <td class="center">{{$row->branch->title}}</td>

                                        <td class="center">{{$row->created_at}}</td>
                                        @if(isset($row->published))
                                        @if(App\Libs\ACL::can('publish-'.$module))
                                        <td class="center">
                                            @if (@$row->published == 1)
                                            <a href="admin/{{$module}}/publish/0/{{@$row->id}}"><img src="assets/admin/img/check.png"></a>
                                            @else
                                            <a href="admin/{{$module}}/publish/1/{{@$row->id}}"><img src="assets/admin/img/close.png"></a>
                                            @endif
                                        </td>
                                        @endif
                                        @endif
                                        <td class="center">
                                          
                                            @if(App\Libs\ACL::can('view-'.$module))
                                            <a class="btn btn-success btn-xs" href="admin/{{$module}}/view/{{@$row->id}}" title="عرض ملف الفني">
                                                <i class="fa fa-eye"></i>
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
                        <div class="modal modal-slide-in  fade" id="modals-slide-in">
                            <div class="modal-dialog">
                                {!! Form::model(null, ['url' => 'admin/'.$module.'/create', 'method' => 'post','class'=>'add-new-user modal-content pt-0 style-form','enctype'=>'multipart/form-data'] ) !!}
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">فني جديد</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-fullname">اسم الفني بالكامل</label>
                                            @php $input='name'; @endphp
                                            {!! Form::text($input,null,['class'=>'form-control dt-full-name',"placeholder"=>"الاسم بالكامل","required"]) !!}

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-fullname">كود الفني : </label>
                                            @php $input='code'; @endphp
                                            {!! Form::text($input,null,['class'=>'form-control dt-full-name',"placeholder"=>" الكود الوظيفي ","required"]) !!}

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>
                                             <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-fullname">الرقم القومي : </label>
                                            @php $input='national_id'; @endphp
                                            {!! Form::text ($input,null,['class'=>'form-control dt-full-name',"placeholder"=>"الرقم القومي ","required"]) !!}

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-uname">رقم الهاتف</label>
                                            @php $input='mobile'; @endphp
                                            {!! Form::text($input,null,["pattern"=>"01[0-9]{9}",'class'=>'form-control dt-uname',"placeholder"=>"01111111111","required"]) !!}

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-uname">الرمز السري</label>

                                            <div class="input-group input-group-merge form-password-toggle">

                                            {!! Form::password('password',['aria-describedby'=>'login-password','required'=>'required','class'=>'form-control form-control-merge','placeholder'=>"&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"]) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>

                                        </div>
                                            @foreach($errors->get("password") as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-uname">تأكيد الرمز السري</label>
                                            <div class="input-group input-group-merge form-password-toggle">

                                            @php $input='password_confirmation'; @endphp 
                                            {!! Form::password($input,['aria-describedby'=>'login-password','required'=>'required','class'=>'form-control form-control-merge','placeholder'=>"&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"]) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                            </div>

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="user-role">المناطق</label>
                                             @php $input='area_id[]'; @endphp
                                            {!! Form::select($input, $areas, null, ["multiple",'class' => 'select2 form-control']) !!}

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="user-role">الفرع</label>
                                             @php $input='branch_id'; @endphp
                                            {!! Form::select($input, $branches, null, ['class' => 'select2 form-control']) !!}

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>
                                        <div class="demo-inline-spacing">
                                            <label class="form-label" for="user-role">مفعل؟</label>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" value="1" id="customRadio1" name="published" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="customRadio1">نعم</label>
                                            </div>
                                            <div class="custom-control custom-control-danger custom-radio">
                                                <input type="radio" value="0" id="customRadio2" name="published" class="custom-control-input" />
                                                <label class="custom-control-label" for="customRadio2">لا</label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="user-plan">الصورة الشخصية</label>
                                            {!! Form::file("profile_img",['class'=>'form-control']) !!}

                                            @foreach($errors->get("profile_img") as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="employment_file">رفع نموذج التعين </label>
                                            {!! Form::file("employment_file",['class'=>'form-control']) !!}

                                            @foreach($errors->get("employmentـfile") as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">حفظ</button>
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
    <script src="new-admin/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="new-admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="new-admin/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="new-admin/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="new-admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="new-admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
    <script src="new-admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    
    <script>
        $('.user-list-table').DataTable();
    </script>
    <!-- END: Page Vendor JS-->
@stop
