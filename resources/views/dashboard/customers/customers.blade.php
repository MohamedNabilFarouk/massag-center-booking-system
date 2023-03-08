@extends('layouts.layout')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Users</h2>
                    </div>
                </div>
            </div>
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
                                    <th>Phone Number</th>
                                    <th>wallet</th>
                                    <th>Edit</th>
                                    <th>Delet</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <th scope="row">
                                        <div class="avatar mr-75">
                                            <a href="{{route('customers.show',$customer->id)}}">
                                                @if ($customer->profile_img == null)
                                                <img src="{{ asset('my-assets/app-assets/images/avatars/placeholder.png') }}"
                                                    class="rounded" width="42" height="42" alt="Avatar" />
                                                    @else
                                                    <img src="{{$customer->profile_img}}"
                                                    class="rounded" width="42" height="42" alt="Avatar" />
                                                @endif

                                            </a>
                                        </div>
                                    </th>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->mobile}}</td>
                                    <td>{{$customer->wallet}}$</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a class="dropdown-item" href="{{route('customers.edit',$customer->id)}}">
                                                <i data-feather="edit" class="align-middle mr-50"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            {{-- <a class="dropdown-item" href="{{route('customers.destroy',$customer->id)}}">
                                                <i data-feather="trash-2" class="align-middle mr-50"></i>
                                            </a> --}}
                                            {!! Form::open(['method' => 'DELETE', 'url' => route('customers.destroy', $customer->id), 'style' => 'display:inline']) !!}

                                            {!! Form::button('<i data-feather="trash-2" class="align-middle mr-50"></i>', ['type' => 'submit', 'class' => 'btn btn-defult dropdown-item', 'title' => 'Delete ', 'onclick' => 'return confirm("Confirm delete?")']) !!}

                                            {!! Form::close() !!}
                                        </div>
                                    </td>
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
                    {{ $customers->links('pagination::bootstrap-4') }}
                </div>
                <!-- Dynamic Pagination with reload ends -->
            </section>
            <!-- users list ends -->
        </div>
    </div>
</div>
@endsection
