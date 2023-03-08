@extends('admin.layouts.master')
@section('content')
<div class="card">
                        <h5 class="card-header">Gallery List</h5>
                    </div>
            <section class="app-user-list">

                <div class="card">

                    <div class="card-datatable table-responsive pt-0">
                        @if(\App\Libs\ACL::can('create-'.$module))
<a href="{{url('admin')}}/{{$module}}/create" class="btn btn-success"><i class="fa fa-plus"></i> {{trans('admin.Create')}}</a>
@endif
<br>
                        <table class="user-list-table table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%">{{trans('admin.ID')}} </th>
                <th width="25%">title</th>
                <th width="25%">URL</th>
                <th width="10%">{{trans('admin.Image')}}</th>
                <th width="15%">{{trans('admin.Created at')}}</th>
                <th width="20%">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $row)
                                <tr>
                                <td class="center">{{$row->id}}</td>
                <td class="center">{{$row->title}}</td>
                <td class="center">{{url('uploads/large/'.$row->image_name)}}</td>
                <td class="center">
                    @if($row->image_name)
                    <img src="{{url('uploads/large/'.$row->image_name)}}" width="30">
                    @endif
                </td>
                <td class="center">{{$row->created_at}}</td>

                <td class="center">
                    @if(\App\Libs\ACL::can('delete-'.$module))
                    <a class="btn btn-danger btn-xs" href="{{$module}}/delete/{{$row->id}}" title="{{trans('admin.Delete')}}" data-title="{{trans('admin.Confirmation message')}}" data-confirm="{{trans('admin.Are you sure you want to delete this item')}}?">
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

