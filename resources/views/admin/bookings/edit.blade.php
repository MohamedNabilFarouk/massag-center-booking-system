@extends('admin.layouts.master')
@section('content')

@include('admin.includes.messages')



<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__('Bookings')}} / {{__("Update")}}</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                            <form method="post" action="{{ route('admin.doBooking.update', $booking->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Package')}}</label>
                                    <div class="col-sm-10 ">
                                        <select class="form-select" name='package_id' id='package'   aria-label="i'll choose my insuance plan?" >
                                            <option value='#' >{{__("Select Package")}}</option>
                                            @foreach($allPackages as $p)

                                            <option id='package_cat'  @if($p->is_special == 1) class="special" data-cat ='special'  @elseif($p->with_special == 1) class="with_special"   data-cat='with'     @endif    @if($booking->package_id == $p->id) selected @endif value="{{$p->id}}">{{$p->title}} </option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row mt-5" id='nonspecial_prof_dev'>
                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Profissional')}}</label>
                                    <div class="col-sm-10 ">
                                        <select class="form-select" id='sel_prof' name='prof_id' aria-label="i'll choose my insuance plan?">
                                            <option value='#' >{{__("Select Professional")}}</option>
                                            @foreach($team as $t)
                                            @if($t->is_special == 0)
                                            <option value='{{$t->id}}' @if($booking->prof_id == $t->id) selected @endif>{{$t->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__("Select an available time")}}</label>
                                        <div class="col-sm-10 ">

                                            <div class="aon-calen-box">



                                                <div class="aon-date-row row">
                                                    <div class="col-4"><input class="form-control sf-form-control" value=""   id='date' type="date"   min="{{Carbon\Carbon::now()->toDateString()}}" max="{{Carbon\Carbon::now()->addDays(7)->toDateString()}}"  required ></div>
                                                </div>


                                                <label class="text-center"style="color:red; font-size:12px" id="date_err"></label>
                                                <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <!-- Timing slots start-->
                                                       <div class="sf-doc-timing-slots">
                                                            <div class="row" id='sel_time'>


                                                            </div>
                                                            </div>
                                                        </div>
                                                    <!-- Timing slots list End-->
                                                </div>



                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-5" id='special_prof_dev'>
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__("Which Morocco Bath Professional?")}}</label>
                                        <div class="col-sm-10 ">
                                            <select class="form-select" id='sel_special_prof' name='special_prof_id' aria-label="i'll choose my insuance plan?">
                                                <option value='#' >{{__("Select Professional")}}</option>
                                                @foreach($team as $t)
                                                @if($t->is_special == 1)
                                                <option value='{{$t->id}}'  @if($booking->special_prof_id == $t->id) selected @endif>{{$t->name}}</option>
                                                @endif
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>


                                    <div class="mb-3 row mt-5" id='special_time_dev'>
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Select Time')}}</label>
                                        <div class="col-sm-10 ">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <!-- Timing slots start-->
                                                       <div class="sf-doc-timing-slots">
                                                            <div class="row" id='sel_special_time'>
                                                                {{-- <div class="col-lg-6" style="width:40%; margin:30px"> --}}
                                                                    {{-- <div class="sf-doc-timing-slots-detail active">
                                                                        <span>9AM - 12PM</span>
                                                                        <p>0 available</p>
                                                                    </div> --}}
                                                                {{-- </div> --}}




                                                            </div>
                                                            </div>
                                                        </div>
                                                    <!-- Timing slots list End-->
                                                </div>

                                        </div>
                                    </div>











                                    <div class="col-12  mt-5 ">
                                        <button type="submit" class="btn btn-primary mb-2">{{__("Submit")}}</button>
                                    </div>
                            </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // for book now page
            var APP_URL = {!! json_encode(url('/')) !!}
            //  alert(APP_URL+'/packageBooking/profTime/');




    var package = $("#package").val();
var cat = $(this).find(':selected').data('cat');
            var special = $(".special").val();
            var with_special = $(".with_special").val();
            //  alert(special);
if (cat == 'special'){
    $('#special_prof_dev').show();
    $('#special_prof').show();
     $('#nonspecial_prof_dev').hide();
     $('#sel_time').hide();
     $('#special_time_dev').show();
     $('#sel_prof').val(null);
    } else if(cat == 'with'){
    $('#special_prof_dev').show();
     $('#nonspecial_prof_dev').show();
     $('#special_time_dev').show();
     $('#sel_time').show();
} else {

    $('#special_prof_dev').hide();
    $('#special_prof').hide();
    $('#sel_special_prof').val(null);
    $('#nonspecial_prof_dev').show();
    $('#special_time_dev').hide();
}







$('#package').change(function() {

    // alert($(this).find(':selected').data('cat'));

    // alert($('#package_cat').data('special'));
// alert($('#package').data('category'));
    //  $('#package').val(null);
    $('#sel_time').empty();
   var  package = $("#package").val();
var cat = $(this).find(':selected').data('cat');
    var special = $(".special").val();
     var with_special = $(".with_special").val();
            //  alert(special);
if (cat == 'special'){
    // alert('moroco'+"/"+special);
    $('#special_prof_dev').show();
    $('#special_prof').show();
     $('#nonspecial_prof_dev').hide();
     $('#sel_time').hide();
     $('#special_time_dev').show();
     $('#sel_prof').val(null);
 } else if(cat == 'with'){
    // alert('with'+package+"/"+with_special  );
    $('#special_prof_dev').show();
     $('#nonspecial_prof_dev').show();
     $('#special_time_dev').show();
     $('#sel_time').show();
} else {
    // alert('main' +package+"/"+with_special+"/"+special );
    $('#special_prof_dev').hide();
    $('#special_prof').hide();
    $('#sel_special_prof').val(null);
    $('#nonspecial_prof_dev').show();
    $('#special_time_dev').hide();
}
});

