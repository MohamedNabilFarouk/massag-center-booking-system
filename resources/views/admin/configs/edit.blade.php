@extends('admin.layouts.master')

@section('title')
<h3><i class="fa fa-angle-right"></i>{{ trans('admin.Edit Configurations') }}</h3>
@stop

@section('content')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

{!! Form::open(['url' =>url('admin').'/'.$module.'/edit/', 'method' => 'post','class'=>'form-horizontal style-form','enctype'=>'multipart/form-data'] ) !!}


<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#main" aria-controls="home" role="tab" data-toggle="tab">{{trans("admin.Main Settings")}}</a></li>
    <li role="presentation"><a href="#social" aria-controls="profile" role="tab" data-toggle="tab">{{trans("admin.Social links")}}</a></li>
    <li role="presentation"><a href="#email_template" aria-controls="profile" role="tab" data-toggle="tab" id='contact_tab'>{{trans("admin.Email notification messages")}}</a></li>
    <li role="presentation"><a href="#contact" aria-controls="profile" role="tab" data-toggle="tab" id='contact_tab'>{{trans("admin.Contact information")}}</a></li>
    <li role="presentation"><a href="#counters" aria-controls="profile" role="tab" data-toggle="tab" id='counter_tab'>Home Configs</a></li>

</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="main">
        @php $input='site_title' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Site title')."<em class='red'>*</em>",['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control','required'=>'required']) !!}
            </div>
        </div>
        @php $input='contact_form_receive_email' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Contact form receive email')."<em class='red'>*</em>",['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::email($input,@$rows[$input],['class'=>'form-control','required'=>'required']) !!}
            </div>
        </div>
        @php $input='google_analytics_id' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Google analytic ID'),['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>

        @php $input='logo'; @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Logo')."<em class='red'>*</em>",['class' => 'col-md-2 control-label']) !!} {{trans("admin.jpg,png,jpeg")}}, {{trans("front.Allowed max file size 4MB")}} {{trans("admin.Recommended resolution 287x136")}}
            <div class="col-md-4">
                {!! Form::file($input,['class'=>'form-control fileinput','accept'=>'image/*','data-show-preview'=>'false','data-allowed-file-extensions'=>'["jpg", "png","jpeg"]']) !!}
                <img src="uploads/{{@$rows[$input]}}" height="50">
                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>
        @php $input='footer_logo'; @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,"Footer ".trans('admin.Logo')."<em class='red'>*</em>",['class' => 'col-md-2 control-label']) !!} {{trans("admin.jpg,png,jpeg")}}, {{trans("front.Allowed max file size 4MB")}} {{trans("admin.Recommended resolution 287x136")}}
            <div class="col-md-4">
                {!! Form::file($input,['class'=>'form-control fileinput','accept'=>'image/*','data-show-preview'=>'false','data-allowed-file-extensions'=>'["jpg", "png","jpeg"]']) !!}
                <img src="uploads/{{@$rows[$input]}}" height="50">
                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>
        @php $input='favicon'; @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Favicon')."<em class='red'>*</em>",['class' => 'col-md-2 control-label']) !!} {{trans("admin.ico")}}, {{trans("front.Allowed max file size 4MB")}} {{trans("admin.Recommended resolution 30x30")}}
            <div class="col-md-4">
                {!! Form::file($input,['class'=>'form-control fileinput','accept'=>'image/*','data-show-preview'=>'false','data-allowed-file-extensions'=>'["jpg", "png","jpeg"]']) !!}
                <img src="uploads/{{@$rows[$input]}}" height="50">
                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>
        @php $input='meta_description' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Meta Description'),['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::textarea($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
        @php $input='meta_keywords' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Meta Keywords'),['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::textarea($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="email_template">
        @php $input='subscribers_notification_message' @endphp
        <textarea style="display: none" id="contentElement" name="subscribers_notification_message"></textarea>

        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Subscribers notification message'),['class' => 'col-md-3 control-label']) !!}
            <div class="col-md-8">
                <div id="contentEditor">
                    {!! @$rows[$input] !!}
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="social">
        @php $input='facebook_link' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Facebook Link'),['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::url($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
        @php $input='twitter_link' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Twitter Link'),['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::url($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
        @php $input='instagram_link' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Instagram Link'),['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::url($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
        @php $input='linkedin_link' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Linkedin link'),['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::url($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
        @php $input='googleplus_link' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Google Plus link'),['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::url($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="counters">
        @php $input='youTubeURL' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,"Youtube Video",['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::url($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>

        @php $input='video_cover'; @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,"Video Cover<em class='red'>*</em>",['class' => 'col-md-2 control-label']) !!} {{trans("admin.jpg,png,jpeg")}}, {{trans("front.Allowed max file size 4MB")}} {{trans("admin.Recommended resolution 287x136")}}
            <div class="col-md-4">
                {!! Form::file($input,['class'=>'form-control fileinput','accept'=>'image/*','data-show-preview'=>'false','data-allowed-file-extensions'=>'["jpg", "png","jpeg"]']) !!}
                <img src="uploads/{{@$rows[$input]}}" height="50">
                @foreach($errors->get($input) as $message)
                <span class = 'help-inline text-danger'>{{ $message }}</span>
                @endforeach
            </div>
        </div>
        @php $input='delivered' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,"Delivered Projects",['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
        @php $input='it-consulting' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,"It-Consulting Projects",['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
        @php $input='completed' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,"Completed Projects",['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
        @php $input='launched' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,"Launched Projects",['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
        @php $input='satisfiedClients' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,"Satisfied Clients",['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="contact">

        @php $input='telephone' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Telephone') . " EG",['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control'   ]) !!}
            </div>
        </div>
        @php $input='telephone2' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,trans('admin.Telephone') . " KSA",['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control'   ]) !!}
            </div>
        </div>
        @php $input='whatsapp' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,"Whatsapp",['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>


        @php $input='ksa_ar_address' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,"KSA Arabic ". trans('admin.Address'),['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>

        @php $input='ksa_en_address' @endphp
        <div class="form-group {{ $errors->has($input) ? 'has-error' : '' }}">
            {!! Form::rawLabel($input,"KSA English ". trans('admin.Address'),['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text($input,@$rows[$input],['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::hidden("longitude",@$rows['longitude'],['class'=>'form-control','id'=>"longitude"]) !!}
            {!! Form::hidden("latitude",@$rows['latitude'],['class'=>'form-control','id'=>"latitude"]) !!}
            {!! Form::label("location",trans('admin.Location'),['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('geocomplete',null,['class'=>'form-control','id'=>'geocomplete','placeholder'=>trans("admin.Type in an address")]) !!}
                @section('javascripts')
                <script>
                    $(function () {
                        $('.style-form').validate({
                            rules: {
                                'site_title': {
                                    required: true
                                },
                                'contact_receive_email': {
                                    required: true,
                                    email: true
                                },
                                'logo': {
                                    extension: "jpg,jpeg,png",
                                    filesize: 4000000,
                                },
                                'favicon': {
                                    extension: "jpg,jpeg,png,ico",
                                    filesize: 4000000,
                                },
                                'facebook_link': {
                                    url: true
                                },
                                'twitter_link': {
                                    url: true
                                },
                                'instagram_link': {
                                    url: true
                                },
                                'linkedin_link': {
                                    url: true
                                },
                                'contact_email': {
                                    email: true
                                }
                            },
                            messages: {
                                'logo': {
                                    extension: "Only png,jpg,jpeg file is allowed!",
                                    filesize: "The file(s) selected exceed the file size limit"
                                },
                                'favicon': {
                                    extension: "Only jpg,jpeg,png,ico file is allowed!",
                                    filesize: "The file(s) selected exceed the file size limit"
                                },
                            }
                        });
                        $("input[type=submit]").on("click", function () {
                            console.log("error" + $(".form-group div .error").length);
                            if ($(".form-group div .error").length > 1) {
                                return false;
                            }
                        });
                    });
                </script>
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA3DbV-sdMhIGkmSBCnK_IuU9nrUnCXoo8&amp;libraries=places"></script>
                <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>

                <script type="text/javascript">

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
 $('#contentElement').val(`{!! @$rows['subscribers_notification_message'] !!}`);
  quill.on('text-change', function(delta, oldDelta, source) {
            console.log(quill.container.firstChild.innerHTML)
            $('#contentElement').val(quill.container.firstChild.innerHTML);
});


                    var map;
                    var lat = $("#latitude").val();
                    var lng = $("#longitude").val();
                    function intialize(lat, lng) {
                        console.log("intialize new map");
                        //$(".readonly").attr("readonly", "TRUE");
                        var latlng = new google.maps.LatLng(lat, lng);
                        var options = {
                            zoom: 15,
                            center: latlng,
                            //scrollwheel: true,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        map = new google.maps.Map(document.getElementById("map"), options);
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(lat, lng),
                            map: map,
                            draggable: true,
                        });
                        google.maps.event.addListener(marker, 'dragend', function (evt) {
                            console.log(evt.latLng.lat());
                            console.log(evt.latLng.lng());
                            $("#latitude").val(evt.latLng.lat());
                            $("#longitude").val(evt.latLng.lng());
                            map.setCenter(marker.getPosition());
                        });
                        $("#geocomplete").geocomplete(options)
                                .bind("geocode:result", function (event, result) {
                                    console.log(result.geometry.location.lat());
                                    $("#latitude").val(result.geometry.location.lat());
                                    $("#longitude").val(result.geometry.location.lng());
                                    console.log("Result: " + result.formatted_address);
                                    intialize(result.geometry.location.lat(), result.geometry.location.lng());
                                })
                                .bind("geocode:error", function (event, status) {
                                    console.log("ERROR: " + status);
                                })
                                .bind("geocode:multiple", function (event, results) {
                                    console.log("Multiple: " + results.length + " results found");
                                });
                    }
                    $(function () {
                        console.log("lat: " + lat);
                        intialize(lat, lng);
                        $("#contact_tab").click(function () {
                            lat = $("#latitude").val();
                            lng = $("#longitude").val();
                            console.log("lattt: " + lat);
                            setTimeout(function () {
                                intialize(lat, lng);
                            }, 2000);

                        });
                    });
                    $(window).resize(function () {
                        lat = $("#latitude").val();
                        lng = $("#longitude").val();
                        if (lat != "" || lat != undefined) {
                            if (lng != "" || lng != undefined) {
                                intialize(lat, lng);
                            }
                        }
                    });
                </script>
                @stop
                <style>
                    #map img {
                        max-width:none;
                    }
                </style>
                <div id = "map" style = "width:100%; height:400px;"> </div>
            </div>
        </div>
    </div>
</div>

{!! Form::submit(trans('admin.Save') ,['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@stop
