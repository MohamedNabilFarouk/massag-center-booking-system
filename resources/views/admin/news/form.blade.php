<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
{{-- @if($errors)
    {{$errors}}


@endif --}}
{{-- @dd(app()->getLocale()); --}}
{!! Form::hidden("admin_id",App\Libs\Adminauth::user()->id,['class'=>'form-control']) !!}

<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#content" aria-controls="home" role="tab" data-toggle="tab">{{trans("admin.Main content")}}</a></li>
    <li role="presentation"><a href="#media" aria-controls="profile" role="tab" data-toggle="tab">{{trans("admin.Media")}}</a></li>
    <li role="presentation"><a href="#seo" aria-controls="messages" role="tab" data-toggle="tab">{{trans("admin.SEO")}}</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="content">
        @php $input='title'; @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            <label class="" for="name">{{trans('Title En')}}<em class='red'>*</em></label>
            <div class="col-md-6">
                {!! Form::text($input,null,['class'=>'form-control']) !!}
                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>
        @php $input='title_ar'; @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            <label class="" for="name">{{trans('Title Ar')}} <em class='red'>*</em></label>
            <div class="col-md-6">
                {!! Form::text($input,null,['class'=>'form-control']) !!}
                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>

        @php $input='post_date'; @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            <label class="" for="name">{{trans('Date')}}<em class='red'>*</em></label>
            <div class="col-md-6">
                {!! Form::text($input,null,['class'=>'datePicker form-control']) !!}
                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>

        @php $input='summary'; @endphp
        <textarea style="display: none" id="summaryElement"  name="summary"></textarea>

        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            <label class="" for="name">{{trans('Summary En')}}<em class='red'>*</em></label>
            <div class="col-md-10">
                <div id="summaryEditor">
                    {!! $row->$input !!}
                </div>

                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>

        @php $input='summary_ar'; @endphp
        <textarea style="display: none" id="summaryArElement"  name="summary_ar"></textarea>

        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            <label class="" for="name">{{trans('Summary Ar')}}<em class='red'>*</em></label>
            <div class="col-md-10">
                <div id="summaryArEditor">
                    {!! $row->$input !!}
                </div>

                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>



        @php $input='content'; @endphp
        <textarea style="display: none" id="contentElement" name="content"></textarea>

        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            <label class="" for="name">{{trans('Content En')}}<em class='red'>*</em></label>
            <div class="col-md-10">
                <div id="contentEditor">
                    {!! $row->$input !!}
                </div>

                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>

        @php $input='content_ar'; @endphp
        <textarea style="display: none" id="contentArElement" name="content_ar"></textarea>

        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            <label class="" for="name">{{trans('Content Ar')}}<em class='red'>*</em></label>
            <div class="col-md-10">
                <div id="contentArEditor">
                    {!! $row->$input !!}
                </div>

                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>
        @php $input='main_image'; @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            <label class="" for="name">{{trans('Image')}}<em class='red'>*</em></label> {{trans("front.jpg,png,jpeg")}}, {{trans("front.Allowed max file size 4MB")}} {{trans("admin.Recommended resolution")}} 600x480
            <div class="row">
            <div class="col-md-5">
                {!! Form::file($input,['class'=>'form-control fileinput','accept'=>'image/*','data-show-preview'=>'false','data-allowed-file-extensions'=>'["jpg", "png","jpeg"]']) !!}
                {!!viewValue($row->$input,'image')!!}

                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
            {{-- @if(Request::url()== url('admin').'/news/edit/'.$row->id)

            <div class="col-md-3">
                <img class="me-3 rounded" src="{{$row->main_image}}" alt width="100px" height="100px">
            </div>
            @endif --}}
            @if($row->id != null)
            <div class="col-md-3">
                <img class="me-3 rounded" src="{{$row->main_image}}" alt width="100px" height="100px" >
            </div>
            @endif
        </div>
        </div>

        @php $input='published'; @endphp
        <div class="form-group">
            <label class="" for="name">{{trans('Published')}}<em class='red'>*</em></label>
            <div class="col-md-10">
                <label class="checkbox-inline">
                    {!! Form::radio($input,1,null,[]) !!} {{trans("Yes")}}
                </label>
                <label class="checkbox-inline">
                    {!! Form::radio($input,0,null,[]) !!} {{trans("No")}}
                </label>
            </div>
        </div>

    </div>
    <div role="tabpanel" class="tab-pane" id="media">

        @php $input='images'; @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            <label class="" for="name">{{trans('admin.Othe images')}}<em class='red'>*</em></label> {{trans("front.jpg,png,jpeg")}}, {{trans("front.Allowed max file size 4MB")}} {{trans("admin.Recommended resolution")}} 600x480
            <div class="col-md-4">
                {!! Form::file('images[]',['class'=>'form-control fileinput','multiple'=>true,'accept'=>'image/*','data-show-preview'=>'false','data-allowed-file-extensions'=>'["jpg", "png","jpeg"]']) !!}
                <div class="clearfix"></div>
                @if($row->other_images)
                <div class="row">
                    @foreach($row->other_images as $key=>$value)
                    {!!viewValue($value,'more_images',['url'=>'admin/news/delete-image/'.$value])!!}
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="seo">
        @php $input='meta_description'; @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            <label class="" for="name">{{trans('admin.Meta Description')}}<em class='red'>*</em></label>
            <div class="col-md-6">
                {!! Form::textarea($input,null,['class'=>'form-control']) !!}
                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>

        @php $input='meta_keywords'; @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            <label class="" for="name">{{trans('admin.Meta keywords')}}<em class='red'>*</em></label>
            <div class="col-md-6">
                {!! Form::text($input,null,['class'=>'form-control tags']) !!}
                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>

