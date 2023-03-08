@extends('layouts.layout')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="app-user-view">
                <!-- User Card & Plan Starts -->
                <div class="row">
                    <!-- User Card starts-->
                    @foreach ($orders as $order)
                    <div class="col-md-6 col-12">
                        <div class="card user-card">
                            <div class="card-body">
                                <div class="row">
                                    <div
                                        class="col-12 d-flex flex-column justify-content-between border-container-lg">
                                        <div class="user-avatar-section">
                                            <div class="d-flex justify-content-start">
                                                @if ($order->customer == null)
                                                <a href="{{asset('my-assets/app-assets/images/portrait/small/avatar-s-9.jpg')}}">
                                                    <img src="{{asset('my-assets/app-assets/images/portrait/small/avatar-s-9.jpg')}}"
                                                        class="rounded" width="42" height="42" alt="Avatar" />
                                                </a>
                                                @else
                                                <a href="{{$order->customer->profile_img}}">
                                                    <img src="{{$order->customer->profile_img}}"
                                                        class="rounded" width="42" height="42" alt="Avatar" />
                                                </a>
                                                @endif
                                                <div class="d-flex flex-column ml-1">
                                                    <div class="user-info mb-1">
                                                        <h4 class="mb-0">{{$order->customer->name}}</h4>
                                                        <div class="d-flex w-100">
                                                            <h4 class="mb-0">Order Type:&nbsp;&nbsp;&nbsp; </h4>
                                                            @if($order->order_type_id == 1)
                                                            <span class="card-text">Delivery</span>
                                                              @else
                                                            <span class="card-text">Pickup</span>
                                                             @endif

                                                        </div>
                                                        {{-- <div class="d-flex w-100">
                                                            <h4 class="mb-0">Price: </h4>
                                                            <span class="card-text">{{$order['total_amount']}}$</span>
                                                        </div> --}}
                                                    </div>
                                                    <div class="d-flex">
                                                        <form method="get" action="{{ route('AcceptOrReject',[$order->id,1]) }}">
                                                            @csrf
                                                        <button type="submit" class="btn btn-success">Approve</button>
                                                        <a href="{{route('ViewOrders', $order->id)}}"

                                                            class="btn btn-outline-primary ml-1">Details</a>
                                                        </form>
                                                        <form method="get" action="{{ route('AcceptOrReject',[$order->id,0]) }}" style="display:inline">
                                                            @csrf
                                                        <button type="submit" class="btn btn-danger ml-1">Reject</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /User Card Ends-->
                </div>
                <!-- User Card & Plan Ends -->
            </section>
            <!-- Dynamic Pagination with reload starts -->
            <div class="col-12 d-flex justify-content-center">
                {{-- <ul class="pagination url1-links my-1"></ul> --}}
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>
            <!-- Dynamic Pagination with reload ends -->
        </div>
    </div>
</div>

@endsection
