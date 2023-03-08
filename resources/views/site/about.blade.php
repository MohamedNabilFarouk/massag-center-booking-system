@extends('layouts.app')
@section('meta')
<meta name="description" content="{{$about['meta_description']}}">
<meta name="keywords" content="{{$about['meta_keywords']}}">
<meta name="author" content="{{config('app.name')}}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="language" content="English">

<!-- Social meta -->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="{{config('app.name')}} - @if(App::getLocale() === 'en') {{$about['title']}} @else {{$about['title_ar']}}  @endif"/>
<meta property="og:url" content="{{url()->current()}}"/>
<meta property="og:site_name" content="{{config('app.name')}}"/>
<meta property="og:description" content="{{$about['meta_description']}}" />
@stop
@section('content')

<!-- Content -->
<div class="page-content">
    <!--Banner-->
    <div class="aon-page-benner-area">
      <div class="aon-page-banner-row">
        <div class="aon-page-benner-overlay" ></div>
        <div class="sf-banner-heading-wrap">
          <div class="sf-banner-heading-area">
            <div class="sf-banner-heading-large">{{__('About us')}}</div>
            <div class="sf-banner-breadcrumbs-nav">
              <ul class="list-inline">
                <li><a href="{{url('/')}}"> {{__('Home')}} </a></li>
                <li><a href="#">{{__('About us')}}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Banner-->
