@extends('admin.layouts.master')
@section('content')

@include('admin.includes.messages')



<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{__("Packages")}} / {{__("create")}}</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                            <form method="post" action="{{ route('Packages.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Title Ar')}}</label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="title_ar" class="form-control form-control-lg" value="{{ old('title_ar') }}" required placeholder="{{__('Title Ar')}}">
                                    </div>
                                </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Title En')}}</label>
                                        <div class="col-sm-10 ">
                                            <input type='text' name="title_en"  class="form-control form-control-lg" value="{{ old('title_en') }}" required placeholder="{{__('Title En')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Description Ar')}}</label>
                                        <div class="col-sm-10 ">

                                            <textarea class="form-control" name='des_ar' rows="4" id="editor">{{ old('des_ar') }}</textarea>

                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Description En')}}</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='des_en' rows="4" id="editor">{{ old('des_en') }}</textarea>

                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__("Price")}}</label>
                                        <div class="col-sm-4 ">
                                            <input type='number' min="0" name="price" class="form-control form-control-lg" value="{{ old('price') }}" required placeholder="{{__("price")}}">
                                        </div>
                                    </div>


                                    <label class="col-sm-2 col-form-label col-form-label-lg">{{__('Services')}}</label>
                                    <div class="row">
                                    @foreach($services as $b)


                                        <div class="col-xl-4 col-xxl-4 col-4">
                                            <div class="form-check custom-checkbox mb-3 checkbox-success">

                                                <input type="checkbox" name='services[]'  class="form-check-input  tot_amount" value='{{$b->id}}' id="{{$b->duration}}" >


                                                <label class="form-check-label" for="CheckBox3">{{$b->title}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>






                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">{{__("Duration")}}</label>
                                        <div class="col-sm-4 ">
                                            {{-- <input type='number' name="duration" class="form-control form-control-lg" value="{{ old('duration') }}" required placeholder="{{__("Duration")}}"> --}}
                                            <input type='number' id='duration' name="duration" class="form-control form-control-lg" value="{{ old('duration') }}" required placeholder="{{__('Duration')}}">
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-xxl-6 col-6">
                                        <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" name="is_special" class="form-check-input " value='1'   id="customCheckBox1" >
                                        {{-- <img alt="" class="nd_booking_margin_right_15 nd_booking_display_table_cell nd_booking_vertical_align_middle" width="25" src="{{asset('front/svg/kitchen-01.svg')}}"> --}}
                                        <label class="form-check-label" for="customCheckBox3">{{__("Moroco Bath only")}}</label>

                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-xxl-6 col-6">
                                        <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" name="with_special" class="form-check-input " value='1'   id="customCheckBox2" >
                                        {{-- <img alt="" class="nd_booking_margin_right_15 nd_booking_display_table_cell nd_booking_vertical_align_middle" width="25" src="{{asset('front/svg/kitchen-01.svg')}}"> --}}
                                        <label class="form-check-label" for="customCheckBox3">{{__("Contain Moroco Bath service")}}</label>

                                        </div>
                                    </div>







                                    <div class="col-xl-6 col-xxl-6 col-6">
                                        <div class="form-check custom-checkbox mb-3 checkbox-success">
                                        <input type="checkbox" name="home_page" class="form-check-input " value='1'   id="customCheckBox3" >
                                        {{-- <img alt="" class="nd_booking_margin_right_15 nd_booking_display_table_cell nd_booking_vertical_align_middle" width="25" src="{{asset('front/svg/kitchen-01.svg')}}"> --}}
                                        <label class="form-check-label" for="customCheckBox3">{{__("Show in Home Page")}}</label>

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

        $(document).ready(function(){

            $('#customCheckBox1').on('change', function() {
            $('#customCheckBox2').prop('checked', false);
        });
            $('#customCheckBox2').on('change', function() {
            $('#customCheckBox1').prop('checked', false);
        });


        });

        </script>


<script>
    //    if(elem[i].checked==true){

    //    }


    $(function() {

    function getTotal(isInit) {

      var total = 0;
      var selector = isInit ? ".tot_amount" : ".tot_amount:checked";
      $(selector).each(function() {
        if ($('.tot_amount').is(':checked')) {
        // total += parseInt($(this).val());
        total += parseInt($(this).attr("id"));
        // alert(total);
        }
      });
      //$("#tot_amount").val(sum.toFixed(3));

      if (total == 0) {
        $('#duration').val('');
      } else {
        $('#duration').val(total);
        $('#total_display').html(total);
      }

    }

     $(".tot_amount").click(function(event) {
       getTotal();
    //    alert('done');
    });
    getTotal(true);

    });
    </script>
@stop
