@extends('layouts.layout')

@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Statistics Card -->
                        <div class="col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                    <div class="d-flex align-items-center">
{{--                                        <p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p>--}}
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$rows['total_sales']['data']}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Sales</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-info mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$rows['total_customer']['data']}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Customers</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="box" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$rows['total_orders']['data']}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Orders</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="activity" class="font-medium-5"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{$rows['low_stock']['data']}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Low Stock</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>
                    <!-- Avg Sessions Chart Card starts -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row avg-sessions pt-50">
                                    <div class="col-md-4 col-12 mb-2">
                                        <a href="orders.html">
                                            <p class="mb-50">Compelet Orders: {{$rows['completed_orders']['data']}}/{{$rows['total_orders']['data']}}</p>
                                            <div class="progress progress-bar-success" style="height: 6px">
                                                <div class="progress-bar" role="progressbar" aria-valuemin="{{$rows['completed_orders']['data']}}"
                                                     aria-valuemax="{{$rows['total_orders']['data']}}" style="width: {{$rows['completed_orders']['data']}}%"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-12 mb-2">
                                        <a href="Pendingorders.html">
                                            <p class="mb-50">Orders Under Review {{$rows['pending_orders']['data']}}/{{$rows['total_orders']['data']}}</p>
                                            <div class="progress progress-bar-warning" style="height: 6px">
                                                <div class="progress-bar" role="progressbar" aria-valuemin={{$rows['pending_orders']['data']}}
                                                     aria-valuemax="{{$rows['total_orders']['data']}}" style="width: {{$rows['pending_orders']['data']}}%"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <a href="rejectedOrders.html">
                                            <p class="mb-50">Rejected Orders {{$rows['rejected_orders']['data']}}/{{$rows['total_orders']['data']}}</p>
                                            <div class="progress progress-bar-danger" style="height: 6px">
                                                <div class="progress-bar" role="progressbar" aria-valuemin="{{$rows['rejected_orders']['data']}}"
                                                     aria-valuemax="{{$rows['total_orders']['data']}}" style="width: {{$rows['rejected_orders']['data']}}%"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Avg Sessions Chart Card ends -->
                    <div class="row match-height">
                        <!-- Transaction Card -->
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card card-transaction">
                                <div class="card-body">
                                    <div class="transaction-item">
                                        <a href="#">
                                            <div class="media">
                                                <img class="mr-1" src="{{asset('my-assets/app-assets/images/icons/workers.svg')}}"
                                                     alt="workers">
                                                <div class="media-body my-auto">
                                                    <h6 class="transaction-title">Number of Employees</h6>
                                                    <small>{{$rows['total_employee']['data']}} Employee</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card card-transaction">
                                <div class="card-body">
                                    <div class="transaction-item">
                                        <a href="#">
                                            <div class="media">
                                                <img class="mr-1" src="{{asset('my-assets/app-assets/images/icons/Products.svg')}}"
                                                     alt="Products">
                                                <div class="media-body my-auto">
                                                    <h6 class="transaction-title">Number of Products</h6>
                                                    <small>{{$rows['total_products']['data']}} product</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card card-transaction">
                                <div class="card-body">
                                    <div class="transaction-item">
                                        <a href="#">
                                            <div class="media">
                                                <img class="mr-1" src="{{asset('my-assets/app-assets/images/icons/categories.svg')}}"
                                                     alt="categories">
                                                <div class="media-body my-auto">
                                                    <h6 class="transaction-title">Number of Categories</h6>
                                                    <small>{{$rows['total_categories']['data']}} Category</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card card-transaction">
                                <div class="card-body">
                                    <div class="transaction-item">
                                        <a href="#">
                                            <div class="media">
                                                <img class="mr-1" src="{{asset('my-assets/app-assets/images/icons/adds.svg')}}"
                                                     alt="adds">
                                                <div class="media-body my-auto">
                                                    <h6 class="transaction-title">Number of Adds</h6>
                                                    <small>{{$rows['total_ads']['data']}} Add</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Transaction Card -->
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


@endsection
