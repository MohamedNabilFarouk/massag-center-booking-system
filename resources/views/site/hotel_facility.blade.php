@extends('layouts.app')
@section('content')

@if(app()->getLocale() == 'en')
<!--start nd_options_container-->


<div class="placeholder1">

<img src="{{asset('front/Img/Rules.jpg')}}"  alt=""/>
<h2 >Hotel Facilities</h2>
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
.placeholder2 h4{color:#FFFFFF; background-color:#5A5A5A; text-align:center; position:relative; top:10px;}
.placeholder2 h3{ font-size:20px; color:#e7c52d; font-weight:bold}
.placeholder2 p{ font-size:16px; font-weight:bold}
</style>
<div class="row">

<div class="col-xs-12" >
    <h3>Most popular facilities</h3>
</div>
<div class="paddingArea1"></div>

<div class="col-xs-2">
<img src="{{asset('front/svg/Family-01.svg')}}" width="30" height="30"> Family rooms
</div>


<div class="col-xs-2">
<img src="{{asset('front/svg/WiFi-01.svg')}}" width="30" height="30">  Free WiFi
</div>

<div class="col-xs-2">
<img src="{{asset('front/svg/Smoking-01.svg')}}" width="30" height="30">   Non-smoking
</div>

<div class="col-xs-2">
<img src="{{asset('front/svg/Fitness-01.svg')}}" width="30" height="30">  Fitness center
</div>



<div class="col-xs-2">
<img src="{{asset('front/svg/Disable-01.svg')}}" width="30" height="30">  Disabled guests
</div>


<div class="col-xs-2">
<img src="{{asset('front/svg/Room Service-01.svg')}}" width="30" height="30">  Room service
</div>


</div>

<div class="paddingArea1"></div>
<div class="paddingArea1"></div>



<div class="row">

<div class="col-xs-4" >
<p><img src="{{asset('front/svg/Food-01.svg')}}" width="30" height="30"> Food & Drink </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Coffee house on site<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Breakfast in the room<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Bar<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Internet-01.svg')}}" width="30" height="30"> Internet </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Internet
WiFi is available in all areas and is free of charge.<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Parking-01.svg')}}" width="30" height="30"> Parking </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> No parking available.<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Front Office-01.svg')}}" width="30" height="30"> Front Desk Services </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Invoice provided<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Lockers<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Private check-in/out<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Baggage storage<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Express check-in/out<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> 24-hour front desk<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Cleaning-01.svg')}}" width="30" height="30"> Cleaning Services </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Daily housekeeping<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Ironing service (Additional charge)<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Dry cleaning (Additional charge)<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Business-01.svg')}}" width="30" height="30"> Business Facilities </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Fax/Photocopying<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Business center  (Additional charge)<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Meeting/Banquet facilities (Additional charge)<br>
<div class="paddingArea1"></div>


</div>


<div class="col-xs-4" >
<p><img src="{{asset('front/svg/Security-01.svg')}}" width="30" height="30"> Safety & security </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Fire extinguishers<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> CCTV outside property<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> CCTV in common areas<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Smoke alarms<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Security alarm<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Key card access<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Key access<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> 24-hour security<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Safe<br>
<div class="paddingArea1"></div>


<p><img src="{{asset('front/svg/Information-01.svg')}}" width="30" height="30"> General </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Grocery deliveries <br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Additional charge<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Shared lounge/TV area<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Shuttle service (additional charge)<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Designated smoking area<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Air conditioning<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Heating<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Car rental<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Chapel/Shrine<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Soundproof rooms<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Elevator<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Family rooms<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Heating<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Facilities for disabled guests<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Non-smoking rooms<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Room service<br>

<div class="paddingArea1"></div>


</div>


<div class="col-xs-4" >
<p><img src="{{asset('front/svg/Accessibilaty-01.svg')}}" width="30" height="30"> Accessibility </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Auditory guidance<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Visual aids (tactile signs)<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Visual aids (Braille)<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Bathroom emergency cord<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Lowered sink<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Raised toilet<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Toilet with grab rails<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Wheelchair accessible<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Health-01.svg')}}" width="30" height="30"> Health & Wellness Facilities </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Fitness<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Foot bath<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Public Bath<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Fitness center<br>
<div class="paddingArea1"></div>


<p><img src="{{asset('front/svg/Health-01.svg')}}" width="30" height="30"> Languages Spoken </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> Arabic<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> English<br>
<div class="paddingArea1"></div>


</div>

</div>





</div>




</div>

@else


<div class="placeholder1">
   <img src="{{asset('front/Img/Rules.jpg')}}"  alt=""/>
