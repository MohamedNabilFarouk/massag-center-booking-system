{!! Form::hidden("admin_id",App\Libs\Adminauth::user()->id,['class'=>'form-control']) !!}
@if(Request::is('admin/paragraphs/create'))
@php $input='page_id'; @endphp
<div class="form-group {{$errors->has($input) ? 'has-error' : '' }}">
    <label class="" for="name">{{trans('admin.Page')}}<em class='red'>*</em></label>
    <div class="col-md-6">
        {!! Form::select($input, @$pages, null, ['class' => 'form-control','placeholder'=>trans('admin.Choose')]) !!}
        @foreach($errors->get($input) as $message)
        <span class = 'help-inline text-danger'>{{ $message }}</span>
        @endforeach
    </div>
</div>
@else
{!! Form::hidden("page_id",@$row->page_id,['class'=>'form-control']) !!}
@endif
@php $input='title'; @endphp
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="name">{{trans('admin.Title')}}<em class='red'>*</em></label>
                {!! Form::text($input,@$row->$input,['class'=>'form-control']) !!}

            </div>
        </div>
        @php $input='title_ar'; @endphp
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="name">{{trans('admin.Title')}} Arabic<em class='red'>*</em></label>
                {!! Form::text($input,@$row->$input,['class'=>'form-control']) !!}

            </div>
        </div>

        @php $input='content'; @endphp
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="name">{{trans('admin.Content')}} <em class='red'>*</em></label>
                {!! Form::textarea($input,@$row->$input,['class'=>'form-control']) !!}

            </div>
        </div>
        @php $input='content_ar'; @endphp
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="name">{{trans('admin.Content')}} Arabic<em class='red'>*</em></label>
                {!! Form::textarea($input,@$row->$input,['class'=>'form-control']) !!}

            </div>
        </div>

        @php $input='main_image'; @endphp
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="name">{{trans('admin.Main Image')}} <em class='red'>*</em></label>
                {!! Form::file($input,['class'=>'form-control fileinput','accept'=>'image/*','data-show-preview'=>'false','data-allowed-file-extensions'=>'["jpg","gif", "png","jpeg"]']) !!}
                {!!viewValue($row->$input,'image')!!}
                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>

@section('javascripts')
<script>
    $('.style-form').validate({
        rules: {
            'big_image': {
            extension: "jpg,jpeg,png,gif",
                filesize: 4000000
                @if (Request::is('admin/'.$module.'/create*'))
                , required: true
                @endif
            },
            'small_image': {
            extension: "jpg,jpeg,png,gif",
                filesize: 4000000
                @if (Request::is('admin/'.$module.'/create*'))
                , required: true
                @endif
            }
        },
        messages: {
            'big_image': {
                extension: "Only png,jpg,jpeg file is allowed!",
                    filesize: "The file(s) selected exceed the file size limit"
                    @if (Request::is('admin/'.$module.'/create*'))
                    , required: "The field is required"
                    @endif
                },
            'small_image': {
                extension: "Only png,jpg,jpeg file is allowed!",
                filesize: "The file(s) selected exceed the file size limit"
                @if (Request::is('admin/'.$module.'/create*'))
                , required: "The field is required"
                @endif
            }

        }
    });
</script>
@stop

