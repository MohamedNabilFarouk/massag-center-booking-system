@extends('layouts.app')

@section('content')
 <!-- Content -->
 <div class="page-content">

    <!-- Banner Area -->
    <div class="aon-page-benner-area">
     <div class="aon-page-banner-row">
        <div class="aon-page-benner-overlay" ></div>
        <div class="sf-banner-heading-wrap">
          <div class="sf-banner-heading-area">
            <div class="sf-banner-heading-large">{{__('Products')}}</div>
            <div class="sf-banner-breadcrumbs-nav">
              <ul class="list-inline">
                <li><a href="{{url('/')}}">{{__('Home')}}  </a></li>
                <li><a>{{__('Products')}}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Area End -->

    <!-- SHOP SECTION START -->
    <div class="section-full p-t120 p-b90 bg-white">
        <div class="container">



            <div class="row d-flex justify-content-center">

                <!-- SIDE BAR START -->
                <div class="col-xl-4 col-lg-4 col-md-12 rightSidebar  m-b30">

                    <aside  class="side-bar">
                        <form role="search" action='{{route("do.search")}}' method="get">
                            @csrf
                           <!-- SEARCH -->
                           <div class="widget p-a20">
                                <div class="m-b30">
                                    <h4 class="widget-title">{{__('Search')}}</h4>
                                </div>
                                <div class="search-bx">
                                        <div class="input-group">
                                            <input name="title" type="text" class="form-control" placeholder="{{__('Product')}}">

                                        </div>
                                </div>
                            </div>



                          <!--PRICE RANGE SLIDER-->
                           {{-- <div class="widget p-a20 product-range-slider1">

                                <div class="m-b30">
                                    <h4 class="widget-title">{{__('Price Range')}}</h4>
                                </div>

                                <div class="shop-item-price-slider">
                                    <b> 5 {{__('currency')}}</b>

                                    <input id="ex2" type="text" class="span2"  name='range' data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[1,1000]"/>
                                    <b> 1000 {{__('currency')}}</b>
                                </div>

                            </div> --}}




                            {{-- newwwwww --}}

                                  <!--PRICE RANGE SLIDER-->
                                  <div class="widget p-a20 product-range-slider1">

                                    <div class="m-b30">
                                        <h4 class="widget-title">{{__('Price Range')}}</h4>
                                    </div>

                                    <div class="price-input">
                                   <div class="field">
                                    <span class="m-2">{{__('Min')}}</span>
                                      <input type="number" name='min' class="input-min" value="1">
                                     </div>
                                  <div class="separator"></div>
                                   <div class="field">
                                 <span class="m-2">{{__('Max')}}</span>
                                 <input type="number" name='max' class="input-max" value="1000000">
                                 </div>
                                 </div>
                                 <div class="slider">
                                 <div class="progress"></div>
                                 </div>
                                 <div class="range-input">
                                 <input type="range" class="range-min" min="0" max="10000" value="1" step="50">
                                 <input type="range" class="range-max" min="0" max="10000" value="1000000" step="50">
                                  </div>



                            </div>

                            <script>
                                    const rangeInput = document.querySelectorAll(".range-input input"),
                                    priceInput = document.querySelectorAll(".price-input input"),
                                    range = document.querySelector(".slider .progress");
                                    let priceGap = 1000;
                                    priceInput.forEach(input =>{
                                    input.addEventListener("input", e =>{
                                        let minPrice = parseInt(priceInput[0].value),
                                        maxPrice = parseInt(priceInput[1].value);

                                        if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
                                            if(e.target.className === "input-min"){
                                                rangeInput[0].value = minPrice;
                                                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                                            }else{
                                                rangeInput[1].value = maxPrice;
                                                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                                            }
                                        }
                                    });
                                    });
                                    rangeInput.forEach(input =>{
                                    input.addEventListener("input", e =>{
                                        let minVal = parseInt(rangeInput[0].value),
                                        maxVal = parseInt(rangeInput[1].value);
                                        if((maxVal - minVal) < priceGap){
                                            if(e.target.className === "range-min"){
                                                rangeInput[0].value = maxVal - priceGap
                                            }else{
                                                rangeInput[1].value = minVal + priceGap;
                                            }
                                        }else{
                                            priceInput[0].value = minVal;
                                            priceInput[1].value = maxVal;
                                            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                                            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                                        }
                                    });
                                    });

                            </script>

{{-- end newwwwww --}}

                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-lg" style="background-color:#d6ab40"><i class="fa fa-search"></i></button>
                            </span>
                        </form>




                    </aside>

                </div>
                <!-- SIDE BAR END -->

                <div class="col-xl-8 col-lg-8 col-md-12 m-b30">

                    <div class="row">

                    @foreach($products as $p)
                        <!-- COLUMNS 1 -->
                        <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                            <div class="ser-shop-style1-box  ser-shine-hover animate" data-animate="zoomIn" data-duration="1.0s" data-delay="0.1s" data-offset="100">
                                <div class="ser-shop-media">
                                    <a href="{{route('get.product.details',$p->slug)}}"><img src="{{$p->main_image}}" alt=""></a>
                                    {{-- <ul class="shop-item-controls">
                                        <li><a href="javascript:;"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="javascript:;"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul> --}}
                                </div>
                                <div class="ser-shop-info">
                                    <h4 class="ser-shop-title"><a href="{{route('get.product.details',$p->slug)}}">{{$p->title}}</a></h4>
                                    <div class="ser-pro-item-price">
                                        <strong>{{$p->price}} {{__('currency')}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach



                        <!-- Product Pagination -->
                        <div class="site-pagination s-p-center">
                            <ul class="pagination">
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $products->links('pagination::bootstrap-4') }}
                                </div>
                            </ul>
                        </div>

                    </div>

                </div>




            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->


    </div>
<!-- Content END-->


@stop
