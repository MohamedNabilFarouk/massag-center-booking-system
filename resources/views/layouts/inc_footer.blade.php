 <!-- FOOTER START -->
 <footer class="site-footer footer-light">

	<!-- FOOTER BLOCKES START -->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<!-- COLUMNS 1 -->
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="sf-site-link sf-widget-link">
						<h4 class="aon-f-title">{{__('About')}}</h4>
						<p>{{__('Massage for everybody ready to feel so much better?')}}</p>
						<ul class="aon-socila-icon d-flex">
                            @foreach($social_settings as $s)
							{{-- <li><a href="{{$s->value}}" target="_blanck"><i class="fa fa-{{$s->key}}"></i></a></li> --}}
                            @if($s->key != 'google_review_link')
							<li><a href="{{$s->value}}" target="_blanck"><img src="https://img.icons8.com/color/30/null/{{$s->key}}.png"/></a></li>
							@endif
                            {{-- img.icons8.com/color --}}
                            {{-- <img src="https://img.icons8.com/ios-filled/50/null/twitter.png"/> --}}
                            @endforeach
						</ul>
					</div>
				</div>
				<!-- COLUMNS 2 -->
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="sf-site-link sf-widget-cities">
						<h4 class="aon-f-title">{{__('Quick Links')}}</h4>
						<ul>
							<li><a href="{{url('about')}}">{{__('About')}}</a></li>
							<li><a href="{{url('packages')}}">{{__('Packages')}}</a></li>
							<li><a href="{{url('Shop')}}">{{__("Shop")}}</a></li>
							<li><a href="{{url('news')}}">{{__("Blog")}}</a></li>
							<li><a href="{{url('contact')}}">{{__("Contact Us")}}</a></li>
						</ul>
					</div>
				</div>

				<!-- COLUMNS 4 -->
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="sf-site-link sf-widget-contact">
						<h4 class="aon-f-title">{{__('Community')}}</h4>
						<ul>
							<li>{{__("Saudia Alarabiya")}}</li>
							<li><a href="tel:{{$site_settings->phone}}"> {{$site_settings->phone}}</a></li>
							<li>@if(app()->getLocale()=='en'){{$site_settings->address}}@else  {{$site_settings->address_ar}} @endif</li>
							<li>{{$site_settings->email}}</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- FOOTER COPYRIGHT -->
	<div class="footer-bottom">
		<div class="container">
			<div class="aon-footer-bottom-area">
				<div class="aon-foo-copyright">
					<span>Copyright 2022 | All Rights Reserved</span>
				</div>
			</div>
		</div>
	</div>

</footer>
<!-- FOOTER END -->

<!-- BUTTON TOP START -->
<button class="scroltop"><span class="glyphicon glyphicon-menu-up"></span></span></button>
{{-- <button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button> --}}

</div>
<!-- JAVASCRIPT  FILES ========================================= -->
<script src="{{asset('front/js/jquery-3.6.0.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script src="{{asset('front/js/popper.min.js')}}"></script><!-- POPPER.MIN JS -->
<script src="{{asset('front/js/bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->

<script src="{{asset('front/js/jquery.bootstrap-touchspin.js')}}"></script><!-- FORM JS -->
<script src="{{asset('front/js/bootstrap-slider.min.js')}}"></script><!-- BOOTSTRAP Slider -->
<script src="{{asset('front/js/magnific-popup.min.js')}}"></script><!-- MAGNIFIC-POPUP JS -->
<script src="{{asset('front/js/waypoints.min.js')}}"></script><!-- WAYPOINTS JS -->
<script src="{{asset('front/js/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script src="{{asset('front/js/waypoints-sticky.min.js')}}"></script><!-- STICKY HEADER -->
<script src="{{asset('front/js/isotope.pkgd.min.js')}}"></script><!-- MASONRY  -->
<script src="{{asset('front/js/owl.carousel.min.js')}}"></script><!-- OWL  SLIDER  -->
<script src="{{asset('front/js/slick.min.js')}}"></script><!-- Slick SLIDER  -->
<script src="{{asset('front/js/theia-sticky-sidebar.js')}}"></script><!-- STICKY SIDEBAR  -->
<script src="{{asset('front/js/jquery.scrollbar.min.js')}}"></script><!-- MY ACCOUNT LEFT PANEL SCROLLER -->
<script src="{{asset('front/js/dropzone.js')}}"></script><!--IMAGE UPLOAD-->
<script src="{{asset('front/js/bootstrap4-toggle.min.js')}}"></script><!-- BOOTSTRAP TOOGLE-->
<script src="{{asset('front/js/jquery.dataTables.min.js')}}"></script><!--DATA TABLE-->
<script src="{{asset('front/js/dataTables.bootstrap4.min.js')}}"></script><!-- DATA TABLE-->
<script src="{{asset('front/js/lc_lightbox.lite.js')}}"></script><!-- IMAGE POPUP -->
<script src="{{asset('front/js/datepicker.min.js')}}"></script><!-- DATEPICKER -->
<script src="{{asset('front/js/fullcalendar.min.js')}}"></script><!-- DATEPICKER -->
<script src="{{asset('front/js/recaptcha-api.js')}}"></script><!-- RECAPTCHA-->
<script src="{{asset('front/js/custom.js')}}"></script><!-- CUSTOM FUCTIONS  -->




<script>



    $(document).ready(function() {




      var sync1 = $("#sync1");
      var sync2 = $("#sync2");
    //   alert(sync1);
      var slidesPerPage = 5; //globaly define number of elements per page
      var syncedSecondary = true;

          sync1.owlCarousel({
            items : 1,
            slideSpeed : 2000,
            nav: true,
            autoplay: false,
            dots: false,
            loop: true,
            responsiveRefreshRate : 200,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
          }).on('changed.owl.carousel', syncPosition);

          sync2
            .on('initialized.owl.carousel', function () {
              sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
            items : slidesPerPage,
            dots: false,
            nav: false,
            margin:15,
            smartSpeed: 200,
            slideSpeed : 500,
            slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate : 100
          }).on('changed.owl.carousel', syncPosition2);

      function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count-1;
        var current = Math.round(el.item.index - (el.item.count/2) - .5);

        if(current < 0) {
          current = count;
        }
        if(current > count) {
          current = 0;
        }

        //end block

        sync2
          .find(".owl-item")
          .removeClass("current")
          .eq(current)
          .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
          sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
          sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
      }

      function syncPosition2(el) {
        if(syncedSecondary) {
          var number = el.item.index;
          sync1.data('owl.carousel').to(number, 100, true);
        }
      }

      sync2.on("click", ".owl-item", function(e){
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
      });
    });




</script>
<script>
    $(document).ready(function(){
      var form_count = 1, form_count_form, next_form, total_forms;
      total_forms = $("fieldset").length;
      $(".next").click(function(){

            let previous = $(this).closest("fieldset").attr('id');
            let next = $('#'+this.id).closest('fieldset').next('fieldset').attr('id');
            $('#'+next).show();
            $('#'+previous).hide();
            setProgressBar(++form_count);

      });

      $(".previous").click(function(){

            let current = $(this).closest("fieldset").attr('id');
            let previous = $('#'+this.id).closest('fieldset').prev('fieldset').attr('id');
            $('#'+previous).show();
            $('#'+current).hide();
            setProgressBar(--form_count);

      });

    });
    </script>

</body>

</html>
