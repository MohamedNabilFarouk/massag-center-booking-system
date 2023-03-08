{!! Form::hidden("admin_id",App\Libs\Adminauth::user()->id,['class'=>'form-control']) !!}
{!! Form::hidden("slug",@$row->sulg,['class'=>'form-control']) !!}


@php $input='title'; @endphp
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="name">{{trans('Title En')}}<em class='red'>*</em></label>
                {!! Form::text($input,@$row->$input,['class'=>'form-control']) !!}

            </div>
        </div>
        @php $input='title_ar'; @endphp
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="name">{{trans('Title Ar')}} <em class='red'>*</em></label>
                {!! Form::text($input,@$row->$input,['class'=>'form-control']) !!}

            </div>
        </div>

        @php $input='main_image'; @endphp
        <div class="col-md-4">
            <div class="form-group">
                <label class="" for="name">{{trans('Image')}} <em class='red'>*</em></label>
                {!! Form::file($input,['class'=>'form-control fileinput','accept'=>'image/*','data-show-preview'=>'false','data-allowed-file-extensions'=>'["jpg","gif", "png","jpeg"]']) !!}
                {{-- {!!viewValue(url($row->$input),'image')!!} --}}
                <img src="{{asset('/uploads/'.$row->main_image)}}" width="100">
                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>

        <div class="col-md-12">
            <hr>
<br>
<h3>{{trans('SEO')}} : {{trans('Search Engine Optmization')}}</h3>

        </div>
        <div class="row">

        @php $input='meta_description'; @endphp
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="name">{{trans('description')}} <em class='red'>*</em></label>
                {!! Form::textarea($input,@$row->$input,['class'=>'form-control']) !!}

            </div>
        </div>
        @php $input='meta_keywords'; @endphp
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="name">{{trans('admin.Meta keywords')}}</label>
                {!! Form::textarea($input,@$row->$input,['class'=>'form-control']) !!}

            </div>
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
