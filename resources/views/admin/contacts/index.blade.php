@extends('admin.layouts.master')
@section('content')
<div class="card">
                        <h5 class="card-header">{{__('Contact us')}}</h5>
                    </div>
            <section class="app-user-list">

                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%"># </th>
                                    <th width="20%">{{trans('Name')}}</th>
                                    <th width="20%">{{trans('Email')}}</th>
                                    <th width="10%">{{trans('Viewed')}}</th>
                                    <th width="15%">{{trans('Created at')}}</th>
                                    <th width="15%">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $index=> $row)
                                <tr>
                                    <td class="center">{{$row->id}}</td>
                                    <td class="center">{{$row->name}}</td>
                                    <td class="center"><a href="mailto:{{$row->email}}">{{$row->email}}</a></td>
                                    <td class="center">{{($row->viewed)?trans("Yes"):trans("No")}}</td>
                                    <td class="center">{{$row->created_at}}</td>
                                    <td class="center">
                                        @if(\App\Libs\ACL::can('view-'.$module))
                                        <a class="btn btn-primary btn-xs" href="{{$module}}/view/{{$row->id}}" title="{{trans('admin.View')}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @endif
                                        @if(\App\Libs\ACL::can('delete-'.$module))
                                        <a class="btn btn-danger btn-xs" href="{{$module}}/delete/{{$row->id}}" title="{{trans('admin.Delete')}}" data-title="{{trans('admin.Confirmation message')}}" data-confirm="{{trans('admin.Are you sure you want to delete this contact message')}}?">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    {{ $rows->links('pagination::bootstrap-4') }}
                </div>
            </section>

@endsection

