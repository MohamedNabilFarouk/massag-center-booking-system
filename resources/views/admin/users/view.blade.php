@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/css-rtl/pages/app-user.css">
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="new-admin/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="new-admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="new-admin/app-assets/css-rtl/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="new-admin/app-assets/css-rtl/plugins/forms/pickers/form-pickadate.css">
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/css-rtl/pages/app-invoice-list.css">
<link rel="stylesheet" type="text/css" href="new-admin/app-assets/css-rtl/pages/app-user.css">

 <section class="app-user-view">
                    <!-- User Card & Plan Starts -->
                    <form>
                      <div class="row">
                                <div class="col-lg-4 form-group">
                                  <input type="text" required name="msg" placeholder="نص الرسالة" class="form-control">
                                </div>
                             
                                <div class="col-lg-4 form-group">
                                    
                                  <button class="btn btn-primary" type="submit">ارسال رسالة نصية للفني</button>
                                </div>
                          </div>
                      </form
                      
                    <form>
                      <div class="row">
                                <div class="col-lg-4 form-group">
                                    من
                                  <input type="text" name="fromdate" placeholder="YYYY-m-d" class="form-control flatpickr-basic">
                                </div>
                                <div class="col-lg-4 form-group">
                                    الي
                                  <input type="text" name="todate" placeholder="YYYY-m-d" class="form-control flatpickr-basic">
                                </div>
                                <div class="col-lg-1 form-group">
                                    <br>
                                  <button class="btn btn-primary" type="submit">عرض</button>
                                </div>
                          </div>
                      </form>

                    <div class="row">
                        <!-- User Card starts-->
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card user-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                            <div class="user-avatar-section">
                                                <div class="d-flex justify-content-start">
                                                    <img class="img-fluid rounded" src="{{url('uploads/'.$row->profile_img)}}" height="104" width="104" alt="User avatar" />
                                                    <div class="d-flex flex-column ml-1">
                                                        <div class="user-info mb-1">
                                                            <h4 class="mb-0">{{$row->name}}</h4>
                                                            <span class="card-text">{{$row->mobile}}</span>
                                                        </div>
                                                        <div class="d-flex flex-wrap">
                                                            <a href="admin/{{$module}}/edit/{{$row->id}}" class="btn btn-primary">تعديل</a>
                                                            <a href="admin/{{$module}}/delete/{{$row->id}}" class="btn btn-outline-danger ml-1">مسح</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											@php
											$start = null;
											$end = null;
											if(Request::input("fromdate") && Request::input("todate")){
												$start = Request::input("fromdate") . " 00:00:00";
												$end = Request::input("todate") . " 23:59:59";
											}
											@endphp
                                            <div class="d-flex align-items-center user-total-numbers">
                                                <div class="d-flex align-items-center mr-2">
                                                    <div class="color-box bg-light-primary">
                                                        <i data-feather="activity" class="text-primary"></i>
                                                    </div>
                                                    <div class="ml-1">
                                                        <h5 class="mb-0">
														@if($start && $end)
															{{App\Models\Task::latest()->whereBetween("created_at",[$start,$end])->where('user_id', $row->id)->count()}}
														@else
															{{App\Models\Task::latest()->where('user_id', $row->id)->count()}}
														@endif
														</h5>
                                                        <small>اجمالي المهمات</small>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center ">
                                                    <div class="color-box bg-light-success">
                                                        <i data-feather="activity" class="text-success"></i>
                                                    </div>
                                                    <div class="ml-1">
                                                        <h5 class="mb-0">
														@if($start && $end)
															{{App\Models\Task::latest()->whereBetween("created_at",[$start,$end])->where('user_id', $row->id)->where("status","!=",0)->count()}}
														@else
															{{App\Models\Task::latest()->where('user_id', $row->id)->where("status","!=",0)->count()}}
														@endif
														</h5>
                                                        <small>المهمات المنتهية</small>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center ">
                                                    <div class="color-box bg-light-success">
                                                        <i data-feather="activity" class="text-success"></i>
                                                    </div>
                                                    <div class="ml-1">
                                                        <h5 class="mb-0">
														@if($start && $end)
															{{App\Models\Task::latest()->whereBetween("created_at",[$start,$end])->where('user_id', $row->id)->where("task_date",1)->where("status","!=",0)->count()}}
														@else
															{{App\Models\Task::latest()->where('user_id', $row->id)->where("task_date",1)->where("status","!=",0)->count()}}
														@endif
														</h5>
                                                        <small>المهمات المنتهية صيانة</small>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center ">
                                                    <div class="color-box bg-light-success">
                                                        <i data-feather="activity" class="text-success"></i>
                                                    </div>
                                                    <div class="ml-1">
                                                        <h5 class="mb-0">
														@if($start && $end)
															{{App\Models\Task::latest()->whereBetween("created_at",[$start,$end])->where('user_id', $row->id)->where("task_date",2)->where("status","!=",0)->count()}}
														@else
															{{App\Models\Task::latest()->where('user_id', $row->id)->where("task_date",2)->where("status","!=",0)->count()}}
														@endif
														</h5>
                                                        <small>المهمات المنتهية تغذية</small>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="color-box bg-light-success">
                                                        <i data-feather="activity" class="text-danger"></i>
                                                    </div>
                                                    <div class="ml-1">
                                                        <h5 class="mb-0">
														@if($start && $end)
															{{App\Models\Task::latest()->whereBetween("created_at",[$start,$end])->where('user_id', $row->id)->where("is_late","!=",0)->where("status","!=",0)->count()}}
														@else
															{{App\Models\Task::latest()->where('user_id', $row->id)->where("is_late","!=",0)->where("status","!=",0)->count()}}
														@endif
														
														</h5>
                                                        <small>المهمات المنتهية بتاخير</small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                            <div class="user-info-wrapper">
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">العنوان</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$row->address}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="check" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">مفعل؟</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{($row->published)?"نعم":"لا"}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="star" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">تاريخ التسجيل</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$row->created_at}}</p>
                                                </div>
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="flag" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">المناطق</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{implode(",",\App\Models\Area::whereIn("id",explode(",",$row->area_id))->get()->pluck("title")->toArray())}}</p>
                                                </div>
                                               
                                               <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="flag" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">الفرع</span>
                                                    </div>
                                                    <p class="card-text mb-0">{{$row->branch->title}}</p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex align-items-center user-total-numbers">
                                                <div class="d-flex align-items-center mr-2">
                                                    <div class="color-box bg-light-primary">
                                                        <i data-feather="activity" class="text-primary"></i>
                                                    </div>
                                                    <div class="ml-1">
                                                        <h5 class="mb-0">
														
														0
														</h5>
                                                        <small> منتهية بدون تاخير</small>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mr-2">
                                                    <div class="color-box bg-light-success">
                                                        <i data-feather="trending-down" class="text-danger"></i>
                                                    </div>
                                                    <div class="ml-1">
                                                        <h5 class="mb-0">
														@if($start && $end)
															{{App\Models\Task::latest()->whereBetween("created_at",[$start,$end])->where('user_id', $row->id)->where("is_late","!=",0)->where("status","!=",0)->count() * getConfigs()["minus"]}}
														@else
															{{App\Models\Task::latest()->where('user_id', $row->id)->where("is_late","!=",0)->where("status","!=",0)->count() * getConfigs()["minus"]}}
														@endif
														
														</h5>
                                                        <small>اجمالي الجزاءات</small>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mr-2">
                                                    <div class="color-box bg-light-success">
                                                        <i data-feather="trending-up" class="text-success"></i>
                                                    </div>
                                                    <div class="ml-1">
                                                        <h5 class="mb-0">
														@if($start && $end)
															{{App\Models\Task::latest()->whereBetween("created_at",[$start,$end])->where('user_id', $row->id)->where("is_late","==",0)->where("status","!=",0)->count() * getConfigs()["bonus"]}}
														@else
															{{App\Models\Task::latest()->where('user_id', $row->id)->where("is_late","==",0)->where("status","!=",0)->count() * getConfigs()["bonus"]}}
														@endif
													
														</h5>
                                                        <small>اجمالي المكافئات</small>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card Ends-->

                    </div>
                    <!-- User Card & Plan Ends -->
                    <h3>المدن و الحوافز</h3>
                    @php
                    $cityTasks=null;
                    if($start && $end){
						$cityTasks = \App\Models\Task::whereBetween("task_date",[$start,$end])->where('user_id', $row->id)->get();
					}else{
					    $cityTasks = \App\Models\Task::where('user_id', $row->id)->get();
                   }
                    
                    $cityTaskIds = $cityTasks->pluck("id")->toArray();
                    $taskAtms = \App\Models\TaskAtms::whereIn("task_id",$cityTaskIds)->get();
                    $taskAtmsIds = $taskAtms->pluck("atm_id")->toArray();
                    $atms = \App\Models\Atm::whereIn("id",$taskAtmsIds)->get();
                    $areaIds = $atms->pluck("area_id")->toArray();
                    $areas=\App\Models\Area::whereIn("id",$areaIds)->get();
                    $citisIds = $areas->pluck("city_id")->toArray();
                    $cities = \App\Models\City::whereIn("id",$citisIds)->get();
                    
                    @endphp
                    <!-- User Invoice Starts-->
                    <div class="row invoice-list-wrapper">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-datatable table-responsive">
                                    <table class="invoice-list-table table datatable">
                                        <thead>
                                            <th >المدينة</th>
                                            <th>الحافز</th>
                                            <th >عدد المهمات</th>
                                            <th >اجمالي الحافز</th>
                                        </thead>
                                        <tbody>
                                    @foreach ($cities as $city)
                                    <tr>
                                       
                                        <td class="center">{{$city->title}}</td>
                                        <td class="center">{{$city->incentive}}</td>
                                        <td class="center">{{$city->title}}</td>
                                        <td class="center">{{$city->title}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /User Invoice Ends-->
                    
                    <h3>المهمات</h3>
              
                    <!-- User Invoice Starts-->
                    <div class="row invoice-list-wrapper">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-datatable table-responsive">
                                    <table class="invoice-list-table table datatable">
                                        <thead>
                                            <th >نوع المهمة</th>
                                            <th >تاريخ المهمة</th>
                                            <th >الحالة</th>
                                            <th >وقت بدء الخدمة</th>
                                            <th >وقت انهاء الخدمة</th>
                                            <th >تاخير؟</th>
                                            <th width="30%">إجراءات</th>
                                        </thead>
                                        <tbody>
                                    @foreach ($rows as $row)
                                    <tr>
                                        <td class="center">
                                            @if(@$row->task_type == 1)
                                            صيانة
                                            @else
                                            تغذية و ارتجاع
                                            @endif
                                        </td>
                                        <td class="center">{{$row->task_date}}</td>
                                        <td class="center">
                                          @if($row->status == 0)
                                          تم انشاء المهمة
                                          @elseif($row->status == 1)
                                          تم الموفقة من قبل المدير
                                          @elseif($row->status == 2)
                                          تم انهاء المهمة من قبل الموظف
                                          @endif
                                        </td>
                                         <td class="center">{{$row->started_time}}</td>
                                        <td class="center">{{$row->end_time}}</td>
                                        <td class="center">
                                            @if($row->status != 0)
                                             @if($row->is_late == 0)
                                             مكافأة
                                             @else
                                             تأخير
                                             @endif
                                            @else
                                             لم تبدأ بعد
                                            @endif
                                        </td>
                                        <td class="center">
                                            @if(App\Libs\ACL::can('view-'.$module))
                                            <a class="btn btn-primary btn-xs" href="admin/tasks/view/{{@$row->id}}" title="عرض">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @endif
                                    
                                            @if(App\Libs\ACL::can('delete-'.$module))
                                            <a class="btn btn-danger btn-xs" href="admin/tasks/delete/{{@$row->id}}" title="مسح">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /User Invoice Ends-->
                    
                    
                     <h3>التنقلات بين الفروع</h3>
              
                    <!-- User Invoice Starts-->
                    <div class="row invoice-list-wrapper">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-datatable table-responsive">
                                    <table class="invoice-list-table table datatable">
                                        <thead>
                                            <th > اسم الفرع</th>
                                            <th >تاريخ النقل</th>
                                            
                                        </thead>
                                        <tbody>
                                 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /User Invoice Ends-->
                </section>

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
        <script src="new-admin/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="new-admin/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="new-admin/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="new-admin/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="new-admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="new-admin/app-assets/js/scripts/forms/pickers/form-pickers.js"></script>

    <script>
        $('.datatable').DataTable();
    </script>
    <!-- END: Page Vendor JS-->
@stop
