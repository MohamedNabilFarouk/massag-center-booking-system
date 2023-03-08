@extends('admin.layouts.master')
@section('content')
<div class="card">
                        <h5 class="card-header">{{__('Pages')}}</h5>
                    </div>
            <section class="app-user-list">

                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%"># </th>
                                    <th width="25%">{{trans('Title En')}}</th>
                                    <th width="15%">{{trans('Created at')}}</th>
                                    <th width="20%">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $row)
                                <tr>
                                    <td class="center">{{$row->id}}</td>
                                    <td class="center">{{$row->title }}</td>
                                    <td class="center">{{$row->created_at}}</td>
                                    <td class="center">
                                        @if(\App\Libs\ACL::can('edit-'.$module))
                                        <a class="btn btn-success btn-xs" href="{{$module}}/edit/{{$row->id}}" title="{{trans('admin.Edit')}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endif
                                        @if(\App\Libs\ACL::can('view-'.$module))
                                        <a class="btn btn-primary btn-xs" href="{{$module}}/view/{{$row->id}}" title="{{trans('admin.View')}}">
                                            <i class="fa fa-eye"></i>
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

