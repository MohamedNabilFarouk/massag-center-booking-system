@extends('layouts.layout')
@section('content')
<div class="app-content content ecommerce-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">User Details</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab"
                                    data-toggle="tab" href="#details" aria-controls="details" role="tab"
                                    aria-selected="true">
                                    <i data-feather="user"></i><span class="d-none d-sm-block">Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="orders-tab" data-toggle="tab"
                                    href="#orders" aria-controls="orders" role="tab" aria-selected="false">
                                    <i data-feather="shopping-bag"></i><span class="d-none d-sm-block">Orders</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="favorite-tab" data-toggle="tab"
                                    href="#favorite" aria-controls="favorite" role="tab" aria-selected="false">
                                    <i data-feather="shopping-cart"></i><span
                                        class="d-none d-sm-block">Favorite</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="wallet-tab" data-toggle="tab"
                                    href="#wallet" aria-controls="wallet" role="tab" aria-selected="false">
                                    <i data-feather="pocket"></i><span class="d-none d-sm-block">Wallet</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Details Tab starts -->
                            <div class="tab-pane active" id="details" aria-labelledby="details-tab" role="tabpanel">
                                <div class="col-12">
                                    <div class="card user-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div
                                                    class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                                    <div class="user-avatar-section">
                                                        <div class="d-flex justify-content-start">
                                                            @if ($customer->profile_img == null)
                                                            <img class="img-fluid rounded"
                                                                src="{{ asset('my-assets/app-assets/images/avatars/placeholder.png') }}"
                                                                height="104" width="104" alt="User avatar" />
                                                                @else
                                                                <img class="img-fluid rounded"
                                                                src="{{$customer->profile_img}}"
                                                                height="104" width="104" alt="User avatar" />
                                                                @endif
                                                            <div class="d-flex flex-column ml-1">
                                                                <div class="user-info mb-1">
                                                                    <h4 class="mb-0">{{$customer->name}}</h4>
                                                                    {{-- <span
                                                                        class="card-text">eleanor.aguilar@gmail.com</span> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                                    <div class="user-info-wrapper">
                                                        <div class="d-flex flex-wrap">
                                                            <div class="user-info-title">
                                                                <i data-feather="user" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">Username</span>
                                                            </div>&nbsp&nbsp
                                                            <p class="card-text mb-0">{{$customer->name}}</p>
                                                        </div>
                                                        <div class="d-flex flex-wrap my-50">
                                                            <div class="user-info-title">
                                                                <i data-feather="check" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">Status</span>
                                                            </div>&nbsp&nbsp
                                                            @if ($customer->confirmed == 1 || $customer->confirmed == 2)
                                                            <p class="card-text mb-0">Active</p>
                                                            @else
                                                            <p class="card-text mb-0">Inactive</p>


                                                            @endif
                                                        </div>
                                                        <div class="d-flex flex-wrap my-50">
                                                            <div class="user-info-title">
                                                                <i data-feather="flag" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">Country</span>
                                                            </div>&nbsp&nbsp
                                                            <p class="card-text mb-0">{{$country->name}}</p>
                                                        </div>
                                                        <div class="d-flex flex-wrap">
                                                            <div class="user-info-title">
                                                                <i data-feather="phone" class="mr-1"></i>
                                                                <span
                                                                    class="card-text user-info-title font-weight-bold mb-0">Contact</span>
                                                            </div> &nbsp&nbsp
                                                            <p class="card-text mb-0">({{$customer->country_code}}){{$customer->mobile}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Details Tab ends -->

                            <!-- Orders Tab starts -->
                            <div class="tab-pane" id="orders" aria-labelledby="orders-tab" role="tabpanel">
                                <!-- users ordrs form start -->
                                <section class="app-user-list">
                                    <!-- users filter start -->
                                    {{-- <div class="card">
                                        <h5 class="card-header">Search Filter</h5>
                                        <div
                                            class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
                                            <div class="col-md-4 user_role"></div>
                                            <div class="col-md-4 user_plan"></div>
                                            <div class="col-md-4 user_status"></div>
                                        </div>
                                    </div> --}}
                                    <!-- users filter end -->
                                    <!-- list section start -->
                                    <div class="card">
                                        <div class="card-datatable table-responsive pt-0">
                                            <table class="user-list-table table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Order Number</th>
                                                        <th>Status</th>
                                                        <th>Price</th>
                                                        <th>date</th>
                                                        <th>delivery type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="avatar mr-75">
                                                                @if ($order->customer == null)
                                                                <a href="{{route('ViewOrders', $order->id)}}">
                                                                    <img src="{{asset('my-assets/app-assets/images/portrait/small/avatar-s-9.jpg')}}"
                                                                        class="rounded" width="42" height="42" alt="Avatar" />
                                                                </a>
                                                                @else
                                                                <a href="{{route('ViewOrders', $order->id)}}">
                                                                    <img src="{{$order->customer->profile_img}}"
                                                                        class="rounded" width="42" height="42" alt="Avatar" />
                                                                </a>
                                                                @endif
                                                            </div>
                                                        </th>
                                                        <td>{{$order->customer->name}}</td>
                                                        <td>{{$order['order_num']}}</td>
                                                        <td>{{$order->status->title}}</td>
                                                        <td>{{$order['total_amount']}}</td>
                                                        <td>{{$order['updated_at']}}</td>
                                                        @if($order->order_type_id == 1)
                                                        <td>Delivery</td>
                                                        @else
                                                        <td>Pickup</td>
                                                        @endif
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- list section end -->
                                    <!-- Dynamic Pagination with reload starts -->
                                    <div class="col-12 d-flex justify-content-center">
                                        {{-- <ul class="pagination url1-links my-1"></ul> --}}
                                        {{ $orders->links('pagination::bootstrap-4') }}
                                    </div>
                                    <!-- Dynamic Pagination with reload ends -->
                                </section>
                                <!-- users ordrs form ends -->
                            </div>
                            <!-- Orders Tab ends -->
                            <!-- Favorite Tab starts -->
                            <div class="tab-pane" id="favorite" aria-labelledby="favorite-tab" role="tabpanel">
                                <!-- users favorite form start -->
                                <section class="app-user-list">
                                    <!-- users filter start -->
                                    {{-- <div class="card">
                                        <h5 class="card-header">Search Filter</h5>
                                        <div
                                            class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
                                            <div class="col-md-4 user_role"></div>
                                            <div class="col-md-4 user_plan"></div>
                                            <div class="col-md-4 user_status"></div>
                                        </div>
                                    </div> --}}
                                    <!-- users filter end -->
                                    <!-- list section start -->
                                    <div class="card">
                                        <div class="card-datatable table-responsive pt-0">
                                            <table class="user-list-table table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        {{-- <th>product Number</th> --}}
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product )


                                                    <tr>
                                                        <th scope="row">
                                                            <div class="avatar mr-75">
                                                                <a href="{{route('products.show',$product->id)}}">
                                                                    <img src="{{$product->images}}"
                                                                        class="rounded" width="42" height="42"
                                                                        alt="Avatar" />
                                                                </a>
                                                            </div>
                                                        </th>
                                                        <td>{{$product->title}}</td>
                                                        {{-- <td>12313</td> --}}
                                                        <td>{{$product->price}}$</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- list section end -->
                                    <!-- Dynamic Pagination with reload starts -->
                                    <div class="col-12 d-flex justify-content-center">
                                        {{-- <ul class="pagination url1-links my-1"></ul> --}}
                                        {{ $products->links('pagination::bootstrap-4') }}
                                    </div>
                                    <!-- Dynamic Pagination with reload ends -->
                                </section>
                                <!-- users favorite form ends -->
                            </div>
                            <!-- Favorite Tab ends -->
                            <!-- Wallet Tab starts -->
                            <div class="tab-pane" id="wallet" aria-labelledby="wallet-tab" role="tabpanel">
                                <div class="col-12">
                                    <div class="card user-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div
                                                    class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                                    <div class="user-avatar-section">
                                                        <div class="d-flex justify-content-start">
                                                            @if ($customer->profile_img == null)
                                                            <img class="img-fluid rounded"
                                                                src="{{ asset('my-assets/app-assets/images/avatars/placeholder.png') }}"
                                                                height="104" width="104" alt="User avatar" />
                                                                @else
                                                                <img class="img-fluid rounded"
                                                                src="{{$customer->profile_img}}"
                                                                height="104" width="104" alt="User avatar" />
                                                                @endif
                                                            <div class="d-flex flex-column ml-1">
                                                                <div class="user-info mb-1">
                                                                    <h4 class="mb-0">{{$customer->name}}</h4>
                                                                    {{-- <span
                                                                        class="card-text">eleanor.aguilar@gmail.com</span> --}}
                                                                </div>
                                                                <div>
                                                                    <h5 class="mb-0">{{$customer->wallet}}</h5>
                                                                    <small>wallet</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Wallet Tab ends -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->
        </div>
    </div>
</div>
@endsection
