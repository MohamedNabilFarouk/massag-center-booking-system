@extends('admin.layouts.master')

@section('content')
       <!-- users edit start -->
                <section class="app-user-edit">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills" role="tablist">
                          
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                        <i data-feather="user"></i><span class="d-none d-sm-block">اعدادات الحسابات</span>
                                    </a>
                                </li>
                               
                                
                            </ul>
                            {!! Form::model(null, ['url' => 'admin/'.$module.'/edit-task', 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}

                            <div class="tab-content">

                              

                                <!-- Account Tab starts -->
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">

                                    <!-- users edit account form start -->
                                        <div class="row">
                                            @php $input='minus' @endphp
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="username">قيم جزاء التاخير بالجنية</label>
                                                    {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            @php $input='bonus_maintenance' @endphp
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">تسعيرة حافز مهمة الصيانة</label>
                                                    {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                          
                                          @php $input='bonus_feeding' @endphp
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">تسعيرة حافز مهمة التغذية</label>
                                                    {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                {!! Form::submit("حفظ",['class' => 'btn btn-primary']) !!}
                                            </div>
                                        </div>
                                    <!-- users edit account form ends -->
                                </div>
                                <!-- Account Tab ends -->

                            </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->
@stop
