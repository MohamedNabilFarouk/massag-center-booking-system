{!! Form::hidden("admin_id",App\Libs\Adminauth::user()->id,['class'=>'form-control']) !!}

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
        @php $input='order_field'; @endphp
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="name">{{trans('admin.Order')}} <em class='red'>*</em></label>
                {!! Form::number($input,@$row->$input,['class'=>'form-control','min'=>1]) !!}

            </div>
        </div>
        @php $input='summary'; @endphp
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="name">{{trans('admin.Content')}} <em class='red'>*</em></label>
                {!! Form::textarea($input,@$row->$input,['class'=>'form-control']) !!}

            </div>
        </div>
        @php $input='summary_ar'; @endphp
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
        <div class="col-md-4">
            <div class="form-group">
                <label for="published">Published</label>
                <select class="form-control" name="published" id="published">
                    <option value="1" {{ (@$row->published) == '1' ? 'selected' : '' }}>Published</option>
                    <option value="0" {{ (@$row->published) == '0' ? 'selected' : '' }}>Unpublished</option>
                </select>
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
