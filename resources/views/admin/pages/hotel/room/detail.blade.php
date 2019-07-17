@extends('admin.templates.admin.layout')
@section('content')

    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="{{ route('hotel_room.edit',$room->id )}}"
                           class="btn btn-primary btn-md"><i class="fa fa-arrow-circle-left"></i> Oda Düzenle
                        </a>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h4>
                            <strong style="font-size:17px">{{ Helper::custom_where_am_i($names) }}</strong>
                            adlı yeri inceliyorsunuz şu anda.
                        </h4>
                        <div class="ln_solid"></div>
                        <form class="form-horizontal" method="POST"
                              action="{{ route('room_person_detail.store',$room->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $room->id }}" name="room_id">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label" for="adult_count">Yetişkin<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="adult_count" name="adult_count" class="form-control"
                                               value="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label" for="first_range_count">1.Çocuk<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="first_range_count" name="first_range_count"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label" for="second_range_count">2.Çocuk<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="second_range_count" name="second_range_count"
                                               class="form-control">
                                    </div>
                                </div>
                                @if(!is_null($room->hotel->third_child_limit))
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label" for="third_range_count">3.Çocuk<span
                                                        class="required">*</span>
                                            </label>
                                            <input type="text" id="third_range_count" name="third_range_count"
                                                   class="form-control">
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label" for="total_percentage">Çarpan<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="total_percentage" name="total_percentage"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success" style="margin-top: 22px;">Kaydet
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="ln_solid"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Yetişkin</th>
                                        <th>0 - {{ $hotel->first_child_limit ?? '' }} Çocuk</th>
                                        <th>{{ ceil($hotel->first_child_limit) ?? '' }} - {{ $hotel->second_child_limit ?? '' }} Çocuk</th>
                                        @if(!is_null($room->hotel->third_child_limit))
                                            <th>{{ ceil($hotel->second_child_limit) ?? '' }} - {{ $hotel->third_child_limit ?? '' }} Çocuk</th>
                                        @endif
                                        <th>Çarpan</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($room->details as $detail)
                                        <tr>
                                            <th>{{$detail->adult_count ?? '' }}</th>
                                            <th>{{$detail->first_range_count ?? '' }}</th>
                                            <th>{{$detail->second_range_count}}</th>
                                            @if(!is_null($room->hotel->third_child_limit))
                                                <th>{{$detail->third_range_count}}</th>
                                            @endif
                                            <th>{{$detail->total_percentage}}</th>
                                            <th>
                                                <a class="btn btn-info btn-xs" href="{{ route('room_person_detail.edit',[$room->id,$detail->id]) }}">
                                                    <i class="fa fa-pencil" title="Kontrat Düzenle"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

