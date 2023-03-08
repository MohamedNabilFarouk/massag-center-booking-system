@extends('layouts.layout')

@section('content')
{{-- @php
    dd($orders->orderProducts[0]);
@endphp --}}
@php
$hash = trim(Request::Cookie('token'));
$admin = \App\Models\AdminToken::whereToken($hash)->first()->admin;
@endphp
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-preview-wrapper">
                <div class="row invoice-preview">
                    <!-- Invoice -->
                    <div class="col-12">
                        <div class="card invoice-preview-card">
                            <div class="card-body invoice-padding pb-0">
                                <!-- Header starts -->
                                <div
                                    class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                    <div>
                                        <div class="logo-wrapper">
                                            <img class="my-2"
                            src="{{ asset('my-assets/app-assets/images/icons/tamam-logo.svg') }}" alt="logo">
                                        </div>
                                        <p class="card-text mb-25">
                                            {{$admin->address}}
                                        </p>
                                        <p class="card-text mb-0"> (966){{$admin->mobile}} </p>
                                    </div>
                                </div>
                                <!-- Header ends -->
                            </div>

                            <hr class="invoice-spacing" />

                            <!-- Address and Contact starts -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row invoice-spacing">
                                    <div class="col-xl-8 p-0">
                                        <h6 class="mb-2">Customer:</h6>
                                        <h6 class="mb-25">{{$orders->customer->name}}</h6>
                                        <p class="card-text mb-25">{{$orders->address->building_number}} - {{$orders->address->street}} -
                                            {{$orders->address->area}} - {{$orders->address->city}} - floor  {{$orders->address->floor_number}} -
                                            flat  {{$orders->address->flat_number}}</p>
                                        <p class="card-text mb-25">({{$orders->customer->country_code}}){{$orders->customer->mobile}}</p>
                                        {{-- <p class="card-text mb-0">peakyFBlinders@gmail.com</p> --}}
                                    </div>
                                    <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                        <h6 class="mb-2">Order Details:</h6>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pr-1">Order Number:</td>
                                                    <td><span class="font-weight-bold">{{$orders->order_num}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-1">Payment Method:</td>
                                                    <td>{{$orders->payment->title}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-1">Delivery Time:</td>
                                                    <td>{{$orders->delivery_time}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-1">Preparation Time:</td>
                                                    <td>{{$orders->preparing_start_time}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-1">Receiving Time:</td>
                                                    <td>{{$orders->delivery_end_time_formatted}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Address and Contact ends -->

                            <!-- Invoice Description starts -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="py-1">order description</th>
                                            <th class="py-1">type</th>
                                            <th class="py-1">numbers</th>
                                            <th class="py-1">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($orders->orderProducts))
                                        @foreach($orders->orderProducts as $product)

                                        <tr>
                                            <td class="py-1">
                                                <p class="card-text font-weight-bold mb-25">{{$product->product->title}}
                                                </p>
                                                <p class="card-text text-nowrap">
                                                    {{$product->product->description}}
                                                </p>
                                            </td>
                                            <td class="py-1">
                                                <span class="font-weight-bold">{{$product->product->category->title}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="font-weight-bold">{{$product->count}}</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="font-weight-bold">${{$product->amount}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td></td>
                                        </tr>
                                        @endif
                                        {{-- <tr class="border-bottom">
                                            <td class="py-1">
                                                <p class="card-text font-weight-bold mb-25">Ui Kit Design</p>
                                                <p class="card-text text-nowrap">Designed a UI kit for native app
                                                    using Sketch, Figma & Adobe XD</p>
                                            </td>
                                            <td class="py-1">
                                                <span class="font-weight-bold">Pizza</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="font-weight-bold">20</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="font-weight-bold">$1200.00</span>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-body invoice-padding pb-0">
                                <div class="row invoice-sales-total-wrapper">
                                    <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                        <p class="card-text mb-0">
                                            <span class="font-weight-bold"></span> <span
                                                class="ml-75"></span>
                                        </p>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                        <div class="invoice-total-wrapper">
                                            {{-- <div
                                                class="invoice-total-item d-flex justify-content-between align-items-center">
                                                <p class="invoice-total-title">Total:</p>
                                                <p class="invoice-total-amount">${{$product->total_amount}}</p>
                                            </div> --}}
                                            <div
                                                class="invoice-total-item d-flex justify-content-between align-items-center">
                                                <p class="invoice-total-title">Discount:</p>
                                                <p class="invoice-total-amount">$0</p>
                                            </div>
                                            <div
                                                class="invoice-total-item d-flex justify-content-between align-items-center">
                                                <p class="invoice-total-title">Tax:</p>
                                                <p class="invoice-total-amount">0%</p>
                                            </div>
                                            <hr class="my-50" />
                                            <div
                                                class="invoice-total-item d-flex justify-content-between align-items-center">
                                                <p class="invoice-total-title">Total:</p>
                                                <p class="invoice-total-amount">$@isset ($orders->total_amount)
                                                    {{$orders->total_amount}}
                                                    @else
                                                    0
                                                @endisset </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Description ends -->
                        </div>
                    </div>
                    <!-- /Invoice -->
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
