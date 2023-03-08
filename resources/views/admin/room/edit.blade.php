@extends('admin.layouts.master')
@section('content')

@include('admin.includes.messages')



<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Room Update</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                            <form method="post" action="{{ route('Rooms.update', $room->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Title Arabic</label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="title_ar" class="form-control form-control-lg" value="{{ $room->title_ar }}" required placeholder="Title Arabic">
                                    </div>
                                </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Title English</label>
                                        <div class="col-sm-10 ">
                                            <input type='text' name="title"  class="form-control form-control-lg" value="{{ $room->title }}" required placeholder="Title English">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Description Arabic</label>
                                        <div class="col-sm-10 ">

                                            <textarea class="form-control" name='des_ar' rows="4" id="editor">{{ $room->des_ar }}</textarea>

                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Description English</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='des' rows="4" id="editor">{{ $room->des }}</textarea>

                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Number Of This Type</label>
                                        <div class="col-sm-4 ">
                                            <input type='number' name="number" class="form-control form-control-lg" value="{{ $room->number }}" required placeholder="Number">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Night Price</label>
                                        <div class="col-sm-4 ">
                                            <input type='number' name="night_price" class="form-control form-control-lg" value="{{ $room->night_price }}" required placeholder="price">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Night Price With breakfast</label>
                                        <div class="col-sm-4 ">
                                            <input type='number' name="night_price_with_breakfast" class="form-control form-control-lg" value="{{ $room->night_price_with_breakfast }}" required placeholder="price With beakfast">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg"> Price Half Board</label>
                                        <div class="col-sm-4 ">
                                            <input type='number' name="price_half_board" class="form-control form-control-lg" value="{{ $room->price_half_board }}" required placeholder="Price Half Board">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg"> Price Full Board</label>
                                        <div class="col-sm-4 ">
                                            <input type='number' name="price_full_board" class="form-control form-control-lg" value="{{ $room->price_full_board }}" required placeholder="Price Full Board">
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">View</label>
                                        <div class="col-sm-4 ">
                                            <input type='text' name="view" class="form-control form-control-lg" value="{{ $room->view }}" required placeholder="view">
                                        </div>
                                    </div>


                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Size</label>
                                        <div class="col-sm-4 ">
                                            <input type='text' name="room_size" class="form-control form-control-lg" value="{{ $room->room_size }}" required placeholder="size with m2">
                                        </div>
                                    </div>
<br><br>
                                    <div class="row">
                                        <div class="col-xl-6 col-xxl-6 col-6">
                                            <div class="form-check custom-checkbox mb-3 checkbox-success">
                                            <input type="checkbox" name="with_kitchen" class="form-check-input " value='1' @if($room->with_kitchen == 1)  checked   @endif  id="customCheckBox3" >
                                            {{-- <img alt="" class="nd_booking_margin_right_15 nd_booking_display_table_cell nd_booking_vertical_align_middle" width="25" src="{{asset('front/svg/kitchen-01.svg')}}"> --}}
                                            <label class="form-check-label" for="customCheckBox3">With Kitchen</label>

                                            </div>
                                        </div>


                                        <div class="col-xl-4 col-xxl-4 col-4">
                                            <div class="form-check custom-checkbox mb-3 checkbox-success">
                                            <input type="checkbox" name="car_parking" class="form-check-input" value='1' @if($room->car_parking == 1)  checked   @endif  id="customCheckBox3" >
                                                <label class="form-check-label" for="customCheckBox3">Car Parking</label>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Image</label>
                                        <div class="col-sm-4 ">
                                            <input type="file" name="main_image"    class="image_name">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Gallery</label>
                                        <div class="col-sm-4 ">
                                            <input type="file" name="gallery[]"   class="image_name" multiple>
                                        </div>
                                    </div>



<hr>

                                    <label class="col-sm-2 col-form-label col-form-label-lg">Beds</label>
                                    <div class="row">

                                        @foreach($beds as $b)

                                        <div class="col-xl-4 col-xxl-4 col-4">
                                            <div class="form-check custom-checkbox mb-3 checkbox-success">
                                            <input type="checkbox" name="bed[]" class="form-check-input" value='{{$b->id}}' @foreach ($b->room as $r ) @if($room->id == $r->id)  checked   @endif @endforeach id="customCheckBox3" >
                                                <label class="form-check-label" for="customCheckBox3">{{$b->title}}</label>

                                            </div>
                                        </div>

                                    @endforeach
                                    </div>

                                    <hr>

                                    <label class="col-sm-2 col-form-label col-form-label-lg">Bathrooms</label>
                                    <div class="row">

                                    @foreach($bathrooms as $b)
                                        <div class="col-xl-4 col-xxl-4 col-4">
                                            <div class="form-check custom-checkbox mb-3 checkbox-success">
                                                <input type="checkbox" name="bathroom[]" class="form-check-input" value='{{$b->id}}' @foreach ($b->room as $r ) @if($room->id == $r->id)  checked   @endif @endforeach  id="customCheckBox3" >
                                                <label class="form-check-label" for="customCheckBox3">{{$b->title}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                    <hr>

                                    <label class="col-sm-2 col-form-label col-form-label-lg">Facilities</label>
                                    <div class="row">
                                    @foreach($facilities as $b)


                                        <div class="col-xl-4 col-xxl-4 col-4">
                                            <div class="form-check custom-checkbox mb-3 checkbox-success">

                                                <input type="checkbox" name="facility[]" class="form-check-input" value='{{$b->id}}' @foreach ($b->room as $r ) @if($room->id == $r->id)  checked   @endif @endforeach  id="customCheckBox3" >

                                                <label class="form-check-label" for="customCheckBox3">{{$b->title}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>


                                    <div class="col-12  mt-5 ">
                                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                    </div>
                            </form>

                </div>
            </div>
        </div>
    </div>

@stop
