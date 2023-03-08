@extends('layouts.layout')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
 <!-- users list start -->
 <section class="app-user-list">
    <!-- users filter start -->
    {{-- <div class="card">
        <h5 class="card-header">Search Filter</h5>
        <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
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
                        <th>Date</th>
                        <th>Order type</th>
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
<!-- users list ends -->
</div>
</div>
</div>
@endsection
