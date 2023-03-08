@extends('admin.layouts.master')
@section('content')
<div class="card">
                        <h5 class="card-header">News List</h5>
                    </div>
            <section class="app-user-list">

                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        @if(\App\Libs\ACL::can('create-'.$module))
<a href="{{$module}}/create" class="btn btn-success"><i class="fa fa-plus"></i> {{trans('admin.Create')}}</a>
@endif
                        <table class="user-list-table table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%">{{trans('admin.ID')}} </th>
                                    <th width="25%">{{trans('admin.Title')}}</th>
                                    <th width="15%">{{trans('admin.Image')}}</th>
                                    <th width="15%">{{trans('admin.Created at')}}</th>
                                    @if(isset($rows[0]->published))
                                    @if(\App\Libs\ACL::can('publish-'.$module))
                                    <th width="5%">{{trans('admin.Published')}}?</th>
                                    @endif
                                    @endif
                                    <th width="20%">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $row)
                                <tr>
                                    <td class="center">{{$row->id}}</td>
                                    <td class="center">{{$row->title}}</td>
                                    <td class="center">
                                        @if($row->main_image)
                                        <img src="{{$row->main_image}}" width="100">
                                        @endif
                                    </td>
                                    <td class="center">{{$row->created_at}}</td>
                                    @if(isset($row->published))
                                    @if(\App\Libs\ACL::can('publish-'.$module))
                                    <td class="center">
                                        @if ($row->published == 1)
                                        <a href="{{$module}}/publish/0/{{$row->id}}">
                                            <span style="display:none;">1</span><img src="{{url('/')}}/assets/admin/img/check.png">
                                        </a>
                                        @else
                                        <a href="{{$module}}/publish/1/{{$row->id}}">
                                            <span style="display:none;">0</span><img src="{{url('/')}}/assets/admin/img/close.png">
                                        </a>
                                        @endif
                                    </td>
                                    @endif
                                    @endif
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
                                        @if(\App\Libs\ACL::can('delete-'.$module))
                                        <a class="btn btn-danger btn-xs" href="{{$module}}/delete/{{$row->id}}" title="{{trans('admin.Delete')}}" data-title="{{trans('admin.Confirmation message')}}" data-confirm="{{trans('admin.Are you sure you want to delete this news post')}}?">
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

