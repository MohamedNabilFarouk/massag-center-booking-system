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
                        <h5 class="card-header">عرض الرسائل المرسلة للفنيين</h5>
                    </div>
                    <!-- users filter end -->
                    <!-- list section start -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            @if(App\Libs\ACL::can('create-'.$module))
                            <a href="admin/{{$module}}/create"  class="add-new btn btn-primary mt-50">إرسال رسالة جديدة<i class="fa fa-plus"></i></a>
                            @endif
                            <table class="user-list-table table">
                                <thead class="thead-light">
                                    <tr>
                                        <tr>
                                            <th>الرسالة</th>
                                            <th>الموظف</th>
                                            <th>تاريخ الانشاء</th>
                                            <th>إجراءات</th>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rows as $row)
                                    <tr>
                                        <td class="center">{{@$row->message}}</td>
                                        <td class="center">
                                            @if($row->user_id == 0)
                                            للجميع
                                            @else
                                                {{@$row->user->name}}
                                            @endif
                                            </td>
                                        <td class="center">{{$row->created_at}}</td>
                                        <td class="center">
                                          <a class="btn btn-primary btn-xs" href="ar/admin/{{$module}}/view/{{@$row->user_id}}" title="عرض">
                                            <i class="fa fa-eye"></i>
                                          </a>
                                          <a class="btn btn-danger btn-xs" href="admin/{{$module}}/delete/{{@$row->id}}" title="مسح" >
                                              <i class="fa fa-trash-o"></i>
                                          </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <!-- list section end -->
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
