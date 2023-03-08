@extends('layouts.app')
@section('content')



<!--start nd_options_container-->
<div class="nd_options_container nd_options_clearfix">


    <!--START all content-->
    <div class>

        <!--post-->
        <div style="float:left; width:100%;" id="post-412" class="post-412 page type-page status-publish hentry">
            <!--start content-->
                    <div data-elementor-type="wp-page" data-elementor-id="412" class="elementor elementor-412" data-elementor-settings="[]">
                    <div class="elementor-section-wrap">
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-45a632bf elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="45a632bf" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-background-overlay"></div>
                    <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7ed7bcea" data-id="7ed7bcea" data-element_type="column">
    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-3af9efd8 elementor-widget elementor-widget-heading" data-id="3af9efd8" data-element_type="widget" data-widget_type="heading.default">
        <div class="elementor-widget-container">
    <style>/*! elementor - v3.5.6 - 28-02-2022 */
.elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}</style><h1 class="elementor-heading-title elementor-size-default">{{__("front.Services")}}</h1>		</div>
        </div>
            </div>
</div>
                    </div>


</section>

@foreach($services as $s)

        <section class="elementor-section elementor-top-section elementor-element elementor-element-3970322c elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3970322c" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7b60ff65" data-id="7b60ff65" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-eb6f2c6 elementor-widget elementor-widget-spacer" data-id="eb6f2c6" data-element_type="widget" data-widget_type="spacer.default">
        <div class="elementor-widget-container">
            <div class="elementor-spacer"><img src="{{$s->main_image}}">

</div>
        </div>
        </div>
            </div>
</div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6d748c45" data-id="6d748c45" data-element_type="column">
    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-42c7d598 elementor-widget elementor-widget-heading" data-id="42c7d598" data-element_type="widget" data-widget_type="heading.default">

        </div>
        <div class="elementor-element elementor-element-46f4cb18 elementor-widget elementor-widget-heading" data-id="46f4cb18" data-element_type="widget" data-widget_type="heading.default">
            <div class="elementor-widget-container">
                     <h1 class="elementor-heading-title elementor-size-default">{{$s->title}}</h1>
             <a style="background-color: #6b6978;" href="#" class="nd_booking_margin_right_20 nd_booking_padding_5_10 nd_booking_text_transform_uppercase nd_options_second_font_important nd_booking_border_radius_0_important nd_options_color_white nd_booking_cursor_pointer nd_booking_display_inline_block nd_booking_font_size_12 nd_booking_letter_spacing_4 nd_booking_e_rooms_postgrid_l2_price">
                @if($s->price == 0) Free @else{{$s->price}} {{__('currency')}}/{{__('front.night')}}  @endif</a></div>
        </div>
        <section class="elementor-section elementor-inner-section elementor-element elementor-element-12e1ad22 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="12e1ad22" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-314dc62a" data-id="314dc62a" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-1768e98 elementor-widget elementor-widget-heading" data-id="1768e98" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                    <p class="elementor-heading-title elementor-size-default">{!! $s->des!!} </p>		</div>
                        </div>
                            </div>
                </div>

                                    </div>
        </section>

            </div>
            </div>
                    </div>
</section>

@endforeach
<div class="col-12 d-flex justify-content-center">
    {{ $services->links('pagination::bootstrap-4') }}
</div>
                </div>

            </div>
                    <!--end content-->
        </div>
        <!--post-->

    </div>
    <!--END all content-->



</div>
                        <div class="nd_elements_section nd_elements_height_50"></div>



<!--end container-->

@stop
