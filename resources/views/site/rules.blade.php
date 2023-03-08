@extends('layouts.app')
@section('content')


<!--start nd_options_container-->


<div class="placeholder1">
    <style type="text/css">



</style>
<img src="{{asset('front/Img/Rules.jpg')}}"  alt=""/>
<h2 >{{__('front.Hotel Rules and Regulation')}}</h2>
</div>

<div class="paddingArea1"></div>
<div class="paddingArea1"></div>
<div class="paddingArea1"></div>
<div class="paddingArea1"></div>
<div class="paddingArea1"></div>


<!--start nd_options_container-->


    <!--START all content-->
<div class="placeholder2">
<div class="container">
<style type="text/css">

</style>
<div class="row">

<div class="col-xs-1" >
<img src="{{asset('front/svg/Check In-01.svg')}}" alt="" width="40" height="40">
</div>
<div class="col-xs-3">
<h3> {{__('front.CHECK-IN')}} </h3>
</div>
<div class="col-xs-7">
<h4 >
   {{$site_settings->rules_checkin}} </h4>
</div>
<div class="paddingArea1"></div>

</div>


<div class="row">

<div class="col-xs-1" >
<img src="{{asset('front/svg/Check out-01.svg')}}" alt="" width="40" height="40">
</div>
<div class="col-xs-3">
<h3> {{__('front.CHECK-OUT')}} </h3>
</div>
<div class="col-xs-7">
<h4 >
    {{$site_settings->rules_checkout}}</h4>
</div>
<div class="paddingArea1"></div>

</div>

<div class="row">

<div class="col-xs-1" >
<img src="{{asset('front/svg/cancellation-01.svg')}}" alt="" width="40" height="40">
</div>
<div class="col-xs-3">
<h3> {{__('front.Cancellation')}} </h3>
</div>
<div class="col-xs-7"></div>
<div class="paddingArea1"></div>

<div class="col-xs-1" ></div>
<div class="col-xs-10">
<p>@if(app()->getLocale() == 'en') {!!$site_settings->rules_cancellation !!}@else {!!$site_settings->rules_cancellation_ar !!} @endif</p>

</div>


</div>

<div class="row">

<div class="col-xs-1" >
<img src="{{asset('front/svg/children-01.svg')}}" alt="" width="40" height="40">
</div>
<div class="col-xs-3">
<h3> {{__('front.Children & Beds')}}  </h3>
</div>
<div class="col-xs-7">
    @if(app()->getLocale()=='ar')
    <h4>سياسات الاطفال</h4>
    @else
    <h4>Child policies / Crib and extra bed policies</h4>
    @endif

</div>
<div class="paddingArea1"></div>

<div class="col-xs-1" ></div>
<div class="col-xs-11">
   @if(app()->getLocale() == 'en')  {!!$site_settings->rules_children_and_bed !!}@else {!!$site_settings->rules_children_and_bed_ar !!}@endif

</div>

</div>


<div class="row">

<div class="col-xs-1" >
<img src="{{asset('front/svg/Age-01.svg')}}" alt="" width="40" height="40">
</div>
<div class="col-xs-3">
<h3>{{__('front.No age restriction')}}
</h3>
</div>
<div class="col-xs-7">
@if(app()->getLocale() == 'en') {!!$site_settings->rules_age_restriction !!}@else {!!$site_settings->rules_age_restriction_ar !!} @endif
</div>
<div class="paddingArea1"></div>
</div>



<div class="row">

<div class="col-xs-1" >
<img src="{{asset('front/svg/Pets-01.svg')}}" alt=""  width="40" height="40">
</div>
<div class="col-xs-3">
<h3>{{__('front.Pets')}}
</h3>
</div>
<div class="col-xs-7">
@if(app()->getLocale() == 'en') {!!$site_settings->rules_pets !!}@else {!!$site_settings->rules_pets_ar !!}@endif
</div>
<div class="paddingArea1"></div>

</div>

<div class="row">

<div class="col-xs-1" >
<img src="{{asset('front/svg/Cards-01.svg')}}" alt=""  width="40" height="40">
</div>
<div class="col-xs-3">
<h3>{{__('front.Cards accepted')}}
</h3>
</div>
<div class="col-xs-7">
</div>
<div class="paddingArea1"></div>

<div class="col-xs-1"></div>
<div class="col-xs-7">
@if(app()->getLocale() == 'en') {!!$site_settings->rules_card !!}@else{!!$site_settings->rules_card_ar !!} @endif
</div>

<div class="col-xs-4">
<img src="{{asset('front/Img/Visa.png')}}" alt="" width="60" height="60"><img src="{{asset('front/Img/Maestro.png')}}"  alt="" width="60" height="60">
<img src="{{asset('front/Img/Master.png')}}" alt="" width="60" height="60"><img src="{{asset('front/Img/Union.png')}}" alt="" width="60" height="60">

</div>

</div>



</div>




</div>



</div>



<!--end container-->

@stop
