@extends('admin.layouts.master')
@section('content')

                <section class="app-user-edit">
				<div class="card">
                        <h5 class="card-header">{{__('View')}} {{__('Contact Us')}}</h5>
                                <div class="card-body">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">{{__("Home")}}</a></li>
                                            <li class="breadcrumb-item"><a href="{{url('admin')}}/contacts">/ {{__("List")}} {{__("Contact Us")}} </a></li>
                                            <li class="breadcrumb-item active" aria-current="page">{{__('View')}} {{__('Contact Us')}}</li>
                                        </ol>
                                    </nav>
                                </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="warn-with-time">
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}

                                @endif
                            </div>
                            <div class="table-responsive">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered pull-left">
                                    <tr>
                                        <td width="25%" class="align-left">{{trans('Name')}}</td>
                                        <td width="75%" class="align-left">{{$row->name}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" class="align-left">{{trans('Email')}}</td>
                                        <td width="75%" class="align-left"><a href="mailto:{{$row->email}}">{{$row->email}}</a></td>
                                    </tr>
                                    {{-- <tr>
                                        <td width="25%" class="align-left">{{trans('admin.Subject')}}</td>
                                        <td width="75%" class="align-left">{{$row->subject}}</td>
                                    </tr> --}}
                                    <tr>
                                        <td width="25%" class="align-left">{{trans('Message')}}</td>
                                        <td width="75%" class="align-left">{{$row->message}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" class="align-left">{{trans('Created at')}}</td>
                                        <td width="75%" class="align-left">{{$row->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td width="25%" class="align-left">{{trans('Updated at')}}</td>
                                        <td width="75%" class="align-left">{{$row->updated_at}}</td>
                                    </tr>
                                    @if(@$row->admin->name)
                                    <tr>
                                        <td width="25%" class="align-left">{{trans('admin.Created by')}}</td>
                                        <td width="75%" class="align-left">{{@$row->admin->name}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td width="25%" class="align-left">{{trans('Viewed')}}</td>
                                        <td width="75%" class="align-left">{{($row->viewed)?trans('Yes'):trans('No')}}</td>
                                    </tr>
                                </table>
                            </div>
                                <!-- users edit account form ends -->
                            </div>
                        </div>
                </section>

@endsection

