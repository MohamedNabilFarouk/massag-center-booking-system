@extends('admin.layouts.master')
@section('content')
@include('admin.includes.messages')
<div class="card">
                        <h5 class="card-header">Prices List</h5>
                    </div>
            <section class="app-user-list">

                <div class="card">
                    <div class="card-datatable table-responsive pt-0">

<a href="{{route('Bestprices.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> {{trans('admin.Create')}}</a>

                        <table class="user-list-table table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="5%">Title English</th>
                                    <th width="5%">Title Arabic</th>
                                    <th width="5%">Description English</th>
                                    <th width="10%">Description Aarabic</th>
                                    <th width="15%">Price</th>
                                    <th width="15%">Show</th>
                                    <th width="15%">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prices as $row)
                                <tr>
                                    <td class="center">{{$row->id}}</td>
                                    <td class="center">{{$row->title_en}}</td>
                                    <td class="center">{{$row->title_ar}}</td>
                                    <td class="center">{{$row->des_en}}</td>
                                    <td class="center">{{$row->des_ar}}</td>
                                    <td class="center">{{$row->price}}</td>
                                    <td class="center">
                                    @if ($row->status == 1)

                                            <span style="display:none;">1</span><img src="{{url('/')}}/assets/admin/img/check.png">

                                        @else

                                            <span style="display:none;">0</span><img src="{{url('/')}}/assets/admin/img/close.png">

                                        @endif
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-success btn-xs" href="{{route('Bestprices.edit',$row->id)}}" title="{{trans('admin.Edit')}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-xs" href="{{route('Bestprices.destroy',$row->id)}}" title="{{trans('admin.Delete')}}" data-title="{{trans('admin.Confirmation message')}}" data-confirm="{{trans('admin.Are you sure you want to delete this slide')}}?">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    {{ $prices->links('pagination::bootstrap-4') }}
                </div>
            </section>

@endsection



