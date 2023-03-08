@extends('admin.layouts.master')
@section('content')






@include('admin.includes.messages')

<div class="card">
    <h5 class="card-header">Site Settings</h5>
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin')}}/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Settings</li>
                    </ol>
                </nav>
            </div>
</div>

    <div class="card mb-5 mb-xl-8">

        <form class="col-12" action="{{ route('settings.site.update') }}" method="post"
              enctype="multipart/form-data">

        {{ csrf_field() }}
        {{ method_field('put') }}


            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">

                        <table class="table table-hover align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 min-w-325px text-center">@lang('Site Settings')</th>
                                <th class="ps-4 min-w-325px">@lang('value')</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="border">

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column m-auto">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6 text-center">@lang('phone')</a>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> phone }}</a>
                                            <input type="text" name="phone" class="form-control form-control-solid" placeholder="@lang('Enter New') @lang('phone')"/>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column m-auto">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6 text-center">@lang('address Ar')</a>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> address_ar }}</a>
                                            <input type="text" name="address_ar" class="form-control form-control-solid" placeholder="@lang('Enter New') @lang('address ar')"/>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column m-auto">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6 text-center">@lang('address')</a>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> address_en }}</a>
                                            <input type="text" name="address_en" class="form-control form-control-solid" placeholder="@lang('Enter New') @lang('address')"/>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column m-auto">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6 text-center">Email</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> email }}</a>
                                            <input type="text" name="email" class="form-control form-control-solid" placeholder="Enter New Email"/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column m-auto">
                                                <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6 text-center">@lang('Embed Map')</a>
                                            </div>
                                        </div>
                                    </td>


                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                {!! $site_settings -> map !!}
                                                <input type="text" name="map" class="form-control form-control-solid" placeholder=" @lang('Embed a map')"/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
{{-- logo --}}
                            {{-- <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column m-auto">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6 text-center">@lang('logo')</a>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <input type="file" name="logo" class="form-control input-sm image" accept="jpg, png, jpeg, svg">

                                            <img src="{{ $site_settings -> logo }}" width="100px"
                                                 class="img-thumbnail image-preview mt-1" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
{{-- endlogo --}}
{{-- favicon --}}
                            {{-- <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column m-auto">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6 text-center">@lang('favicon')</a>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <input type="file" name="favicon" class="form-control input-sm favicon" accept="jpg, png, jpeg, svg">

                                            <img src="{{ $site_settings -> favicon }}" width="100px"
                                                 class="img-thumbnail favicon-preview mt-1" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
 --}}

{{-- end favicon --}}

                            </tbody>
                            <!--end::Table body-->
                        </table>



                    <!--begin::Table-->
                        {{-- <table class="table table-hover align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="ps-4 min-w-325px text-center">@lang('site.Site Settings')</th>
                                <th class="ps-4 min-w-325px">@lang('site.English')</th>
                                <th class="ps-4 min-w-325px">@lang('site.Arabic')</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="border">
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column m-auto">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6 text-center">@lang('site.Title')</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> title_en }}</a>
                                            <input type="text" name="title_en" class="form-control form-control-solid" placeholder="@lang('site.Enter New') @lang('site.Title') @lang('site.in English')"/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> title_ar }}</a>
                                            <input type="text" name="title_ar" class="form-control form-control-solid" placeholder="@lang('site.Enter New') @lang('site.Title') @lang('site.in Arabic')"/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column m-auto">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Meta Title</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> meta_title_en }}</a>
                                            <input type="text" name="meta_title_en" class="form-control form-control-solid" placeholder="@lang('site.Enter New') Meta Title @lang('site.in English')"/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> meta_title_ar }}</a>
                                            <input type="text" name="meta_title_ar" class="form-control form-control-solid" placeholder="@lang('site.Enter New') Meta Title @lang('site.in Arabic')"/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column m-auto">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Meta Description</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> meta_description_en }}</a>
                                            <input type="text" name="meta_description_en" class="form-control form-control-solid" placeholder="@lang('site.Enter New') Meta Title @lang('site.in English')"/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> meta_description_ar }}</a>
                                            <input type="text" name="meta_description_ar" class="form-control form-control-solid" placeholder="@lang('site.Enter New') Meta Description @lang('site.in Arabic')"/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column m-auto">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Meta Keywords</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> meta_keyword_en }}</a>
                                            <input type="text" name="meta_keyword_en" class="form-control form-control-solid" placeholder="@lang('site.Enter New') Keywords @lang('site.in English')"/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $site_settings -> meta_keyword_ar }}</a>
                                            <input type="text" name="meta_keyword_ar" class="form-control form-control-solid" placeholder="@lang('site.Enter New') Meta Keywords @lang('site.in Arabic')"/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table> --}}


                        <!--end::Table-->
                </div>
                <!--end::Table container-->

                <button type="submit" href="{{route('settings.site.update')}}" class="m-5 btn btn-lg btn-primary float-end">
                    @lang('Update') @lang('Site Settings') <i class="fa fa-edit"></i>
                </button>

            </div>
            <!--begin::Body-->
        </form>
    </div>
    <!--end::Tables Widget 11-->
@endsection
