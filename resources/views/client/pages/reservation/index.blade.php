@extends('client.layouts.main')
@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-12 text-center">
                <h1 class="text-muted font-weight-bolder">{{ $room->hotel->name ?? '' }}</h1>
            </div>
        </div>
    </div>

    @if (session()->has('child_ages'))
        <div class="container mt-2 mb-2">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card pt-0 pb-1 danger-color-dark">
                        <div class="card-body">
                            {{ session('child_ages') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-12 col-12 mb-1">
                <h4 class="text-muted font-weight-bolder">Seçmiş Olduğunuz Oda</h4>
            </div>
            <div class="col-md-12 col-12">
                <div class="card hotel-room-card p-0">
                    <div class="card-body p-0">
                        <div class="row pb-2">
                            <div class="col-md-4 col-12 d-inline-block pl-4 pt-2 pr-4 pr-md-0">
                                <img src="{{ asset($room->cover) }}"
                                     class="hotel-primary-image" alt=""/>
                            </div>
                            <div class="col-md-5 col-12 d-inline-block pl-4 pl-md-2">
                                <div class="mt-2 mb-1 w-100">
                                    <h5 class="text-muted font-weight-bolder">{{ $room->name ?? '' }}</h5>
                                </div>
                                <div class="mt-1 mb-2 w-100">
                                    @forelse($room->features as $feature)
                                        <div class="badge first-badge-special text-wrap" style="width: auto;">
                                            {{ $feature->name ?? '' }}
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="mb-2 w-100">
                                    <label class="text-muted m-0 d-block">
                                        <i class="fa fa-check-circle second-text-color"></i>
                                        {{ $room->room_type->name ?? '' }}
                                    </label>
                                    <label class="text-muted m-0 d-block">
                                        <i class="fa fa-check-circle second-text-color"></i>
                                        {{ $room->hotel->board_type->name ?? '' }}
                                    </label>
                                    <label class="text-muted m-0 d-block">
                                        <i class="fa fa-check-circle second-text-color"></i>
                                        {{ $room->landscape ?? '' }}
                                    </label>
                                </div>
                                <div class="w-100 pt-1 pb-0 text-center d-none d-md-block">
                                    <h4>
                                        <span class="hotel-room-features-view-button first-text-color"><i
                                                    class="fa fa-chevron-down" onclick="hotelRoomFeatures(1);"
                                                    hotel-room-features-button="1" hotel-room-features-status="close"
                                                    data-toggle="popover" data-trigger="hover" data-placement="bottom"
                                                    data-content="Oda Özellikleri"></i></span>
                                    </h4>
                                    <label class="text-muted text-center font-small">Oda Özellikleri</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12 d-inline-block text-center p-1 pt-0 pt-md-4">
                                <div class="mt-0 mt-md-5 mb-2 w-75 p-1 hotel-room-price-box">
                                    <h4 class="font-weight-bolder first-text-color mb-0 room_price"></h4>
                                    <h6 class="text-muted">{{ Helper::custom_night($search['start_date'] ?? '',$search['end_date'] ?? '') }}
                                        Gece</h6>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="w-100 pb-0 text-center d-block d-md-none">
                                    <h4>
                                <span class="hotel-room-features-view-button first-text-color"><i
                                            class="fa fa-chevron-down" onclick="hotelRoomFeatures(1);"
                                            hotel-room-features-button="1" hotel-room-features-status="close"
                                            data-toggle="popover" data-trigger="hover" data-placement="bottom"
                                            data-content="Oda Özellikleri"></i></span>
                                    </h4>
                                    <label class="text-muted text-center font-small">Oda Özellikleri</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="row">
                    <div class="col-md-12 col-12 mt-4">
                        <div class="card hotel-room-features-card p-0 d-none" hotel-room-features="1">
                            <div class="card-body p-0">
                                <div class="row pt-2 pl-3">

                                    @forelse($room->possibilities as $possibility)
                                        <div class="col-md-4 col-6">
                                            <tr>
                                                <td>
                                                    <label class="features-icon-alt">
                                                        <i class="fas fa-certificate"></i>
                                                        <i class="fa fa-check feature-icon-top"></i>
                                                    </label>
                                                </td>
                                                <td><label class="feature-text">{{ $possibility->name ?? '' }}</label>
                                                </td>
                                            </tr>
                                        </div>
                                    @empty
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card box-shadow-none border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <h5 class="text-muted font-weight-bolder pb-1 border-bottom"><i class="fas fa-bed"></i>
                                    Otel Bilgileri</h5>
                            </div>
                            <div class="col-md-3 col-12 pt-2">
                                <label class="text-center font-weight-bolder d-block">{{ $room->hotel->name ?? '' }}</label>
                                <label class="text-center d-block"><i
                                            class="fa fa-sign-in-alt"></i>
                                    {{ Helper::custom_carbon_full_date($search['start_date'] ?? '' ) }}
                                </label>
                                <label class="text-center d-block"><i
                                            class="fa fa-sign-out-alt"></i>
                                    {{ Helper::custom_carbon_full_date($search['end_date'] ?? '' ) }}
                                </label>
                            </div>
                            <div class="col-md-2 col-12 pt-2">

                                <label class="font-weight-bolder d-none d-md-block">{{ $room->hotel->board_type->name ?? '' }}</label>
                                <label class="font-weight-bolder d-block d-md-none text-center">{{ $room->hotel->board_type->name ?? '' }}</label>

                                <label class="text-muted d-none d-md-block">1 {{ $room->room_type->name ?? '' }}</label>
                                <label class="text-muted d-block d-md-none text-center">1 {{ $room->room_type->name ?? '' }}</label>

                            </div>
                            <div class="col-md-4 col-12">
                                <label class="font-weight-bolder mt-md-3 d-none d-md-block">
                                    {{ $search['adult_count'] ?? '' }} Yetişkin
                                    {{ $search['child_count'] ?? '' }} Çocuk
                                </label>
                                <label class="font-weight-bolder mt-md-3 d-block d-md-none text-center">
                                    {{ $search['adult_count'] ?? '' }} Yetişkin
                                    {{ $search['child_count'] ?? '' }} Çocuk
                                </label>
                                <div class="reservation-info-box d-block w-100">
                                    {!! $room->hotel->cancel_description ?? '' !!}
                                </div>
                            </div>
                            <div class="col-md-3 col-12 text-center pt-0 pt-md-0">
                                <h4 class="font-weight-bolder d-block mt-0 mt-md-4 border-bottom pb-2 room_price"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('common.reservation.save') }}" method="POST">
        @csrf

        <input type="hidden" name="room_id" value="{{ $room->id }}">
        <input type="hidden" name="room_price" value="0">
        <input type="hidden" name="child_ages" value="{{ $search['child_ages'] }}">
        <input type="hidden" name="total_amount" value="0">
        <input type="hidden" name="cancel_amount" value="0">
        <input type="hidden" name="transfer_amount" value="0">
        <input type="hidden" name="start_date" value="{{ $search['start_date'] }}">
        <input type="hidden" name="end_date" value="{{ $search['end_date'] }}">
        <input type="hidden" name="adult_count" value="{{ $search['adult_count'] }}">
        <input type="hidden" name="child_count" value="{{ $search['child_count'] }}">

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12 col-12">
                    <label class="font-weight-bolder">Rezervasyon bilgileriniz, belirteceğeniz email adresine
                        gönderilecektir.</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card box-shadow-none border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <h5 class="text-muted font-weight-bolder pb-1 border-bottom"><i
                                                class="fa fa-user"></i>
                                        Kişi Bilgileri</h5>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="md-form first-special-md-form">
                                        <input name="person_name" value="{{ old('person_name') }}" type="text"
                                               id="form1"
                                               class="form-control {{ $errors->has('person_name') ? 'border-danger' : '' }}">
                                        <label for="form1">Ad</label>
                                    </div>
                                    @if ($errors->has('person_name'))
                                        <strong>{{ $errors->first('person_name') }}</strong>
                                    @endif
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="md-form first-special-md-form">
                                        <input name="person_surname" value="{{ old('person_surname') }}" type="text"
                                               id="form2"
                                               class="form-control {{ $errors->has('person_surname') ? 'border-danger' : '' }}">
                                        <label for="form2">Soyad</label>
                                    </div>
                                    @if ($errors->has('person_name'))
                                        <strong>{{ $errors->first('person_surname') }}</strong>
                                    @endif
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="md-form first-special-md-form">
                                        <input name="person_email" value="{{ old('person_email') }}" type="text"
                                               id="form3"
                                               class="form-control {{ $errors->has('person_email') ? 'border-danger' : '' }}">
                                        <label for="form3">E-Mail</label>
                                    </div>
                                    @if ($errors->has('person_email'))
                                        <strong>{{ $errors->first('person_email') }}</strong>
                                    @endif
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="md-form first-special-md-form">
                                        <input name="person_mobile" value="{{ old('person_mobile') }}" type="text"
                                               id="form4"
                                               class="form-control {{ $errors->has('person_mobile') ? 'border-danger' : '' }}">
                                        <label for="form4">Telefon</label>
                                    </div>
                                    @if ($errors->has('person_mobile'))
                                        <strong>{{ $errors->first('person_mobile') }}</strong>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card box-shadow-none none">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <h5 class="text-muted font-weight-bolder pb-1 border-bottom"><i
                                                class="fa fa-users"></i>
                                        Otel - Misafirler</h5>
                                </div>
                                <div class="col-md-12 col-12">
                                    @php
                                        $loop=0;
                                    @endphp
                                    @if(Helper::custom_check_numeric($search['adult_count'] ?? ''))
                                        @for($i=0;$i<$search['adult_count'];$i++)
                                            <div class="w-100 mt-2 mb-2">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <label class="font-weight-bolder mt-2 mb-1">{{ ++$loop }}.
                                                            Misafir:
                                                            Yetişkin</label>
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <select name="adult_gender[]"
                                                                class="browser-default custom-select first-special-select mt-4">
                                                            <option {{ old('adult_gender.' . $i) == 'male' ? 'selected' : null }} value="male">
                                                                Erkek
                                                            </option>
                                                            <option {{ old('adult_gender.' . $i) == 'female' ? 'selected' : null }} value="female">
                                                                Kadın
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('adult_gender.' . $i))
                                                            <strong>{{ $errors->first('adult_gender.' . $i) }}</strong>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <div class="md-form first-special-md-form">
                                                            <label for="form6">Ad</label>
                                                            <input name="adult_name[]"
                                                                   value="{{ old('adult_name.' . $i) }}"
                                                                   type="text"
                                                                   id="form6"
                                                                   class="form-control {{ $errors->has('adult_name.' . $i) ? 'border-danger' : '' }}">
                                                        </div>
                                                        @if ($errors->has('adult_name.' . $i))
                                                            <strong>{{ $errors->first('adult_name.' . $i) }}</strong>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-3 col-6">
                                                        <div class="md-form first-special-md-form">
                                                            <input name="adult_surname[]"
                                                                   value="{{ old('adult_surname.' . $i) }}" type="text"
                                                                   id="form7"
                                                                   class="form-control {{ $errors->has('adult_surname.' . $i) ? 'border-danger' : '' }}">
                                                            <label for="form7">Soyad</label>
                                                        </div>
                                                        @if ($errors->has('adult_surname.'.$i))
                                                            <strong>{{ $errors->first('adult_surname.' . $i) }}</strong>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <div class="md-form first-special-md-form">
                                                            <input name="adult_birthday[]"
                                                                   value="{{ old('adult_birthday.' . $i) }}" type="text"
                                                                   id="form8" class="form-control"
                                                                   data-datepicker="true">
                                                            <label for="form8">Doğum Tarihi</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    @endif
                                    @if(Helper::custom_check_numeric($search['child_count'] ?? ''))
                                        @for($i=0;$i<$search['child_count'];$i++)
                                            <div class="w-100 mt-2 mb-2">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <label class="font-weight-bolder mt-2 mb-1">{{ ++$loop }}.
                                                            Misafir:
                                                            Çocuk</label>
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <select name="child_gender[]"
                                                                class="browser-default custom-select first-special-select mt-4">
                                                            <option {{ old('child_gender.' . $i) == 'male' ? 'selected' : null }} value="male">
                                                                Erkek
                                                            </option>
                                                            <option {{ old('child_gender.' . $i) == 'female' ? 'selected' : null }} value="female">
                                                                Kadın
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <div class="md-form first-special-md-form">
                                                            <label for="form6">Ad</label>
                                                            <input name="child_name[]"
                                                                   value="{{ old('child_name.' . $i) }}"
                                                                   type="text"
                                                                   id="form6"
                                                                   class="form-control {{ $errors->has('child_name.' . $i) ? 'border-danger' : '' }}">
                                                        </div>
                                                        @if ($errors->has('child_name.'.$i))
                                                            <strong>{{ $errors->first('child_name.' . $i) }}</strong>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <div class="md-form first-special-md-form">
                                                            <input name="child_surname[]"
                                                                   value="{{ old('child_surname.' . $i) }}" type="text"
                                                                   id="form7"
                                                                   class="form-control {{ $errors->has('child_surname.' . $i) ? 'border-danger' : '' }}">
                                                            <label for="form7">Soyad</label>
                                                        </div>
                                                        @if ($errors->has('child_surname.'.$i))
                                                            <strong>{{ $errors->first('child_surname.' . $i) }}</strong>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <div class="md-form first-special-md-form">
                                                            <input data-datepicker="true" name="child_birthday[]"
                                                                   value="{{ old('child_birthday.' . $i) }}" type="text"
                                                                   id="form8"
                                                                   class="form-control {{ $errors->has('child_birthday.' . $i) ? 'border-danger' : '' }}">
                                                            <label for="form8">Doğum Tarihi</label>
                                                        </div>
                                                        @if ($errors->has('child_birthday.'.$i))
                                                            <strong>{{ $errors->first('child_birthday.' . $i) }}</strong>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    @endif
                                    <div class="row">
                                        {{--                                        <button type="submit" class="btn btn-success">Gönder</button>--}}
                                    </div>
                                    {{--                                <div class="w-100 mt-2 mb-2">--}}
                                    {{--                                    <div class="row">--}}
                                    {{--                                        <div class="col-md-12 col-12">--}}
                                    {{--                                            <label class="font-weight-bolder mt-2 mb-1">2. Misafir: Yetişkin</label>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="col-md-3 col-6">--}}
                                    {{--                                            <select class="browser-default custom-select first-special-select mt-4">--}}
                                    {{--                                                <option selected>Cinsiyet</option>--}}
                                    {{--                                                <option value="1">Erkek</option>--}}
                                    {{--                                                <option value="2">Kadın</option>--}}
                                    {{--                                            </select>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="col-md-3 col-6">--}}
                                    {{--                                            <div class="md-form first-special-md-form">--}}
                                    {{--                                                <label for="form9">Ad</label>--}}
                                    {{--                                                <input type="text" id="form9" class="form-control">--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="col-md-3 col-6">--}}
                                    {{--                                            <div class="md-form first-special-md-form">--}}
                                    {{--                                                <input type="text" id="form10" class="form-control">--}}
                                    {{--                                                <label for="form10">Soyad</label>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="col-md-3 col-6">--}}
                                    {{--                                            <div class="md-form first-special-md-form">--}}
                                    {{--                                                <input type="text" id="form11" class="form-control">--}}
                                    {{--                                                <label for="form11">Doğum Tarihi</label>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card box-shadow-none border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <h5 class="text-muted font-weight-bolder pb-1 border-bottom"><i
                                                class="fas fa-bus"></i> Ulaşım</h5>
                                </div>
                                <div class="col-md-12 col-12">
                                    <label class="text-muted mt-1 mb-1">
                                        <strong>Ulaşım İster misiniz?</strong>
                                    </label>
                                    <div class="mt-2 mb-2">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input {{ old('is_transportation') == 1 ? 'checked' : null }} checked
                                                   type="radio" value="1" name="is_transportation"
                                                   class="custom-control-input h-collapse" data-target="#istemiyorum"
                                                   id="radio-ulasim">
                                            <label class="custom-control-label" for="radio-ulasim">Ulaşım
                                                İstemiyorum</label>
                                        </div>
                                        {{--                                    <div class="custom-control custom-radio custom-control-inline">--}}
                                        {{--                                        <input type="radio" value="2" name="is_transportation" class="custom-control-input h-collapse" data-target="#ucak" id="radio-ucak">--}}
                                        {{--                                        <label class="custom-control-label" for="radio-ucak">Uçak</label>--}}
                                        {{--                                    </div>--}}
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input {{ old('is_transportation') == 4 ? 'checked' : null }} type="radio"
                                                   value="4" name="is_transportation"
                                                   class="custom-control-input h-collapse" data-target="#transfer"
                                                   id="radio-transfer">
                                            <label class="custom-control-label" for="radio-transfer">Transfer</label>
                                        </div>
                                        {{--                                    <div class="custom-control custom-radio custom-control-inline">--}}
                                        {{--                                        <input type="radio" value="3" name="is_transportation" class="custom-control-input h-collapse" data-target="#otobus" id="radio-otobus">--}}
                                        {{--                                        <label class="custom-control-label" for="radio-otobus">Otobüs</label>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="h-collapse-area">
                                <div class="row mt-3 mb-3" id="ucak">
                                    <div class="col-md-12">
                                        <h5><p class="font-weight-bold text-muted">Uçuş Seçiniz</p></h5>
                                        <div class="card box-shadow-none border">
                                            <div class="card-body">
                                                <div class="mt-2 mb-2">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                               value="c" id="5" name="plane_round_trip">
                                                        <label class="custom-control-label" for="5">Gidiş
                                                            -
                                                            Dönüş İstiyorum</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                               value="b" id="6" name="plane_round_trip">
                                                        <label class="custom-control-label" for="6">Sadece
                                                            Gidiş İstiyorum</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                               value="a" id="7" name="plane_round_trip">
                                                        <label class="custom-control-label" for="7">Sadece
                                                            Dönüş İstiyorum</label>
                                                    </div>
                                                </div>
                                                <div class="mt-3 mb-1">
                                                    <div class="row">
                                                        <div class="col-md-3 pr-0 d-inline-block">
                                                            <select name="plane_passenger_type"
                                                                    class="custom-select">
                                                                <option value="">Seçiniz</option>
                                                                <option value="1">Tüm Yolcular</option>
                                                                <option value="2">Bazı Yolcular</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 pr-0 d-inline-block">
                                                            <input name="plane_from_location"
                                                                   type="text" class="form-control"
                                                                   placeholder="Nereden"/>
                                                        </div>
                                                        <div class="col-md-3 pr-0 d-inline-block">
                                                            <input name="plane_to_location" type="text"
                                                                   class="form-control"
                                                                   placeholder="Nereye"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3" id="otobus">
                                    <div class="col-md-12">
                                        <div class="card box-shadow-none border">
                                            <div class="card-body">
                                                <label class="text-muted mb-1">
                                                    <strong>Otobüs Seçiniz</strong>
                                                </label>
                                                <div class="mt-2 mb-2">
                                                    <div class="row">
                                                        <div class="col-md-3 pr-0 d-inline-block">
                                                            <select name="bus_passenger_type"
                                                                    class="custom-select">
                                                                <option value="">Seçiniz</option>
                                                                <option value="1">Tüm Yolcular</option>
                                                                <option value="2">Bazı Yolcular</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 pr-0 d-inline-block">
                                                            <input name="bus_from_location" type="text"
                                                                   class="form-control"
                                                                   placeholder="Nereden"/>
                                                        </div>
                                                        <div class="col-md-3 pr-0 d-inline-block">
                                                            <input name="bus_to_location" type="text"
                                                                   class="form-control"
                                                                   placeholder="Nereye"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3" id="transfer">
                                    <div class="col-md-12">
                                        <div class="card box-shadow-none border">
                                            <div class="card-body">
                                                <label class="text-muted mb-1">
                                                    <strong>Havaalanı Transfer Seçiniz</strong>
                                                </label>
                                                <div class="mt-3 mb-2" id="transfer_lists">
                                                    @forelse($transfers as $index => $transfer)
                                                        <div class="border-bottom border-top pt-3 pb-1 custom-checkbox">
                                                            <input type="checkbox" class="reservation_transfer"
                                                                   id="transfer{{ ++$index }}"
                                                                   name="reservation_transfer_ids[]"
                                                                   value="{{ $transfer->id }}"
                                                                   data-type="{{ $transfer->transfer_type}}"
                                                                   data-price="{{ $transfer->transfer_price }}">
                                                            <label for="transfer{{ $index }}"
                                                                   class="d-inline-block font-weight-bolder text-muted ml-3">
                                                                {{ $transfer->transfer_from_location ?? ''}}
                                                                - {{ $transfer->transfer_to_location ?? ''}}
                                                            </label>
                                                            <label class="d-inline-block font-weight-bolder text-muted ml-3">
                                                                {{ $transfer->type}}
                                                            </label>
                                                            <label class="d-inline-block second-text-color font-weight-bold float-right mr-3">
                                                                {{ $transfer->transfer_price ?? ''}} {{ session('localize.currency') ?? 'TL' }}
                                                            </label>
                                                        </div>
                                                    @empty
                                                        Henüz bir transfer eklenmedi!
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card box-shadow-none border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <h5 class="text-muted font-weight-bolder pb-1 border-bottom"><i
                                                class="fa fa-ticket-alt"></i> Promosyon ve Fiyat Bilgileri</h5>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="md-form input-group second-special-input-group">
                                        <input value="{{ old('promotional_code') }}" name="promotional_code" type="text"
                                               class="form-control" placeholder="Promosyon Kodu"/>
                                        <div class="input-group-prepend">
                                            <button class="btn btn-md btn-default m-0 px-3" type="button">KULLAN
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <table class="w-100 mt-2 mb-2 border-bottom">
                                        {{--                                        <tr>--}}
                                        {{--                                            <td><label class="text-muted">Promosyonlar</label></td>--}}
                                        {{--                                            <td><label class="float-right font-weight-bolder">Sistemde Yok (Kaldırılabilir)</label></td>--}}
                                        {{--                                        </tr>--}}
                                        <tr>
                                            <td><label class="text-muted">Oda Fiyatı</label></td>
                                            <td><label class="float-right font-weight-bolder room_price"></label></td>
                                        </tr>
                                        <tr>
                                            <td><label class="text-muted">Transfer Fiyatı</label></td>
                                            <td><label id="transfer_price"
                                                       class="float-right font-weight-bolder"></label></td>
                                        </tr>
                                    </table>
                                    <h5 class="font-weight-bolder d-inline-block">Şimdi Ödenecek</h5>
                                    <h5 class="font-weight-bolder float-right d-inline-block total_amount">111</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card box-shadow-none border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <h5 class="text-muted font-weight-bolder pb-1 border-bottom"><i
                                                class="fas fa-sticky-note"></i> Ek İstekler</h5>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                    <textarea name="additional_requests" class="form-control rounded-0"
                                              id="exampleFormControlTextarea1"
                                              rows="5">{{ old('additional_requests') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card box-shadow-none border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <h5 class="text-muted font-weight-bolder pb-1 border-bottom"><i
                                                class="fas fa-credit-card"></i> Ödeme Seçenekleri</h5>
                                </div>
                                <div class="col-md-12 col-12">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        @forelse($room->hotel->payment_types as $payment)
                                            @if($payment->method == 'transfer_payment')
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="transferr-tab" data-toggle="tab"
                                                       href="#transferr" role="tab" aria-controls="transferr"
                                                       aria-selected="true">{{ $payment->name ?? '' }}</a>
                                                </li>
                                            @endif
                                            @if($payment->method == 'card_payment')
                                                <li class="nav-item">
                                                    <a class="nav-link" id="bank-card-tab" data-toggle="tab"
                                                       href="#bank-card" role="tab" aria-controls="bank-card"
                                                       aria-selected="false">{{ $payment->name ?? '' }}</a>
                                                </li>
                                            @endif
                                            @if($payment->method == 'agency_payment')
                                                <li class="nav-item">
                                                    <a class="nav-link" id="agency-tab" data-toggle="tab" href="#agency"
                                                       role="tab" aria-controls="agency"
                                                       aria-selected="false">{{ $payment->name ?? '' }}</a>
                                                </li>
                                            @endif
                                            @if($payment->method == 'hotel_payment')
                                                <li class="nav-item">
                                                    <a class="nav-link" id="hotel-tab" data-toggle="tab" href="#hotel"
                                                       role="tab" aria-controls="hotel"
                                                       aria-selected="false">{{ $payment->name ?? '' }}</a>
                                                </li>
                                            @endif
                                            @if($payment->method == 'mail_payment')
                                                <li class="nav-item">
                                                    <a class="nav-link" id="mail-tab" data-toggle="tab" href="#mail"
                                                       role="tab" aria-controls="mail"
                                                       aria-selected="false">{{ $payment->name ?? '' }}</a>
                                                </li>
                                            @endif
                                        @empty
                                        @endforelse
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
{{--                                        @if($payment->method == 'transfer_payment')--}}
                                            <div class="tab-pane fade show active" id="transferr" role="tabpanel"
                                                 aria-labelledby="transferr-tab">
                                                HAVALE
                                                <input type="hidden" value="1" name="payment_type">
                                                <button type="button" class="btn reservation-transfer-button">Havale
                                                </button>
                                            </div>
{{--                                        @endif--}}
{{--                                        @if($payment->method == 'card_payment')--}}
                                            <div class="tab-pane fade" id="bank-card" role="tabpanel"
                                                 aria-labelledby="bank-card-tab">
                                                <div class="row p-2">
                                                    <div class="col-md-6 col-12">
                                                        <div class="w-100 pt-2">
                                                            <label class="font-weight-bolder d-inline-block text-muted">Şimdi
                                                                Ödenecek</label>
                                                            <h5 class="font-weight-bolder d-inline-block float-right total_amount"></h5>
                                                        </div>
                                                        <div class="w-100 mt-3">
                                                            <table class="w-100">
                                                                <tr class="mb-2">
                                                                    <td class="w-25">
                                                                        <h6 class="mt-2">Kart Sahibi <p></p></h6>
                                                                    </td>
                                                                    <td class="w-75"><input type="text"
                                                                                            class="form-control"
                                                                                            bank-card-input="true"
                                                                                            bank-card-write-type="name-surename"
                                                                                            bank-card-write-element-value="name-surename"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-25">
                                                                        <h6 class="mt-2">Kart No <p></p></h6>
                                                                    </td>
                                                                    <td class="w-75"><input type="number"
                                                                                            class="form-control"
                                                                                            bank-card-input="true"
                                                                                            bank-card-write-type="card-number"
                                                                                            bank-card-write-element-value="number"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-25">
                                                                        <h6 class="mt-2">Kart Geçerlilik Süresi <p></p>
                                                                        </h6>
                                                                    </td>
                                                                    <td class="w-75">
                                                                        <select class="browser-default custom-select first-special-select"
                                                                                style="width: 49% !important;"
                                                                                bank-card-input="true"
                                                                                bank-card-write-type="card-month"
                                                                                bank-card-write-element-value="month">
                                                                            <option selected>Ay</option>
                                                                            @for($i=1;$i<=12;$i++)
                                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                                            @endfor
                                                                        </select>
                                                                        <select class="browser-default custom-select first-special-select w-50"
                                                                                bank-card-input="true"
                                                                                bank-card-write-type="card-year"
                                                                                bank-card-write-element-value="year">
                                                                            <option selected>Yıl</option>
                                                                            @for($i=2019;$i<=2030;$i++)
                                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                                            @endfor
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-25">
                                                                        <h6 class="mt-2">Güvenlik Kodu (CVV2) <p></p>
                                                                        </h6>
                                                                    </td>
                                                                    <td class="w-75"><input type="number"
                                                                                            class="form-control"
                                                                                            bank-card-input="true"
                                                                                            bank-card-write-type="cvv"
                                                                                            bank-card-write-element-value="cvv"/>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="bank-card reservation-bank-card">
                                                            <div class="bank-card-content-front">
                                                                <img class="bank-card-icon"
                                                                     src="https://image.ibb.co/cZeFjx/little_square.png"/>
                                                                <label class="bank-card-bank-name">HALALHOTELCHECK</label>
                                                                <span class="bank-card-logged-icon"><i
                                                                            class="fa fa-chevron-left"></i></span>
                                                                <label class="bank-card-number"
                                                                       bank-card-write-element="number">** ** **
                                                                    1923</label>
                                                                <label class="bank-card-name-surename"
                                                                       bank-card-write-element="name-surename">TUNA
                                                                    AKMAN</label>
                                                                <label class="bank-card-last-date"><span
                                                                            class="text"><span
                                                                                class="first">VALID</span><span
                                                                                class="second">THRU</span></span><span
                                                                            class="date"><span
                                                                                bank-card-write-element="month">05</span>/<span
                                                                                bank-card-write-element="year">19</span></span></label>
                                                                <img src="{{ asset('images/bank-card-logo/visa.png') }}"
                                                                     class="bank-card-type-logo d-none" id="visa"/>
                                                                <img src="{{ asset('images/bank-card-logo/mastercard.png') }}"
                                                                     class="bank-card-type-logo d-none"
                                                                     id="mastercard"/>
                                                                <img src="{{ asset('images/bank-card-logo/maestro.png') }}"
                                                                     class="bank-card-type-logo d-none" id="maestro"/>
                                                                <img src="{{ asset('images/bank-card-logo/american-express.png') }}"
                                                                     class="bank-card-type-logo d-none"
                                                                     id="american-express"/>
                                                            </div>
                                                            <div class="bank-card-content-backend">
                                                                <div class="bank-card-black-line"></div>
                                                                <div class="bank-card-secret-visible-box">
                                                                    <p class="bank-card-secret-visible-text"
                                                                       bank-card-write-element="cvv">*</p>
                                                                </div>
                                                                <img class="bank-card-icon-backend"
                                                                     src="https://image.ibb.co/cZeFjx/little_square.png"/>
                                                                <img src="{{ asset('images/bank-card-logo/visa.png') }}"
                                                                     class="bank-card-type-logo d-none" id="visa"/>
                                                                <img src="{{ asset('images/bank-card-logo/mastercard.png') }}"
                                                                     class="bank-card-type-logo d-none"
                                                                     id="mastercard"/>
                                                                <img src="{{ asset('images/bank-card-logo/maestro.png') }}"
                                                                     class="bank-card-type-logo d-none" id="maestro"/>
                                                                <img src="{{ asset('images/bank-card-logo/american-express.png') }}"
                                                                     class="bank-card-type-logo d-none"
                                                                     id="american-express"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- --}}
                                            </div>
{{--                                        @endif--}}
{{--                                        @if($payment->method == 'agency_payment')--}}
                                            <div class="tab-pane fade" id="agency" role="tabpanel"
                                                 aria-labelledby="agency-tab">
                                                ACENTADA ÖDEME
                                            </div>
{{--                                        @endif--}}
                                            <div class="tab-pane fade" id="hotel" role="tabpanel"
                                                 aria-labelledby="hotel-tab">
                                                OTELDE ÖDEME
                                            </div>
                                            <div class="tab-pane fade" id="mail" role="tabpanel"
                                                 aria-labelledby="mail-tab">
                                                MAİL GÖNDEREREK ÖDEME
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="custom-control custom-checkbox mt-3">
                                        <input name="approval_information" value="1" type="checkbox"
                                               data-checkbox-control="true" data-button-id="1"
                                               class="custom-control-input" id="approval_information">
                                        <label class="custom-control-label" for="approval_information"><a
                                                    data-toggle="modal" data-target="#basicExampleModal"
                                                    class="text-decoration-none text-dark font-weight-bolder">Ön
                                                Bilgilendirme ve Uzak Mesafeli Satış Sözleşmesini okudum ve
                                                onaylıyorum.Rezervasyonunuzu yaparken girmiş olduğunuz kişisel
                                                bilgileriniz, size daha iyi hizmet sunabilmemiz için veri tabanımızda
                                                saklanacak ve işlenecektir. Detaylı bilgi için tıklayınız.</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ön Bilgilendirme ve Uzak Mesafeli Satış
                            Sözleşmesi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! $general->contract_detail ?? ''  !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn first-special-button" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12 col-12">
                    <button type="submit" class="btn details-view-button" data-button="1" disabled="disabled">Detayları
                        Görüntüle
                    </button>
                </div>
            </div>
        </div>

    </form>
@endsection
@section("scripts")
    @include("client.pages.reservation.script")
    <script>
        $(document).ready(function () {
            $('[data-datepicker="true"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    "format": "DD.MM.YYYY",
                    "separator": " - ",
                    "applyLabel": "Apply",
                    "cancelLabel": "Cancel",
                    "fromLabel": "From",
                    "toLabel": "To",
                    "customRangeLabel": "Custom",
                    "weekLabel": "W",
                    "daysOfWeek": [
                        "Pzr",
                        "Pzt",
                        "Slı",
                        "Çar",
                        "Per",
                        "Cum",
                        "Cmt"
                    ],
                    "monthNames": [
                        "Ocak",
                        "Şubat",
                        "Mart",
                        "Nisan",
                        "Mayıs",
                        "Haziran",
                        "Temmuz",
                        "Ağustos",
                        "Eylül",
                        "Ekim",
                        "Kasım",
                        "Aralık"
                    ],
                    "firstDay": 1
                }
            });
        });
    </script>
@endsection
