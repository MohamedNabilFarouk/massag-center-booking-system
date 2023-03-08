@extends('admin.layouts.master')
@section('content')

@include('admin.includes.messages')



<div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Hotel Rules</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                            <form method="post" action="{{ route('settings.site.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="mb-3 row mt-5">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Check in</label>
                                    <div class="col-sm-10 ">
                                        <input type='text' name="rules_checkin" class="form-control form-control-lg" value="{{ $site_settings -> rules_checkin }}"  placeholder="Check In">
                                    </div>
                                </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Check Out</label>
                                        <div class="col-sm-10 ">
                                            <input type='text' name="rules_checkout"  class="form-control form-control-lg" value="{{ $site_settings -> rules_checkout}}"  placeholder="Chekout">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Cancellation</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='rules_cancellation' rows="4" id="editor">{{ $site_settings -> rules_cancellation}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Cancellation Ar</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='rules_cancellation_ar' rows="4" id="editor">{{ $site_settings -> rules_cancellation_ar	}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Children & Bed</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='rules_children_and_bed' rows="4" id="editor">{{ $site_settings -> rules_children_and_bed}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Children & Bed Ar</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='rules_children_and_bed_ar' rows="4" id="editor">{{ $site_settings -> rules_children_and_bed_ar	}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Restriction</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='rules_age_restriction' rows="4" id="editor">{{ $site_settings -> rules_age_restriction	}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Restriction Ar</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='rules_age_restriction_ar' rows="4" id="editor">{{ $site_settings -> rules_age_restriction_ar	}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Pets</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='rules_pets' rows="4" id="editor">{{ $site_settings -> rules_pets	}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Pets Ar</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='rules_pets_ar' rows="4" id="editor">{{ $site_settings -> rules_pets_ar	}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Card</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='rules_card' rows="4" id="editor">{{ $site_settings -> rules_card	}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row mt-5">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Card Ar</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" name='rules_card_ar' rows="4" id="editor">{{ $site_settings -> rules_card_ar	}}</textarea>
                                        </div>
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