<h2 >مرافق الفندق</h2>
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
.placeholder2 h4{color:#FFFFFF; background-color:#5A5A5A; text-align:center; position:relative; top:10px;}
.placeholder2 h3{ font-size:20px; color:#e7c52d; font-weight:bold}
.placeholder2 p{ font-size:16px; font-weight:bold}
</style>
<div class="row">

<div class="col-xs-12" >
<h3>أكثر المرافق رواجًا</h3>
</div>
<div class="paddingArea1"></div>

<div class="col-xs-2">
<img src="{{asset('front/svg/Family-01.svg')}}" width="30" height="30"> غرف عائلية
</div>


<div class="col-xs-2">
<img src="{{asset('front/svg/WiFi-01.svg')}}" width="30" height="30">  واى فاى مجانى
</div>

<div class="col-xs-2">
<img src="{{asset('front/svg/Smoking-01.svg')}}" width="30" height="30">   غرف لغير المدخنين
</div>

<div class="col-xs-2">
<img src="{{asset('front/svg/Fitness-01.svg')}}" width="30" height="30">  مركز اللياقة البدنية
</div>



<div class="col-xs-2">
<img src="{{asset('front/svg/Disable-01.svg')}}" width="30" height="30">   ذوى الإحتياجات خاصة
</div>


<div class="col-xs-2">
<img src="{{asset('front/svg/Room Service-01.svg')}}" width="30" height="30">  خدمة الغرف
</div>


</div>

<div class="paddingArea1"></div>
<div class="paddingArea1"></div>



<div class="row">


<div class="col-xs-4" >
<p><img src="{{asset('front/svg/Accessibilaty-01.svg')}}" width="30" height="30">سهولة الوصول</p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> التوجيه السمعي<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مساعدات بصرية: علامات باللمس<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20">مساعدات بصرية: برايل<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> حبل طوارئ في الحمّام<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> حوض منخفض<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مرحاض بمستوى مرتفع<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مرحاض بمقابض<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> ملائمة لمستخدمي الكراسي المتحركة<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Health-01.svg')}}" width="30" height="30"> مرافق العافية </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> اللياقة البدنية<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> حمام أقدام<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> حمّام عام<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مركز للياقة البدنية<br>
<div class="paddingArea1"></div>


<p><img src="{{asset('front/svg/Health-01.svg')}}" width="30" height="30"> لغات التحدث </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> العربية<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> الإنجليزية<br>
<div class="paddingArea1"></div>


</div>



<div class="col-xs-4" >
<p><img src="{{asset('front/svg/Security-01.svg')}}" width="30" height="30"> الأمان والحماية </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> طفايات حريق<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> كاميرات دوائر تلفزيونية مغلقة خارج مكان الإقامة<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> كاميرات دوائر تلفزيونية مغلقة في المناطق المشتركة<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> أجهزة إنذار الدخان<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> جرس الإنذار<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> بطاقات مفاتيح الدخول<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مفاتيح الدخول<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> أمن على مدار الساعة<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> صندوق الأمانات<br>
<div class="paddingArea1"></div>


<p><img src="{{asset('front/svg/Information-01.svg')}}" width="30" height="30"> عام </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20">  خدمة توصيل البقالة (رسوم إضافية)<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> خدمة نقل ذهاباً وإياباً (رسوم إضافية)<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> صالة مشتركة / منطقة تلفزيون<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> خدمة إيقاظ<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مكان مخصص للتدخين<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> تكييف<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> تدفئة<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> استئجار سيارات<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مصلى / ضريح<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> عازل للصوت<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مصعد<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> غرف عائلية<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مرافق كي الملابس<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مرافق لذوي الاحتياجات الخاصة<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> غرف لغير المدخنين<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> خدمة الغرف<br>

<div class="paddingArea1"></div>


</div>



<div class="col-xs-4" >
<p><img src="{{asset('front/svg/Food-01.svg')}}" width="30" height="30"> طعام والشراب </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مقهى في الموقع<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> خدمة فطور في الغرفة<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> ميني بار<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Internet-01.svg')}}" width="30" height="30"> إنترنت </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20">
تتوفر خدمة الواي فاي في جميع المناطق مجانًا.<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Parking-01.svg')}}" width="30" height="30"> موقف سيارات </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20">
يتوفر موقف مجاني وملائم لذوي الاحتياجات الخاصة<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Front Office-01.svg')}}" width="30" height="30"> خدمات مكتب الاستقبال </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> يمكن طلب فاتورة<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> خزائن<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20">تسجيل وصول / مغادرة خاص<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> تخزين الأمتعة<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> سجيل سريع للوصول والمغادرة<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مكتب استقبال على مدار 24 ساعة<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Cleaning-01.svg')}}" width="30" height="30"> خدمات تنظيف </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> خدمة تنظيف يومية<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> خدمة كي الملابس
(رسوم إضافية)<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> التنظيف الجاف للملابس (رسوم إضافية)<br>
<div class="paddingArea1"></div>

<p><img src="{{asset('front/svg/Business-01.svg')}}" width="30" height="30"> مرافق أعمال </p>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> فاكس / نسخ مستندات<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> مركز أعمال  (رسوم إضافية)<br>
<img src="{{asset('front/svg/Checkmark-01.svg')}}" width="20" height="20"> قاعات اجتماعات / ولائم (رسوم إضافية)<br>
<div class="paddingArea1"></div>


</div>


</div>





</div>




</div>






@endif


@stop
