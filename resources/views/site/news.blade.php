
@extends('layouts.app')
@section('meta')
<meta name="description" content="{{$news['meta_description']}}">
<meta name="keywords" content="{{$news['meta_keywords']}}">
<meta name="author" content="{{config('app.name')}}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="language" content="English">

<!-- Social meta -->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="{{config('app.name')}} - @if(App::getLocale() === 'en') {{$news['title']}} @else {{$news['title_ar']}}  @endif"/>
<meta property="og:url" content="{{url()->current()}}"/>
<meta property="og:site_name" content="{{config('app.name')}}"/>
<meta property="og:description" content="{{$news['meta_description']}}" />
@stop
@section('content')

   <!-- Content -->
   <div class="page-content">

    <!-- Banner Area -->
    <div class="aon-page-benner-area">
      <div class="aon-page-banner-row">
        <div class="aon-page-benner-overlay"></div>
        <div class="sf-banner-heading-wrap">
          <div class="sf-banner-heading-area">
            <div class="sf-banner-heading-large">{{__('Blog Details')}}</div>
            <div class="sf-banner-breadcrumbs-nav">
              <ul class="list-inline">
                <li><a href="{{url('/')}}"> {{__('Home')}} </a></li>
                <li><a href="#">{{__('Blog Details')}}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Area End -->

    <!-- Left & right section -->
    <div class="aon-page-jobs-wrap">
        <div class="container">
            <div class="row">



                <!-- Left part start -->
                <div class="col-lg-8">

                    <div class="sf-post-detail">

                        <div class="post blog-post blog-detail">
                          <div class="post-bx">
                              <!-- Content section for blogs start -->
                              <div class="post-thum">
                                <img title="title" alt="" src="images/commin-soon.jpg">
                              </div>
                              <div class="post-info pt-4">
                                <div class="post-meta sf-icon-post-meta">
                                  <ul>
                                    <li class="post-author"><i class="feather-user"></i>{{__('By')}}
                                      <a href="#" title="" rel="">{{__('Massage Majed')}}</a>
                                    </li>
                                    {{-- <li class="post-comment">
                                      <a href="#" title="" rel=""><i class="feather-message-square"></i>Comments</a>
                                    </li>
                                    <li class="post-views">
                                      <a href="#" title="" rel=""><i class="feather-eye"></i>85 Views</a>
                                    </li> --}}

                                  </ul>
                                </div>

                                <div class="post-text">
                                  <h3 class="post-title mb-3">
                                      <a href="#">{{$news->title_field}}</a>
                                  </h3>





                                <div class="row pt-4 pb-2">
                                  <div class="col-lg-5 col-md-6 mb-5"><img src="{{$news->main_image}}" alt=""/></div>

                                </div>



                                <p>{!!$news->content_field!!}</p>

                                  {{-- <blockquote>
                                    <h4>It is a long established fact that a reader will be the readable
                                        content of a page when looking at its layout.</h4>
                                    <span class="quoter">Tom Cruise</span>
                                 </blockquote> --}}





                                 {{-- <div class="sf-post-tags sf-post-tags2">
                                    <h4>{{__('Tags')}}</h4>
                                    <ul>
                                    <li><a href="#">Shopping</a></li>

                                    </ul>
                                 </div> --}}




                                </div>

                              </div>
                              <!-- Content section for blogs end -->
                          </div>
                        </div>
                        <!-- Comment section for blogs start -->
                        {{-- <div class="clear sf-blog-comment-wrap" id="comment-list">
                            <div class="comments-area" id="comments">
                                <h2 class="comments-title m-t0"><span>02</span> Comments</h2>
                                <div>
                                    <!-- COMMENT LIST START -->
                                    <ol class="comment-list">
                                        <li class="comment">
                                            <!-- COMMENT BLOCK -->
                                            <div class="comment-body">
                                                <div class="comment-author vcard">
                                                    <img  class="avatar photo" src="images/pic1_1.jpg" alt="">
                                                    <cite class="fn">Janice Brown</cite>
                                                    <span class="says">says:</span>
                                                </div>
                                                <div class="comment-meta">
                                                    <a href="javascript:void(0);">MAR 18,2022 AT 2:14pm</a>
                                                </div>
                                                <p>Qui officia deserunt mollit anim id est labrum. Duis aute iruret dolor in prehenderit in voludptate velit esse cillum toret eu giat enerit in volptate.</p>
                                                <div class="reply">
                                                    <a href="javscript:;" class="comment-reply-link">Reply</a>
                                                </div>
                                            </div>

                                        </li>

                                        <li class="comment">
                                            <!-- COMMENT BLOCK -->
                                            <div class="comment-body">
                                                <div class="comment-author vcard">
                                                    <img  class="avatar photo" src="images/pic1_1.jpg" alt="">
                                                    <cite class="fn">Janice Brown</cite>
                                                    <span class="says">says:</span>
                                                </div>
                                                <div class="comment-meta">
                                                    <a href="javascript:void(0);">MAR 18,2022 AT 2:14pm</a>
                                                </div>
                                                <p>Qui officia deserunt mollit anim id est labrum. Duis aute iruret dolor in prehenderit in voludptate velit esse cillum toret eu giat enerit in volptate.</p>
                                                <div class="reply">
                                                    <a href="javscript:;" class="comment-reply-link">Reply</a>
                                                </div>
                                            </div>

                                        </li>
                                    </ol>
                                    <!-- COMMENT LIST END -->

                                    <!-- LEAVE A REPLY START -->
                                    <div class="comment-respond m-t30 mb-5" id="respond">
                                        <form class="comment-form" id="commentform" method="post" >

                                            <p class="comment-form-author">
                                                <label>Name <span class="required">*</span></label>
                                                <input class="form-control" type="text" value="" name="user-comment"  placeholder="Name" id="author">
                                            </p>

                                            <p class="comment-form-email">
                                                <label>Email <span class="required">*</span></label>
                                                <input class="form-control" type="text" value="" name="email" placeholder="Email">
                                            </p>

                                            <p class="comment-form-url">
                                                <label>Website</label>
                                                <input class="form-control" type="text"  value=""  name="url"   placeholder="Website" id="url">
                                            </p>

                                            <p class="comment-form-comment">
                                                <label>Comment</label>
                                                <textarea class="form-control" rows="8" name="comment" placeholder="Comment" id="comment"></textarea>
                                            </p>

                                            <p class="form-submit">
                                                <button class="site-button" type="button">Post Comment</button>
                                            </p>

                                        </form>

                                    </div>
                                    <!-- LEAVE A REPLY END -->
                               </div>
                            </div>
                        </div> --}}
                        <!-- Comment section for blogs start -->

                    </div>


                </div>
                <!-- Left part END -->

                <!-- Side bar start -->
                <div class="col-lg-4">

                    <aside class="side-bar ">

                        <!-- SEARCH -->
                        <div class="widget rounded-sidebar-widget">
                             <div class="widget_search_bx">
                                <div class="text-left m-b30">
                                    <h3 class="widget-title">{{__('Share this post')}}</h3>
                                </div>
                                 {{-- share link --}}
               <div class="sharethis-inline-share-buttons" ></div>
               {{-- end share link --}}
                             </div>
                         </div>

                        <!-- RECENT POSTS -->
                        <div class="widget recent-posts-entry rounded-sidebar-widget">
                             <div class="text-left m-b30">
                                 <h3 class="widget-title">{{__('Recent Posts')}}</h3>
                             </div>

                            <div class="widget-post-bx">
                                <div class="owl-carousel aon-recentpost-carousel aon-owl-arrow">
                                    @foreach($all as $n)
                                    <!-- COLUMNS 1 -->
                                    <div class="item">
                                        <div class="aon-blog-style-1">
                                            <div class="post-bx">
                                                <!-- Content section for blogs start -->
                                                <div class="post-thum">
                                                  <img title="title" alt="" src="{{$n->main_image}}">
                                                </div>
                                                <div class="post-info">

                                                  <div class="post-meta">
                                                    <ul>
                                                      <li class="post-date"><span>{{$n->created_at}}</span></li>
                                                      <li class="post-author">{{__('By')}}
                                                        <a href="#" title="Posts by admin" rel="author">{{__('Massage Majed')}}</a>
                                                      </li>

                                                    </ul>
                                                  </div>

                                                  <div class="post-text">
                                                    <h4 class="post-title">
                                                      <a href="#">{{$n->title_field}}</a>
                                                    </h4>
                                                  </div>

                                                  <div class="post-read-more">
                                                      <a href="{{(route('newsDetails',$n->slug))}}" class="site-button-link">{{__('Read More')}}</a>
                                                  </div>

                                                </div>
                                                <!-- Content section for blogs end -->
                                            </div>
                                        </div>
                                    </div>
                                   @endforeach

                                </div>
                            </div>

                         </div>









                        <!-- TAGS -->
                        {{-- <div class="widget  widget_tag_cloud rounded-sidebar-widget">
                             <div class="text-left m-b30">
                                 <h3 class="widget-title">Tags</h3>

                             </div>

                             <div class="tagcloud">
                                 <a href="javascript:void(0);">Physicians</a>
                                  <a href="javascript:void(0);">Surgeon</a>
                                  <a href="javascript:void(0);">Dentist </a>
                                 <a href="javascript:void(0);">Pediatricians</a>
                                 <a href="javascript:void(0);">Cardiologist</a>
                                 <a href="javascript:void(0);">Gynecologist</a>
                                 <a href="javascript:void(0);">ENT Specialist</a>
                             </div>
                         </div> --}}



                    </aside>

                </div>
                <!-- Side bar END -->

            </div>
        </div>
    </div>
    <!-- Left & right section  END -->

    </div>
<!-- Content END-->

@stop