@section('javascripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>

<script>
var options = {
   modules: {
       imageResize: {
              displaySize: true // default false
            },
    toolbar: [
        [{ font: [] }],
        [{ header: [1, 2, 3, 4, 5, 6, false] }],
        ["bold", "italic", "underline", "strike"],
        [{ color: [] }, { background: [] }],
        [{ script:  "sub" }, { script:  "super" }],
        ["blockquote", "code-block"],
        [{ list:  "ordered" }, { list:  "bullet" }],
        [{ indent:  "-1" }, { indent:  "+1" }, { align: [] }],
        ["link", "image", "video"],
        ["clean"],
    ]
  },
    theme: 'snow'
  };
 var quill = new Quill('#contentEditor', options);
 $('#contentElement').val(`{!! $row->content !!}`);
  quill.on('text-change', function(delta, oldDelta, source) {
            console.log(quill.container.firstChild.innerHTML)
            $('#contentElement').val(quill.container.firstChild.innerHTML);
});

var quill2 = new Quill('#contentArEditor', options);
$('#contentArElement').val(`{!! $row->content_ar !!}`);
quill2.on('text-change', function(delta, oldDelta, source) {
            console.log(quill2.container.firstChild.innerHTML)
            $('#contentArElement').val(quill2.container.firstChild.innerHTML);
});

var quill3 = new Quill('#summaryArEditor', options);
$('#summaryArElement').val(`{!! $row->summary_ar !!}`);
quill3.on('text-change', function(delta, oldDelta, source) {
            console.log(quill3.container.firstChild.innerHTML)
            $('#summaryArElement').val(quill3.container.firstChild.innerHTML);
});

var quill4 = new Quill('#summaryEditor', options);
$('#summaryElement').val(`{!! $row->summary !!}`);
quill4.on('text-change', function(delta, oldDelta, source) {
            console.log(quill4.container.firstChild.innerHTML)
            $('#summaryElement').val(quill4.container.firstChild.innerHTML);
});

    $('.style-form').validate({
    rules: {
    'images[]': {
    extension: "jpg,jpeg,png",
            filesize: 4000000,
    },
            'main_image': {
            extension: "jpg,jpeg,png",
                    filesize: 4000000
                    @if (Request::is('admin/'.$module.'/create*'))
                    , required: true
                    @endif
            }
    },
            messages: {
            'images[]': {
            extension: "Only png,jpg,jpeg file is allowed!",
                    filesize: "The file(s) selected exceed the file size limit"
            },
                    'main_image': {
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