@if (app()->getLocale()=='en')

    <!-- We are Building  Section -->
    <section class="aon-med-future-area bg-white">
        <div class="container">
            <div class="section-content">
                <div class="aon-med-future-section">
                    <div class="row ">

                        <div class="col-lg-6 col-md-12">
                            <div class="section-head left">
                                <span class="aon-sub-title">Building</span>
                                <h2 class="aon-title">We are Building Sustainable Future.</h2>
                                <ul class="list-check-style2">
                                    <li>
                                        <i class="feather-check"></i>
                                        <h3 class="list-title"> About Massage Majed</h3>
                                        <p>Majid Massage Center was established in the year 2017. It is the first center that provides massage services in the Arab world with the fingers of blind Saudi specialists who hold certificates in the field of therapeutic and preventive massage. The comfort of his clients, as well as the application of the massage service by combining the methods of the Indian, Chinese and Thai schools and the techniques of the Majid Massage Center, which made him distinguished in the field of massage and preventive therapeutic massage.
                                            Majid Massage Center provides massage services under steam in the world, and this service is one of the innovations of Majed Massage Center. Majid Massage Center seeks to comfort its clients by taking into account their privacy. Majed Massage Center uses a combination of natural oils that help in relaxation and give the session a beautiful and pleasant aroma. The center also provides tools that are used only once, and this is in order to constantly strive to provide our services with love to our customers with professionalism and high quality.
                                        </p>
                                    </li>
                                    <li>
                                        <i class="feather-check"></i>
                                        <h3 class="list-title">About Captain Majid
                                        </h3>
                                        <p> It was a dream that became reality.
                                            When I joined King Abdulaziz University in the year 1999, I had a dream of becoming a specialist in the Department of Physiotherapy because of my unbridled desire and high passion to practice the profession of massage, but unfortunately I did not succeed in registering in this specialty.
                                            From that moment, the challenge, persistence and strong determination began to achieve my dream, and I strived hard to collect all the information related to the massage profession, although there were difficulties in identifying any content that I wanted to read, but thanks to trust in God and strong determination, it made me overcome all the obstacles that I faced and achieved my goal. which I dreamed of.
                                            I also took intensive courses, which made me qualified to practice the massage profession in a scientifically correct manner, after that I applied theoretical information practically to everyone around me, including my family, colleagues, etc..
                                            Then I came up with the idea of establishing a center that provides preventive therapeutic massage services and everything that helps to relax in a scientific and natural way.
                                            At the beginning, I established a mini-center in my house, in which I offer a relaxing therapeutic massage service, and after I received great admiration from my clients who visited me in my mini-center, the center became unable to accommodate the large number of clients. I promised that I could not provide the massage service alone, and then my colleague (Yasser Wajih) joined me .
                                            </p></li>
                                    <li>
                                        <i class="feather-check"></i>
                                        <h3 class="list-title">About Captain Yasser
                                        </h3>
                                        <p> With will and ambition, nothing is impossible.
                                            Yasser Wajih, co-founder of Majed Massage Center, who lost his sight when he was seven years old.
                                            He developed a sense of touch since childhood, and despite all the difficulties he faced, he insisted on highlighting this sense and employing it properly, so that the craft of massage became his special advantage in which he found himself.
                                            Yasser Wajih made his way towards the specialty that he loves by practicing the profession of massage and presenting it to his relatives and those around him. He also obtained a valuable course for teaching the blind and graduated first in his batch, after which he participated in many scientific courses specialized in the art of preventive therapeutic massage.
                                            Yasser Wajih practiced massage to become a professional specialist, and he began to provide his services with love and gratitude in home visits, after which he joined his study friend, Captain Majed Khairallah, in his existing project to expand the project and become the first massage center in the Arabian Gulf in the hands of blind Saudi youth .
                                            </p></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="aone-med-future-r-section">
                                <ul>
                                    <li>
                                        <div class="aone-med-future-l-inner">
                                            <div class="aone-med-future-content">
                                                <span><img src="{{asset('front/images/icon1_1.png')}}" alt=""></span>
                                                <h3>Prove you the experience</h3>
                                                <p>with live footage Happily, answer all your questions & concerns</p>
                                            </div>
                                            <div class="media">
                                                <img src="{{asset('front/images/1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="aone-med-future-r-inner">
                                            <div class="media">
                                                <img src="{{asset('front/images/2.jpg')}}" alt="">
                                            </div>
                                            <div class="aone-med-future-content">
                                                <span><img src="{{asset('front/images/icon2_1.png')}}" alt=""></span>
                                                <h3>You are in safe hands</h3>
                                                <p>We Provide you with general awareness about the significance of Massage</p>
                                            </div>

                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- We are Building Section End-->
    @else

     <!-- We are Building  Section -->
  <section class="aon-med-future-area bg-white">
    <div class="container">
        <div class="section-content">
            <div class="aon-med-future-section">
                <div class="row ">

                    <div class="col-lg-6 col-md-12">
                        <div class="section-head left">
                            <span class="aon-sub-title">عن مساج ماجد</span>
                            <h2 class="aon-title">نحن نبني مستقبل مستدام.</h2>
                            <ul class="list-check-style2">
                                 <li>
                                    <i class="feather-check"></i>
                                    <h3 class="list-title">نبذة عن مساج ماجد</h3>
                                    <p>
                                        تأسس مركز مساج ماجد في سنة 2017. حيث يعد المركز الأول اللذي يقدم خدمة التدليك على مستوى العالم العربي بأنامل مختصين سعودين مكفوفين حاصلين على شهادات في مجال التدليك العلاجي الوقائي  ،  يقدم مركز مساج ماجد خدمة التدليك بطريقة علمية وصحيحة و على أعلى مستوى الجودة والكفاءة مراعياً وملبياً راحة عملائه وأيضاً تطبيق خدمة التدليك بالدمج ما بين طرق المدرسة الهندية والصينية والتايلندية والتكنيكات الخاصة بمركز مساج ماجد ، الأمر الذي جعله متميز في مجال المساج والتدليك العلاجي الوقائي  .
                                        مركز مساج ماجد يوفر خدمة تدليك تحت البخار على مستوى العالم ، وهذه الخدمة تعتبر من أحد ابتكارات مركز مساج ماجد. ويسعى مركز مساج ماجد لراحة عملائه بمراعاة خصوصيتهم  . يستخدم مركز مساج ماجد  تركيبة زيوت طبيعية التي تساعد في الاسترخاء ومنح الجلسة رائحة جميلة وزكية وكما أن المركز يوفر أدوات تستخدم لمرة واحدة فقط ، وهذا من أجل السعي الدائم لتقديم خدماتنا بكل حب لعملائنا بإحترافية وجودة عالية .
                                        </p>


                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    <h3 class="list-title">نبذة عن الكابتن ماجد</h3>
                                    <p>
                                        كان حلماً فأصبح حقيقة ،.

                                        عندما التحقت بجامعة الملك عبدالعزيز في سنة 1999 كان لدي حلم بأن أصبح متخصص في قسم العلاج الطبيعي بسبب رغبتي الجامحة وشغفي العالي في ممارسة مهنة التدليك ، ولكن للاسف لم أوَفقْ في التسجيل في هذا التخصيص   .

                                        ومن تلك اللحظة بدأ التحدي والاصرار والعزيمة القوية في تحقيق حلمي وسعيت جاهداً بجمع كل المعلومات التي تخص مهنة التدليك  بالرغم من وجود صعوبات في التعرف على أي محتوى كنت أريد قراءته ، لكن بفضل التوكل على الله و الاصرار القوي  جعلني  اتغلب على كل العقبات التي واجهتني وحققت هدفي الذي كنت احلم فيه .
                                        حصلت أيضا على دورات مكثفة مما جعلتني مؤهلًا لممارسة مهنة التدليك بطريقة علمية صحيحة ، بعد ذلك كنت اقوم بتطبيق المعلومات النظرية بشكل عملي على كل من حولي  من اهلي وزملائي الخ ..

                                        بدايةً أنشات مركز مصغر في منزلي أقدم فيه خدمة التدليك العلاجي الاسترخائي ، وبعد أن تلقيت إعجاب كبير من عملائي اللذين قاموا بزيارتي في مركزي المصغر أصبح المركز لايستوعب العدد الكبير من العملاء . وعدت لا استطيع تقديم خدمة التدليك وحدي وبعد ذلك إنضم إلي زميلي ( ياسر وجيه بعدها جائتني فكرة انشاء مركز يقدم خدمات التدليك العلاجي الوقائي وكل مايساعد على الاسترخاء بشكل علمي طبيعي
                                        </p>
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    <h3 class="list-title">نبذة عن الكابتن ياسر</h3>
                                    <p>بالارادة والطموح لاشيء مستحيل ،.

                                    ياسر وجيه ، شريك مؤسس مركز مساج ماجد الذي كف بصره وهو في السابعة من عمره .
                                    نمت لديه حاسة اللمس منذ الصغر ، ورغم كل الصعوبات التي واجهته الا انه اصر على ان يبرز هذه الحاسه ويوظفها بالشكل الصحيح ، لتصبح حرفة التدليك هي ميزته الخاصه التي وجد فيها نفسه .
                                    شق ياسر وجيه طريقه نحو التخصص الذي يحبه  بممارسته مهنة التدليك وتقديمها لأقربائه والمحيطين به ،حصل أيضاً على دورة قيمة لتعليم المكفوفين وتخرج فيها الأول على دفعته ثم شارك بعدها في العديد من الدورات العلمية المتخصصه في فن التدليك العلاجي الوقائي .
                                    ياسر وجيه إمتهن التدليك ليصبح متخصص محترف ،وصار يقدم خدماته بكل حب وإمتنان في زيارات منزلية ، بعدها إنضمّ لصديق الدراسة الكابتن ماجد خير الله في مشروعه القائم ليتوسع المشروع ويكون أول مركز مساج في الخليج العربي بأيدي شباب سعوديين مكفوفين
                                    </p>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="aone-med-future-r-section">
                            <ul>
                                <li class="animate-v2">
                                    <div class="aone-med-future-l-inner shine-hover">
                                        <div class="aone-med-future-content">
                                            <span><img src="{{asset('front/images/icon1_1.png')}}" alt></span>
                                            <h3>تثبت لك التجربة</h3>
                                            <p> مع لقطات حية لحسن الحظ ، أجب على جميع أسئلتك ومخاوفك</p>
                                        </div>
                                        <div class="media shine-box">
                                            <img src="{{asset('front/images/1.jpg')}}" alt>
                                        </div>
                                    </div>
                                </li>
                                <li class="animate-v3">
                                    <div class="aone-med-future-r-inner shine-hover">
                                        <div class="media shine-box">
                                            <img src="{{asset('front/images/2.jpg')}}" alt>
                                        </div>
                                        <div class="aone-med-future-content">
                                            <span><img src="{{asset('front/images/icon2_1.png')}}" alt></span>
                                            <h3>أنت في أيد أمينة</h3>
                                            <p>نوفر لك الوعي العام بأهمية التدليك </p>
                                        </div>

                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- We are Building Section End-->
    @endif

   <!-- Working Section -->
   <section class="aon-med-working-area bg-white">
    <div class="container">

        <!--Title Section Start-->
        <div class="section-head center">
            <span class="aon-sub-title">{{__('Vision & Mission')}}</span>
            @if(app()->getLocale()=='ar') {!! strip_tags($site_settings -> mission_ar)!!}@else {!! strip_tags($site_settings -> mission)!!} @endif
        </div>
        <!--Title Section End-->


    </div>
   </section>
   <!-- Working Categories END -->


      <!-- Team Section -->
<section class="aon-med-team-area aon-med-team-area2 bg-white ">
    <div class="container">

        <!--Title Section Start-->
        <div class="section-head center">
            <span class="aon-sub-title">{{__('Team')}}</span>
            <h2 class="aon-title">{{__('Our Top Rated')}}</h2>
            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry the standard dummy text ever since the  when an printer took.</p> --}}
        </div>
        <!--Title Section End-->

        <div class="section-content">
            <div class="aon-med-team-section">
                <div class="row">
                    @foreach($team as $t)
                    <div class="col-lg-6 col-md-6">
                        <div class="aon-med-team bg-light-gray">
                            <div class="aon-med-team-pic">
                                <img src="{{$t->image}}" alt="#" style='max-height: 153px;'>
                            </div>
                            <div class="aon-med-team-info">
                                <h4 class="aon-title"><a href="#">{{$t->name}}</a></h4>
                                <p class="aon-med-team-discription">{{$t->title}}</p>
                                {{-- <span class="aon-med-team-position">Massage</span> --}}
                                <div class="aon-df-rating">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    {{-- <span class="aon-df-lable">(124)</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
                <div class="aon-addmore-btn-section">
                    <a href="javascripr:;" class="aon-addplus"><i class="feather-plus"></i></a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Team Section END -->


<section class="aon-med-srv-cat-area  bg-light-gray">





               <div class="sf-map-wrap grayscle-area">

               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d43437.34132917009!2d46.68427268797679!3d24.731411644299357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f02c8793f9459%3A0xed13218a67f87b84!2sAlkhaimah%20Theme%20Park!5e0!3m2!1sen!2seg!4v1663679002627!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

</section>



</div>
<!-- Left & right section END -->

<!-- Content END-->


@stop
