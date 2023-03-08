
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
                <div class="aon-page-benner-overlay" ></div>
                <div class="sf-banner-heading-wrap">
                  <div class="sf-banner-heading-area">
                    <div class="sf-banner-heading-large">{{__("Blog")}}</div>
                    <div class="sf-banner-breadcrumbs-nav">
                      <ul class="list-inline">
                        <li><a href="{{url('/')}}">{{__("Home")}}  </a></li>
                        <li><a href="#">{{__("Blog")}}</a></li>
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
                        <div class="col-lg-12">


                            <div class="row">
                                @foreach ($news as $n )


                                <!-- COLUMNS 1 -->
                                <div class="col-lg-4 col-md-12">
                                    <div class="aon-blog-style-1">
                                        <div class="post-bx">
                                            <!-- Content section for blogs start -->
                                            <div class="post-thum">
                                              <img title="title" alt="" src="{{$n->main_image}}">
                                            </div>
                                            <div class="post-info">
                                              {{-- <div class="post-categories"><a href="#">Logistics</a></div> --}}
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
                                                  <a href="{{(route('newsDetails',$n->slug))}}">{{$n->title_field}}</a>
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

                                <div class="site-pagination s-p-center">
                                    <ul class="pagination">
                                        {{ $news->links('pagination::bootstrap-4') }}
                                    </ul>
                                </div>

                            </div>

                        </div>
                        <!-- Left part END -->

                        <!-- Side bar start -->
                        {{-- <div class="col-lg-4">

                            <aside class="side-bar ">

                                <!-- SEARCH -->
                                <div class="widget rounded-sidebar-widget">
                                     <div class="widget_search_bx">
                                        <div class="text-left m-b30">
                                            <h3 class="widget-title">Search</h3>
                                        </div>
                                         <form role="search" method="post">
                                             <div class="input-group">
                                                 <input name="news-letter" type="text" class="form-control" placeholder="Write your text">
                                                 <span class="input-group-btn">
                                                     <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                                 </span>
                                             </div>
                                         </form>
                                     </div>
                                 </div>

                                <!-- RECENT POSTS -->
                                <div class="widget recent-posts-entry rounded-sidebar-widget">
                                     <div class="text-left m-b30">
                                         <h3 class="widget-title">Recent Posts</h3>
                                     </div>

                                    <div class="widget-post-bx">
                                        <div class="owl-carousel aon-recentpost-carousel aon-owl-arrow">

                                            <!-- COLUMNS 1 -->
                                            <div class="item">
                                                <div class="aon-blog-style-1">
                                                    <div class="post-bx">
                                                        <!-- Content section for blogs start -->
                                                        <div class="post-thum">
                                                          <img title="title" alt="" src="images/blog-grid/3.jpg">
                                                        </div>
                                                        <div class="post-info">
                                                          <div class="post-categories"><a href="#">Logistics</a></div>
                                                          <div class="post-meta">
                                                            <ul>
                                                              <li class="post-date"><span>June 18, 2022</span></li>
                                                              <li class="post-author">By
                                                                <a href="#" title="Posts by admin" rel="author">Nina Brown</a>
                                                              </li>

                                                            </ul>
                                                          </div>

                                                          <div class="post-text">
                                                            <h4 class="post-title">
                                                              <a href="blog-detail.html">Helping Companies in  Their Green Transition</a>
                                                            </h4>
                                                          </div>

                                                          <div class="post-read-more">
                                                              <a href="blog-detail.html" class="site-button-link">Read More</a>
                                                          </div>

                                                        </div>
                                                        <!-- Content section for blogs end -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- COLUMNS 2 -->
                                            <div class="item">
                                                <div class="aon-blog-style-1">
                                                    <div class="post-bx">
                                                        <!-- Content section for blogs start -->
                                                        <div class="post-thum">
                                                          <img title="title" alt="" src="images/blog-grid/2.jpg">
                                                        </div>
                                                        <div class="post-info">
                                                          <div class="post-categories"><a href="#">Logistics</a></div>
                                                          <div class="post-meta">
                                                            <ul>
                                                              <li class="post-date"><span>June 18, 2022</span></li>
                                                              <li class="post-author">By
                                                                <a href="#" title="Posts by admin" rel="author">Nina Brown</a>
                                                              </li>

                                                            </ul>
                                                          </div>

                                                          <div class="post-text">
                                                            <h4 class="post-title">
                                                              <a href="blog-detail.html">Helping Companies in  Their Green Transition</a>
                                                            </h4>
                                                          </div>

                                                          <div class="post-read-more">
                                                              <a href="blog-detail.html" class="site-button-link">Read More</a>
                                                          </div>

                                                        </div>
                                                        <!-- Content section for blogs end -->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                 </div>

                                <!-- CATEGORY -->
                                <div class="widget widget_services rounded-sidebar-widget">
                                    <div class="text-left m-b30">
                                        <h3 class="widget-title">Categories</h3>
                                    </div>
                                    <ul>
                                        <li><a href="javascript:void(0);">Branding</a><span class="badge">(28)</span></li>
                                        <li><a href="javascript:void(0);">Corporat</a><span class="badge">(05)</span></li>
                                        <li><a href="javascript:void(0);">Design</a><span class="badge">(24)</span></li>
                                        <li><a href="javascript:void(0);">Gallery</a><span class="badge">(15)</span></li>
                                    </ul>
                                </div>



                                 <!-- Photo Gallery Posts -->
                              <div class="widget gallery-posts-entry rounded-sidebar-widget">
                                     <div class="text-left m-b30">
                                         <h3 class="widget-title">Photo Gallery</h3>
                                     </div>

                                    <div class="widget-post-bx">
                                        <ul class="gallery-posts-widget list-unstyled d-flex flex-wrap row">
                                            <li class="col-md-4 col-6 mb-3"><a href="images/blog-grid/1.jpg" class="elem pic-long"><img src="images/blog-grid/1.jpg" alt=""/></a></li>
                                            <li class="col-md-4 col-6 mb-3"><a href="images/blog-grid/2.jpg" class="elem pic-long"><img src="images/blog-grid/2.jpg" alt=""/></a></li>
                                            <li class="col-md-4 col-6 mb-3"><a href="images/blog-grid/3.jpg" class="elem pic-long"><img src="images/blog-grid/3.jpg" alt=""/></a></li>
                                            <li class="col-md-4 col-6 mb-3"><a href="images/blog-grid/4.jpg" class="elem pic-long"><img src="images/blog-grid/4.jpg" alt=""/></a></li>
                                            <li class="col-md-4 col-6 mb-3"><a href="images/blog-grid/5.jpg" class="elem pic-long"><img src="images/blog-grid/5.jpg" alt=""/></a></li>
                                            <li class="col-md-4 col-6 mb-3"><a href="images/blog-grid/6.jpg" class="elem pic-long"><img src="images/blog-grid/6.jpg" alt=""/></a></li>
                                        </ul>
                                  </div>

                                 </div>



                                <!-- TAGS -->
                                <div class="widget  widget_tag_cloud rounded-sidebar-widget">
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
                                 </div>



                            </aside>

                        </div> --}}
                        <!-- Side bar END -->

                    </div>
                </div>
            </div>
            <!-- Left & right section  END -->

        </div>
        <!-- Content END-->

@stop
