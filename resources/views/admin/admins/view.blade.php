@extends('admin.layouts.master')


@section('content')
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/css-rtl/pages/app-invoice-list.css">
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/css-rtl/pages/app-user.css">


 <section class="app-user-view">
                    <!-- User Card & Plan Starts -->
                    <div class="row">
                        <!-- User Card starts-->
                        <div class="col-xl-12 col-lg-12 col-md-12">
						<div class="card">
                        <h5 class="card-header">View Employee</h5>
                                <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/{{$module}}">List Employees </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">View Employee</li>
                                        </ol>
                                    </nav>
                                </div>
                    </div>
					
                            <div class="card user-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                            <div class="user-avatar-section">
                                                <div class="d-flex justify-content-start">
                                                    <img class="img-fluid rounded" src="{{url('uploads/admin_images/'.$row->profile_img)}}" height="104" width="104" alt="User avatar" />
                                                    <div class="d-flex flex-column ml-1">
                                                        <div class="user-info mb-1">
                                                            <h4 class="mb-0">{{@$row->name}}</h4>
                                                            <span class="card-text">{{@$row->mobile}}</span>
                                                        </div>
                                                        <div class="d-flex flex-wrap">
                                                            <a href="{{url('admin')}}/{{$module}}/edit/{{$row->id}}" class="btn btn-primary">تعديل</a>
                                                            <a href="{{url('admin')}}/{{$module}}/delete/{{$row->id}}" class="btn btn-outline-danger ml-1">مسح</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       
                                        </div>
                                        <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                            <div class="user-info-wrapper">
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">بريد الكتروني</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{@$row->email}}</p>
                                                </div>
                                              
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="check" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">مفعل؟</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{(@$row->published)?"نعم":"لا"}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="star" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">تاريخ التسجيل</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{@$row->created_at}}</p>
                                                </div>
                                                @if(@$row->super_admin)
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">الصلاحيات</span>
                                                    </div>
                                                    <p class="card-text mb-0">موظف التطبيق الاساسي له كل الصلاحيات</p>
                                                </div>
                                                @else
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">الصلاحيات</span>
                                                    </div>
                                                    <p class="card-text mb-0"><a href="{{url('admin')}}/roles/permissions/{{$row->role_id}}">{{@$row->job->name}}</a></p>
                                                </div>
                                                @endif
                                               
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card Ends-->

                    </div>
                    <!-- User Card & Plan Ends -->

                    @if(!$row->super_admin)
                      <h3>Permissions</h3>
                      @php
                        $permissions = \App\Models\Permission::all();
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
                        @if($final_roles)
                        <div class="control-group">
                            <div class="table-responsive">
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
                                                {!! Form::checkbox('heades[]',1,null,['class'=>'heads main_head_'.str_replace(' ','',$key),'id'=>$key,'for'=>str_replace(' ','',$key)]) !!} {{ucfirst($key)}}
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

                </section>

@stop

@section('javascripts')
  <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    <!-- BEGIN: Page Vendor JS-->

    <script>
        $('.datatable').DataTable();
    </script>
    <!-- END: Page Vendor JS-->

    <script>
    var arr= {!! json_encode($row->job->permissions->toArray(),true) !!};
    for(i=0;i<arr.length;i++){
      console.log('#role_'+arr[i].pivot.role_id);
      $('#role_'+arr[i].pivot.permission_id).trigger('click');
    }

    $('table input[type=checkbox]').attr('disabled','true');
</script>
@stop
