@extends('admin.layouts.master')

{{-- @php
    dd($products);
@endphp --}}
@section('content')
<div class="card">
                        <h5 class="card-header">Category Products</h5>
                                <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/categories">Categories </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Category Product</li>
                                        </ol>
                                    </nav>
                                </div>
                    </div>
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Category Products</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-block ">
                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                    <i data-feather="plus-square"></i>
                    <a href="{{url('admin/products/create')}}" style="color: aliceblue;">Add
                        Product
                    </a></button>
            </div>
        </div>
        <div class="card d-flex flex-row justify-content-between align-items-center w-100">
            <div class="d-flex flex-row justify-content-center align-items-center">
                <img src="{{$category->logo}}" class="img-fluid"
                    alt="img-placeholder" style="max-width: 350px; border: 1px solid #ddd;
                    border-radius: 4px;
                    padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h5 class="text-black-100 fw-bold">{{$category->title}}</h5>
            </div>
            <div class="d-flex flex-md-row flex-column justify-content-center align-items-center">
                <h5 class="text-black-100 fw-bold"> {{$category->products}} products</h5>
                <div class="custom-control custom-switch mx-5">
                    <input type="checkbox" class="custom-control-input" checked id="categoryStutes" />
                    <label class="custom-control-label" for="categoryStutes"></label>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Wishlist Starts -->
            <section id="wishlist" class="grid-view wishlist-items">
                @foreach ( $products as $product )
                <div class="card ecommerce-card">
                    <div class="item-img text-center">
                        <a href="{{url('admin/products/view/'.$product->id)}}">
                            @foreach ($product->images as $image)


                            <img src="{{$image->image_name}}" class="img-fluid"
                                alt="img-placeholder" />
                                @endforeach
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="item-wrapper">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" checked
                                        id="categoryStutes" />
                                    <label class="custom-control-label" for="categoryStutes"></label>
                                </div>
                                <a class="dropdown-item" href="{{url('admin/products/edit/'.$product->id)}}">
                                    <i data-feather="edit" class="align-middle mr-50"></i>
                                </a>
                            </div>
                            <div class="item-cost">
                                <h6 class="item-price">${{$product->price}}</h6>
                            </div>
                        </div>
                        <div class="item-number">
                            <h6 class="item-number text-success">{{$product->orders}} order</h6>
                        </div>
                        <div class="item-name">
                            <a href="prouductDetails.html">{{$product->title}}</a>
                        </div>
                        <p class="card-text item-description">
                           {{$product->description}}
                        </p>
                    </div>
                    <form method="POST" action="{{url('admin/products/delete/'.$product->id)}}">
                        @csrf
                        @method('DELETE')
                    <div class="item-options text-center">

                        <button type="submit" class="btn btn-light btn-wishlist">
                            {{-- <i data-feather="x"></i> --}}
                            <span>Remove</span>
                        </button>

                    </div>
                </form>
                </div>
                @endforeach

            </section>
            <!-- Wishlist Ends -->
            <!-- Dynamic Pagination with reload starts -->
            <div class="col-12 d-flex justify-content-center">
                {{-- <ul class="pagination url1-links my-1"></ul> --}}
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
            <!-- Dynamic Pagination with reload ends -->
        </div>

@endsection
