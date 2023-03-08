{!! Form::hidden("admin_id",App\Libs\Adminauth::user()->id,['class'=>'form-control']) !!}
@php $input='email'; @endphp
<div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="name">{{trans('admin.Email')}}<em class='red'>*</em></label>

    <div class="col-md-6">
        {!! Form::text($input,null,['class'=>'form-control']) !!}
        @foreach($errors->get($input) as $message)
        <span class = 'help-inline text-danger'>{{ $message }}</span>
        @endforeach
    </div>
</div>
@if(\App\Libs\ACL::can('publish-'.$module))
@php $input='published'; @endphp
<div class="form-group">
    <label class="col-md-2 control-label" for="name">{{trans('admin.Published')}}</label>

    <div class="col-md-10">
        <label class="checkbox-inline">
            {!! Form::radio($input,1,null,[]) !!} {{trans("admin.Yes")}}
        </label>
        <label class="checkbox-inline">
            {!! Form::radio($input,0,null,[]) !!} {{trans("admin.No")}}
        </label>
    </div>
</div>
@endif
