                    @php
                    $govs = \App\Models\Gov::all()->pluck("title","id");
                    @endphp
         <!-- Account Tab starts -->
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- users edit media object start -->
                                    <div class="media mb-2">
                                        <img src="@if(@$row->profile_img) {{url('uploads/admin_images/'.$row->profile_img)}} @else new-admin/app-assets/images/avatars/2.png @endif" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90" />
                                        <div class="media-body mt-50">
                                            <h4>آختر الصورة الشخصية</h4>
                                            <div class="col-12 d-flex mt-1 px-0">
                                                <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                    <span class="d-none d-sm-block">Browse</span>
                                                    <input class="form-control" name="profile_img" type="file" id="change-picture" hidden accept="image/png, image/jpeg, image/jpg" />
                                                    <span class="d-block d-sm-none">
                                                        <i class="mr-0" data-feather="edit"></i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->
                                    <form class="form-validate">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">اسم الموظف<em class='red'>*</em></label>
                                                    @php $input='name'; @endphp
                                                    {!! Form::text($input,null,['class'=>'form-control',"placeholder"=>"الاسم بالكامل","required"]) !!}
                                                    @foreach($errors->get($input) as $message)
                                                    <span class = 'help-inline text-danger'>{{ $message }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="mobile">رقم الهاتف<em class='red'>*</em></label>
                                                    @php $input='mobile'; @endphp
                                                    {!! Form::text($input,null,['class'=>'form-control',"placeholder"=>"01111111111","required"]) !!}
                                                    @foreach($errors->get($input) as $message)
                                                    <span class = 'help-inline text-danger'>{{ $message }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="mobile">البريد الالكتروني<em class='red'>*</em></label>
                                                    @php $input='email'; @endphp
                                                    {!! Form::email($input,null,['class'=>'form-control',"placeholder"=>"example@example.com","required"]) !!}
                                                    @foreach($errors->get($input) as $message)
                                                    <span class = 'help-inline text-danger'>{{ $message }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="role_id">الوظيفة</label>
                                                    @php $input='role_id'; @endphp
                                                    {!! Form::select($input, $roles, null, ['class' => 'select2 form-control','placeholder'=>"أختر"]) !!}

                                                    @foreach($errors->get($input) as $message)
                                                    <span class = 'help-inline text-danger'>{{ $message }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="role_id">المحافظة</label>
                                                  @php $input='gov_id'; @endphp
                                                            {!! Form::select($input, $govs, null, ['id'=>'gov_id','class' => ' form-control']) !!}


                                                    @foreach($errors->get($input) as $message)
                                                    <span class = 'help-inline text-danger'>{{ $message }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="role_id">المدينة</label>
                                                    @php $input='city_id'; @endphp
                                                            {!! Form::select($input, [], null, ['required'=>'required','id'=>'city_id','class' => ' form-control']) !!}


                                                    @foreach($errors->get($input) as $message)
                                                    <span class = 'help-inline text-danger'>{{ $message }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="basic-icon-default-uname">تأكيد الرمز السري</label>
                                            <div class="input-group input-group-merge form-password-toggle">

                                            @php $input='password_confirmation'; @endphp 
                                            {!! Form::password($input,['aria-describedby'=>'login-password','class'=>'form-control form-control-merge','placeholder'=>"&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"]) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                            </div>

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="basic-icon-default-uname">تأكيد الرمز السري</label>
                                            <div class="input-group input-group-merge form-password-toggle">

                                            @php $input='password_confirmation'; @endphp 
                                            {!! Form::password($input,['aria-describedby'=>'login-password','class'=>'form-control form-control-merge','placeholder'=>"&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"]) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                            </div>

                                            @foreach($errors->get($input) as $message)
                                            <span class = 'help-inline text-danger'>{{ $message }}</span>
                                            @endforeach
                                            </div>
                                            
                                            @if(App\Libs\ACL::can('publish-'.$module))
                                            @php $input='published'; @endphp
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="published">مفعل؟</label>
                                                    <br />
                                                    <label class="checkbox-inline">
                                                        {!! Form::radio($input,1,null,[]) !!} نعم
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        {!! Form::radio($input,0,null,[]) !!} لا
                                                    </label>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                <button style="z-index:1231231;" type="submit" class="btn btn-primary">حفظ</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit account form ends -->
                                </div>
                                <!-- Account Tab ends -->



@section('javascripts')
<script>

   $(document).on('change', '#gov_id', function() {
        var id = $(this).val();
        $.get( "{{url('/admin/cities/cities-by-gov/')}}/"+id, function( data ) {
            console.log(data);
          
            $("#city_id").html("");
            var options="";
            for(var i=0;i<data.length;i++){
                options += "<option value='"+data[i].id+"'>"+data[i].title+"</option>";
            }
            $("#city_id").append(options);
        });
   });
   
    var id = $('#gov_id').val();
        $.get( "{{url('/admin/cities/cities-by-gov/')}}/"+id, function( data ) {
            console.log(data);
          
            $("#city_id").html("");
            var options="";
            for(var i=0;i<data.length;i++){
                options += "<option value='"+data[i].id+"'>"+data[i].title+"</option>";
            }
            $("#city_id").append(options);
        });
</script>
@stop