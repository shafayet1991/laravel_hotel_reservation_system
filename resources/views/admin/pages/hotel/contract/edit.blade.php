@extends('admin.templates.admin.layout')
@section('content')

    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="{{ route('room_contract_detail.index',$detail->contract->room->id ?? '')}}"
                           class="btn btn-primary btn-md"><i class="fa fa-arrow-circle-left"></i> {{ $names['contract_id'] }} Dönüş
                        </a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h4>
                             <strong style="font-size:17px">{{ Helper::custom_where_am_i($names) }}</strong>
                            
You are currently reviewing.
                        </h4>
                        <div class="ln_solid"></div>
                        <form class="form-horizontal" method="POST"
                              action="{{ route('room_contract_detail.update',[$detail->contract->id,$detail->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $detail->contract->id ?? '' }}" name="contract_id">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label" for="adult_rate">Adult<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="adult_rate" name="adult_rate" class="form-control"
                                               value="{{ $detail->adult_rate ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label" for="first_child_rate">1.Child<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" value="{{ $detail->first_child_rate ?? '' }}"
                                               id="first_child_rate" name="first_child_rate"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label" for="second_child_rate">2.Child<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" value="{{ $detail->second_child_rate ?? '' }}"
                                               id="second_child_rate" name="second_child_rate"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label" for="third_child_rate">3.Child<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" value="{{ $detail->third_child_rate ?? '' }}"
                                               id="third_child_rate" name="third_child_rate"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success" style="margin-top: 22px;">Save
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="ln_solid"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

