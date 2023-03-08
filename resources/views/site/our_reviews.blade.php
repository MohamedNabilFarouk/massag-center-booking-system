
@extends('layouts.app')
@section('content')
{{-- <style>
    .pagination > li > a:focus,
.pagination > li > a:hover,
.pagination > li > span:focus{
    color: #6b6978;
    background-color: #6b6978;
}
.pagination > li > span:hover {
    z-index: 3;
    color: #6b6978;
    background-color: #6b6978;
    border-color: #ddd;
}
    </style> --}}
<!--start nd_options_container-->
<div class="nd_options_container nd_options_clearfix">


    <!--START all content-->
    <div class>

        <!--post-->
        <div style="float:left; width:100%;" id="post-483" class="post-483 page type-page status-publish hentry">
            <!--start content-->
                    <div data-elementor-type="wp-page" data-elementor-id="483" class="elementor elementor-483" data-elementor-settings="[]">
                    <div class="elementor-section-wrap">





        <section class="elementor-section elementor-top-section elementor-element elementor-element-2398d09b elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2398d09b" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">

            @foreach ($reviews as $r)


                <div class="elementor-container elementor-column-gap-default">



        <div class="elementor-widget-wrap elementor-element-populated">


        <ul class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6995">

            <li style="display:inline">
                {{-- <img width="50" height="50" src="Img/Avatar.png" class="attachment-full size-full" alt loading="lazy" > --}}
                {{-- <i class="glyphicon glyphicon-user"></i> --}}
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </li><br>
            <li style="display:inline">{{$r->user->name}}</li><br>

            <li style="display:inline"><a href="Budget-Double-Room.html"><strong>Budget Double Room</strong></a></li><br>
            <li style="display:inline"> September 2022</li>
            <li style="display:inline">5 nights </li>
        </ul>
            </div>



    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-ae81686 elementor-position-left elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="ae81686" data-element_type="widget" data-widget_type="image-box.default">
           <div class="elementor-widget-container">
                <div class="elementor-image-box-wrapper">




                <h3 class="elementor-image-box-title">{{$r->review_text}}</h3>
                <p class="elementor-image-box-description">{{$r->comment}} </p>



                 </div>		</div>
                </div>
    </div>






</div>

@endforeach







</section>


                          <div class="nd_booking_section nd_booking_height_30"></div>



                        <div style="text-align: center;">
                            {{ $reviews->links('pagination::bootstrap-4') }}
        </div>




                </div>
            </div>
                    <!--end content-->
        </div>
        <!--post-->

    </div>
    <!--END all content-->



</div>
<!--end container-->
<div class="nd_booking_section nd_booking_height_30"></div>
@stop