// end add field

$('#date , #sel_prof').change(function() {

                // alert(' prof');
                $('#sel_time').empty();
                var id = $("#sel_prof").val();
                var special_prof_id = $("#sel_special_prof").val();
                var date = $("#date").val();
                var package = $("#package").val();
                // alert(date);
                // console.log(id);
                // console.log(APP_URL+'/packageBooking/profTime/' + id+'/'+ date +'/'+package);

                $.ajax({

                    url: APP_URL+'/packageBooking/profTime/' + id+'/'+ date +'/'+package,
                    // url: './profTime/' + id+'/'+ date +'/'+package+'/'+special_prof_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var len = 0;
                        if (response['data'] != null) {
                            len = response['data'].length;
                        }

                        // for new update

                                    // $.each(arr , function(index, val) {
                                    // console.log(index, val);
                                    //     });

                        // end for new update
                        // '01 Jan 1970 00:00:00 GMT'
                        // alert(response['data'][0].toLocaleTimeString())
//  alert(new Date(response['data'][0]))
                        if (len > 0) {
                            // Read data and create <option >
                            for (var i = 0; i < len; i++) {

                                 var date = new Date(Date.parse(response['data'][i]));


                                //   var  date =new Date(Date.replace("-", " ", Date.parse(response['data'][i])));
                                //   var  date =date.replace("-", " "));
                                var test = response['data'][i];
                                // var t   =  new Date(response['data'][i]).toDateString()
                                // alert(test);
                                //  var date = new Date(Date.parse(response['data'][i]));
                                var date_value = date.toISOString().slice(0, 19).replace('T', ' ');

                                //  var date_plus = date_value.setHours(date_value.getHours() + 1);
//   console.log(i);
//   console.log(len);
// if(i+1 < len){
                                //  var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") + '  -  ' +  new Date(response['data'][i + 1]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") ;
                                 var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") ;
                                //  var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") + '  -  ' + new Date(date.setHours(date.getHours() + 1)).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") ;
// }else{
//     var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
// }
                                //   console.log(test);
                                 // var name = response['data'][i].name_ar;
                                var option = ' <div class="sf-doc-timing-slots-detail col-md-6" style="width:40%; margin:5px 30px 0 0"><input type="radio" id="from" name="from" value="'+ test +'"> <span>'+ date_dispaly +'</span>  </div>';
                                $("#sel_time").append(option);
                                //  $('#sub').append(sub);
                            }
                        }
                    }
                }); //end ajax
            }); //end on change





            // ajax 22


            $('#date , #sel_special_prof').change(function() {
// alert('special prof');
$('#sel_special_time').empty();

var special_prof_id = $("#sel_special_prof").val();
var date = $("#date").val();
var package = $("#package").val();
// alert(date);
// console.log(id);
$.ajax({
    url: APP_URL+'/packageBooking/SpecialprofTime/' + special_prof_id+'/'+ date,
    // url: './profTime/' + id+'/'+ date +'/'+package+'/'+special_prof_id,
    type: 'get',
    dataType: 'json',
    success: function(response) {
        var len = 0;
        if (response['data'] != null) {
            len = response['data'].length;
        }

        // for new update

                    // $.each(arr , function(index, val) {
                    // console.log(index, val);
                    //     });

        // end for new update
        // '01 Jan 1970 00:00:00 GMT'
        // alert(response['data'][0].toLocaleTimeString())
// alert(new Date(response['data'][0]))
        if (len > 0) {
            // Read data and create <option >
            for (var i = 0; i < len; i++) {

                 var date = new Date(Date.parse(response['data'][i]));


                //   var  date =new Date(Date.replace("-", " ", Date.parse(response['data'][i])));
                //   var  date =date.replace("-", " "));
                var test = response['data'][i];
                // var t   =  new Date(response['data'][i]).toDateString()
                // alert(test);
                //  var date = new Date(Date.parse(response['data'][i]));
                var date_value = date.toISOString().slice(0, 19).replace('T', ' ');

                //  var date_plus = date_value.setHours(date_value.getHours() + 1);
//   console.log(i);
//   console.log(len);
// if(i+1 < len){
                 var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") ;
                //  var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") + '  -  ' + new Date(date.setHours(date.getHours() + 1)).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3") ;
// }else{
// var date_dispaly = new Date(response['data'][i]).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
// }
                //   console.log(test);
                 // var name = response['data'][i].name_ar;
                var option = ' <div class="sf-doc-timing-slots-detail col-md-6" style="width:40%; margin:5px 30px 0 0"><input type="radio" id="from" name="special_from" value="'+ test +'"> <span>'+ date_dispaly +'</span>  </div>';
                $("#sel_special_time").append(option);
                //  $('#sub').append(sub);
            }
        }
    }
}); //end ajax
}); //end on change
}); //end on doc
</script>
@stop
