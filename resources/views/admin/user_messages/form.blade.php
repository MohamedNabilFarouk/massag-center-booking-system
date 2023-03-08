@php $input='user_id[]'; @endphp
<div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
    {!! Form::rawLabel($input,"اختر الموظفين"."",['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select($input, $banks, null, ["multiple",'class' => 'select2 form-control']) !!}
        @foreach($errors->get($input) as $message)
        <span class = 'help-inline text-danger'>{{ $message }}</span>
        @endforeach
    </div>
</div>

@php $input='all'; @endphp
<div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
    {!! Form::rawLabel($input,"او اختر الكل",['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        <input type="radio"  name="all" value="all">

        @foreach($errors->get($input) as $message)
        <span class = 'help-inline text-danger'>{{ $message }}</span>
        @endforeach
    </div>
</div>


@php $input='message'; @endphp
<div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
    {!! Form::rawLabel($input,"الرسالة"."<em class='red'>*</em>",['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea($input,null,['class'=>' form-control']) !!}
        @foreach($errors->get($input) as $message)
        <span class = 'help-inline text-danger'>{{ $message }}</span>
        @endforeach
    </div>
</div>


@section('javascripts')
<script type="text/javascript">
  $(document).ready(function () {
    $(".select2").select2();
  });
</script>
@stop
