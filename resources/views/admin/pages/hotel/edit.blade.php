@extends('admin.templates.admin.layout')
@section('content')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            width: 1120px;
        }

    </style>
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i>
                            <strong style="font-size:17px">{{ Helper::custom_where_am_i($names) }}</strong>
                            adlı yeri inceliyorsunuz şu anda.
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation"
                                    class="{{ app('request')->input('tab') == 'general_information' ? 'active' : '' }}">
                                    <a href="#general_information" id="home-tab" role="tab" data-toggle="tab"
                                       aria-expanded="false">Genel Bilgiler</a>
                                </li>
                                <li role="presentation"
                                    class="{{ app('request')->input('tab') == 'photos' ? 'active' : '' }}"><a
                                            href="#photos" role="tab" id="profile-tab" data-toggle="tab"
                                            aria-expanded="false">Resimler</a>
                                </li>
                                <li role="presentation"
                                    class="{{ app('request')->input('tab') == 'rooms' ? 'active' : '' }}"><a
                                            href="#rooms" role="tab" id="profile-tab3" data-toggle="tab"
                                            aria-expanded="true">Odalar</a>
                                </li>
                                <li role="presentation"
                                    class="{{ app('request')->input('tab') == 'facilities' ? 'active' : '' }}"><a
                                            href="#facilities" role="tab" id="profile-tab4" data-toggle="tab"
                                            aria-expanded="true">Özellikler</a>
                                </li>
                                <li role="presentation"
                                    class="{{ app('request')->input('tab') == 'general_setting' ? 'active' : '' }}"><a
                                            href="#general_setting" role="tab" id="profile-tab5" data-toggle="tab"
                                            aria-expanded="true">Bitir</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel"
                                     class="tab-pane fade {{ app('request')->input('tab') == 'general_information' ? 'active in' : '' }}"
                                     id="general_information" aria-labelledby="home-tab">
                                    <form class="form-horizontal" method="POST"
                                          action="{{url('adminpanel/hotel/'.$hotel->id)}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="slugconvert">Otel Adı <span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="slugconvert" name="name"
                                                           class="form-control" value="{{$hotel->name}}">
                                                </div>
                                                <input type="hidden" value="{{ $hotel->id }}" name="hotel_id">
                                                <div class="form-group">
                                                    <label class="control-label" for="slug">URL Yapılandırması<span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="slug" value="{{ $hotel->slug ?? old('slug') }}" name="slug"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="hotel_description">Hotel
                                                        Açıklama<span class="required">*</span>
                                                    </label>
                                                    <textarea class="form-control" id="hotel_description" rows="2"
                                                              name="hotel_description">{{ $hotel->hotel_description ?? old('hotel_description') }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="cancel_description">İptal
                                                        Açıklaması<span class="required">*</span>
                                                    </label>
                                                    <textarea id="cancel_description" class="form-control" rows="2"
                                                              name="cancel_description">{{ $hotel->cancel_description ?? old('cancel_description') }}</textarea>
                                                </div>

{{--                                                <div class="form-group">--}}
{{--                                                    <label class="control-label" for="hotel_type_id">Otel Tipi<span--}}
{{--                                                                class="required">*</span>--}}
{{--                                                    </label>--}}
{{--                                                    <select multiple class="form-control" name="hotel_type_id[]"--}}
{{--                                                            required>--}}
{{--                                                        <option value="0" disabled>Seçin</option>--}}
{{--                                                        @forelse($hotel_types as $type)--}}
{{--                                                            <option value="{{$type->id}}" {{ in_array($type->id,$hotel_type_ids) ? "selected" : null }}>{{$type->name}}</option>--}}
{{--                                                        @empty--}}
{{--                                                        @endforelse--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}

                                                <div class="form-group">
                                                    <label class="control-label" for="phone">Otel Telefon <span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="phone" name="phone"
                                                           class="form-control" value="{{$hotel->phone}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="address">Adres <span
                                                                class="required">*</span>
                                                    </label>
                                                    <textarea class="form-control" rows="2"
                                                              name="address">{{ $hotel->address }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="restaurant_distance">Otelin Yıldız
                                                        Sayısı (Max 5)<span class="required">*</span>
                                                    </label>
                                                    <input type="number" id="start" maxlength="5"
                                                           name="star"
                                                           value="{{ $hotel->star ?? old('start') }}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="commission_rate">Komisyon Oranı (%
                                                        Yüzdelik)<span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="commission_rate"
                                                           value="{{ $hotel->commission_rate ?? '' }}"
                                                           name="commission_rate" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="country_id">Ülke<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" id="country_id" name="country_id">
                                                        <option disabled>Seçin</option>
                                                        @forelse($countries as $country)
                                                            <option {{ Helper::custom_selected_option($country->sortname ?? '',$hotel->country->sortname ?? '') }} value="{{$country->id}}">{{$country->name}}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="city_id">Il<span class="required">*</span>
                                                    </label>
                                                    <select class="form-control" id="city_id" name="city_id">
                                                        {{--                                                        <option value="0" disabled>Seçin</option>--}}
                                                        @if(!is_null($cities))
                                                            @forelse($cities as $city)
                                                                <option value="{{$city->id}}" {{ Helper::custom_selected_option($city->id,$hotel->city_id) }}>{{$city->name}}</option>
                                                            @empty
                                                            @endforelse
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="county_id">Ilçe<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="county_id" id="county_id">
                                                        {{--                                                        <option value="0" disabled>Seçin</option>--}}
                                                        @if(!is_null($counties))
                                                            @foreach($counties as $county)
                                                                <option value="{{$county->id}}" {{$hotel->county_id == $county->id ? "selected":""}}>{{$county->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="airport_id">Hava Limanı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="airport_id" required>
                                                        <option disabled>Seçin</option>
                                                        @foreach($airports as $airport)
                                                            <option value="{{$airport->id}}" {{$hotel->airport_id == $airport->id ? "selected":''}}>{{$airport->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="email">Otel Mail <span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="email" name="email"
                                                           class="form-control" value="{{$hotel->email}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="checkout_time">Checkout Time <span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="checkout_time" name="checkout_time"
                                                           class="form-control"
                                                           value="{{$hotel->checkout_time}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="min_day">En Az Gün <span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="min_day" name="min_day"
                                                           class="form-control" value="{{$hotel->min_day}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="ops_day">Ops. Gün <span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="ops_day" name="ops_day"
                                                           class="form-control" value="{{$hotel->ops_day}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="airport_distance">Havaalanı
                                                        Mesafesi<span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="airport_distance" name="airport_distance"
                                                           value="{{$hotel->airport_distance ?? ''}}"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="sea_distance">Deniz Mesafesi<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="sea_distance" name="sea_distance"
                                                           value="{{$hotel->sea_distance ?? ''}}"
                                                           class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label" for="restaurant_distance">Restaurant
                                                        Mesafesi<span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="restaurant_distance"
                                                           name="restaurant_distance"
                                                           value="{{$hotel->restaurant_distance ?? ''}}"
                                                           class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label" for="restaurant_distance">Otelin
                                                        Kampanyası<span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="campaign"
                                                           name="campaign"
                                                           value="{{$hotel->campaign ?? old('campaign')}}"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="hotel_board_type_id">Otel Pansiyon
                                                        Tipi<span class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="hotel_board_type_id">
                                                        @forelse($hotel_board_types as $board_type)
                                                            <option value="{{$board_type->id}}" {{ Helper::custom_selected_option($board_type->id,$hotel->hotel_board_type_id) }}> {{ $board_type->name }} </option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="currency_id">Para Birimi<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="currency_id" required>
                                                        <option disabled>Seçin</option>
                                                        @foreach($currencies as $currency)
                                                            <option value="{{$currency->id}}" {{$hotel->currency_id == $currency->id ? "selected":""}}>{{$currency->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="latitude">Enlem <span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="latitude" name="latitude"
                                                           class="form-control" value="{{$hotel->latitude}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="longitude">Boylam <span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="longitude" name="longitude"
                                                           class="form-control"
                                                           value="{{$hotel->longitude}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="season_date">Sezon Tarihi <span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control date" id="season_date"
                                                           name="season_date" value="{{$hotel->season_date}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="authorized_full_name">Yetkili<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="authorized_full_name"
                                                           name="authorized_full_name"
                                                           class="form-control"
                                                           value="{{$hotel->authorized_full_name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="authorized_phone">Yetkili Telefon
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="authorized_phone" name="authorized_phone"
                                                           class="form-control"
                                                           value="{{$hotel->authorized_phone}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="authorized_email">Yetkili Mail
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="authorized_email" name="authorized_email"
                                                           class="form-control"
                                                           value="{{$hotel->authorized_email}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="shop_distance">Market
                                                        Mesafesi<span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="shop_distance" name="shop_distance"
                                                           class="form-control"
                                                           value="{{$hotel->shop_distance ?? ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="hospital_distance">Hastane
                                                        Mesafesi<span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="hospital_distance" name="hospital_distance"

                                                           value="{{$hotel->hospital_distance ?? ''}}"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="center_distance">Merkez
                                                        Mesafesi<span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="center_distance" name="center_distance"
                                                           value="{{$hotel->center_distance ?? ''}}"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="baby_age_limit">Bebek Yaş Sınırı
                                                        <span class="required"> (Kontrat hesaplaması için gereklidir ve zorunlu alandır.) *</span>
                                                    </label>
                                                    <input value="{{$hotel->baby_age_limit ?? ''}}" type="text"
                                                           id="baby_age_limit" name="baby_age_limit"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="child_age_limit">Çocuk Yaş Sınırı
                                                        <span class="required"> (Kontrat hesaplaması için gereklidir ve zorunlu alandır.) *</span>
                                                    </label>
                                                    <input value="{{$hotel->child_age_limit ?? ''}}" type="text"
                                                           id="child_age_limit" name="child_age_limit"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="young_age_limit">Genç Yaş Sınırı
                                                        <span class="required"> (Kontrat hesaplaması için gereklidir ve zorunlu alandır.) *</span>
                                                    </label>
                                                    <input value="{{$hotel->young_age_limit ?? ''}}" type="text"
                                                           id="young_age_limit" name="young_age_limit"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-success">Kaydet</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div role="tabpanel"
                                     class="tab-pane fade {{ app('request')->input('tab') == 'photos' ? 'active in' : '' }}"
                                     id="photos" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <div class="col-sm-10 offset-sm-1">
                                            <h2 class="page-heading">Yüklenen resimler <span id="counter"></span></h2>
                                            <form method="post" action="{{ url('/adminpanel/hotel_add_file') }}"
                                                  enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="file_type_id" value="1">
                                                <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                                                @isset($hotel->files)
                                                    @foreach($hotel->files as $file)
                                                        <div class="dz-preview dz-processing dz-image-preview dz-complete"
                                                             data-path="{{asset("/adminpanel/hotel_remove_file")}}"
                                                             data-id="{{$file->id}}" data-url="{{$file->name}}"
                                                             data-name="{{$file->original_name}}">
                                                            <div class="dz-image">
                                                                <img data-dz-thumbnail="" alt="" width="120"
                                                                     height="120"
                                                                     src="{{asset("hotels/images/".$file->name)}}">
                                                            </div>
                                                            <div class="dz-progress"><span class="dz-upload"
                                                                                           data-dz-uploadprogress=""
                                                                                           style="width: 100%;"></span>
                                                            </div>
                                                            <div class="dz-error-message"><span
                                                                        data-dz-errormessage=""></span></div>
                                                            <div class="dz-success-mark">
                                                                <svg width="54px" height="54px" viewBox="0 0 54 54"
                                                                     version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                                                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                                                                    <title>@lang('listing.check')</title>
                                                                    <desc>@lang('listing.Created_with_Sketch')</desc>
                                                                    <defs></defs>
                                                                    <g id="Page-1" stroke="none" stroke-width="1"
                                                                       fill="none" fill-rule="evenodd"
                                                                       sketch:type="MSPage">
                                                                        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                                                                              id="Oval-2" stroke-opacity="0.198794158"
                                                                              stroke="#747474"
                                                                              fill-opacity="0.816519475" fill="#FFFFFF"
                                                                              sketch:type="MSShapeGroup"></path>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <div class="dz-error-mark">
                                                                <svg width="54px" height="54px" viewBox="0 0 54 54"
                                                                     version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                                                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                                                                    <title>@lang('listing.error')</title>
                                                                    <desc>@lang('listing.Created_with_Sketch')</desc>
                                                                    <defs></defs>
                                                                    <g id="Page-1" stroke="none" stroke-width="1"
                                                                       fill="none" fill-rule="evenodd"
                                                                       sketch:type="MSPage">
                                                                        <g id="Check-+-Oval-2"
                                                                           sketch:type="MSLayerGroup" stroke="#747474"
                                                                           stroke-opacity="0.198794158" fill="#FFFFFF"
                                                                           fill-opacity="0.816519475">
                                                                            <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                                                                                  id="Oval-2"
                                                                                  sketch:type="MSShapeGroup"></path>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <a class="dz-remove" href="javascript:undefined;"
                                                               data-dz-remove="">Sil</a>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="dz-message">
                                                    <div class="col-xs-8">
                                                        <div class="message">
                                                            <p>Dosyaları buraya sürükle yada yüklemek icin tıklayın</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fallback">
                                                    <input type="file" name="file" multiple>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    {{--Dropzone Preview Template--}}
                                    <div id="preview" style="display: none;">

                                        <div class="dz-preview dz-file-preview">
                                            <div class="dz-image"><img data-dz-thumbnail/></div>

                                            <div class="dz-details">
                                                <div class="dz-size"><span data-dz-size></span></div>
                                                <div class="dz-filename"><span data-dz-name></span></div>
                                            </div>
                                            <div class="dz-progress"><span class="dz-upload"
                                                                           data-dz-uploadprogress></span></div>
                                            <div class="dz-error-message"><span data-dz-errormessage></span></div>


                                            <div class="dz-success-mark">

                                                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                                                    <title>Check</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <defs></defs>
                                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                       fill-rule="evenodd" sketch:type="MSPage">
                                                        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                                                              id="Oval-2" stroke-opacity="0.198794158" stroke="#747474"
                                                              fill-opacity="0.816519475" fill="#FFFFFF"
                                                              sketch:type="MSShapeGroup"></path>
                                                    </g>
                                                </svg>

                                            </div>
                                            <div class="dz-error-mark">

                                                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                                                    <title>error</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <defs></defs>
                                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                       fill-rule="evenodd" sketch:type="MSPage">
                                                        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup"
                                                           stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF"
                                                           fill-opacity="0.816519475">
                                                            <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
                                                                  id="Oval-2" sketch:type="MSShapeGroup"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    {{--End of Dropzone Preview Template--}}
                                </div>
                                <div role="tabpanel"
                                     class="tab-pane fade {{ app('request')->input('tab') == 'rooms' ? 'active in' : '' }}"
                                     id="rooms" aria-labelledby="profile-tab">
                                    <h4>
                                        <strong style="font-size:17px">{{ Helper::custom_where_am_i($names) }}</strong>
                                        için
                                        yeni bir oda oluştur.
                                    </h4>
                                    <div class="ln_solid"></div>
                                    <form class="form-horizontal" method="POST"
                                          action="{{url('adminpanel/hotel_room')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="room_type_id">Oda Tipi<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="room_type_id">
                                                        @foreach($room_types as $room_type)
                                                            <option value="{{$room_type->id}}">{{$room_type->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Oda Adı
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="name" name="name"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="code">Oda Kodu
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="code" name="code"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="count">Oda Sayısı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="count" name="count"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="min_adult_count">Minimum Yetişkin
                                                        Sayısı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="min_adult_count" name="min_adult_count"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="max_adult_count">Maximum Yetişkin
                                                        Sayısı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="max_adult_count" name="max_adult_count"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="min_baby_count">Minimum Bebek
                                                        Sayısı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="min_baby_count" name="min_baby_count"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="max_baby_count">Maximum Bebek
                                                        Sayısı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="max_baby_count" name="max_baby_count"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="min_child_count">Minimum Çocuk
                                                        Sayısı
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="min_child_count" name="min_child_count"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="max_child_count">Maximum Çocuk
                                                        Sayısı
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="max_child_count" name="max_child_count"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="min_young_count">Minimum Genç
                                                        Sayısı
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="min_young_count" name="min_young_count"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="max_young_count">Maximum Genç
                                                        Sayısı
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="max_young_count" name="max_young_count"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="single_factor">Single Çarpan
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="single_factor" name="single_factor"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="double_factor">Double Çarpan
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="double_factor" name="double_factor"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="triple_factor">Triple Çarpan
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="triple_factor" name="triple_factor"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="quad_factor">Quad Çarpan
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="quad_factor" name="quad_factor"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="five_factor">Five Çarpan
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input value="{{ old('five_factor') }}" type="text" id="five_factor"
                                                           name="five_factor"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="six_factor">Six Çarpan
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input value="{{ old('six_factor') }}" type="text" id="six_factor"
                                                           name="six_factor"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="max_bed_count">Maximum Yatak
                                                        Sayısı
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="max_bed_count" name="max_bed_count"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="landscape">Manzara
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" value="{{ old('landscape') }}" id="landscape"
                                                           name="landscape"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label"
                                                           for="baby_count_limit_with_max_adult">Maximum Yetişkin
                                                        Yanında Bebek Sayısı
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="baby_count_limit_with_max_adult"
                                                           name="baby_count_limit_with_max_adult"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label"
                                                           for="child_count_limit_with_max_adult">Maximum Yetişkin
                                                        Yanında Çocuk Sayısı
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="child_count_limit_with_max_adult"
                                                           name="child_count_limit_with_max_adult"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label"
                                                           for="young_count_limit_with_max_adult">Maximum Yetişkin
                                                        Yanında Genç Sayısı
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="young_count_limit_with_max_adult"
                                                           name="young_count_limit_with_max_adult"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label float-left"
                                                           for="young_count_limit_with_max_adult">Oda Özellikleri
                                                        (Max 3)
                                                        <span class="required">
                                                                <a href="#"
                                                                   class="btn btn-success btn-xs room_features">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </span>
                                                        <select class="select3" name="room_features[]"
                                                                multiple="multiple">
                                                            @forelse($room_features as $room_feature)
                                                                <option value="{{ $room_feature->id ?? '' }}">{{ $room_feature->name ?? '' }}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label float-left"
                                                           for="young_count_limit_with_max_adult">Oda Olanakları
                                                        <span class="required">
                                                                <a href="#"
                                                                   class="btn btn-success btn-xs room_possibilities">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </span>
                                                        <select class="select4" name="room_possibilities[]"
                                                                multiple="multiple">
                                                            @forelse($room_possibilities as $room_possibility)
                                                                <option value="{{ $room_possibility->id ?? '' }}">{{ $room_possibility->name ?? '' }}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-success"
                                                    style="margin-top: 25px;width: 100%;">
                                                Kaydet
                                            </button>
                                        </div>
                                    </form>
                                    <div class="ln_solid"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Resmi</th>
                                                    <th>Tipi</th>
                                                    <th>Adı</th>
                                                    <th>Sayısı</th>
                                                    <th>Min. Yet.</th>
                                                    <th>Max. Yet.</th>
                                                    <th>Min. Bebek</th>
                                                    <th>Max. Bebek</th>
                                                    <th>Min. Çocuk</th>
                                                    <th>Max. Çocuk</th>
                                                    <th>Min. Genç</th>
                                                    <th>Max. Genç</th>
                                                    <th>Max. Yatak</th>
                                                    <th>Işlemler</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($hotel->rooms) > 0)
                                                    @foreach($hotel->rooms as $room)
                                                        <tr>
                                                            <td>
                                                                <img width="100" src="{{ asset($room->cover) }}">
                                                            </td>
                                                            <td>{{$room->room_type->name ?? ''}}</td>
                                                            <td>{{$room->name ?? ''}}</td>
                                                            <td>{{$room->count ?? ''}}</td>
                                                            <td>{{$room->min_adult_count ?? ''}}</td>
                                                            <td>{{$room->max_adult_count ?? ''}}</td>
                                                            <td>{{$room->min_baby_count ?? ''}}</td>
                                                            <td>{{$room->max_baby_count ?? ''}}</td>
                                                            <td>{{$room->min_child_count ?? ''}}</td>
                                                            <td>{{$room->max_child_count ?? ''}}</td>
                                                            <td>{{$room->min_young_count ?? ''}}</td>
                                                            <td>{{$room->max_young_count ?? ''}}</td>
                                                            <td>{{$room->max_bed_count ?? ''}}</td>
                                                            <td>
                                                                <a href="{{ url('adminpanel/hotel_room/'.$room->id.'/edit') }}"
                                                                   class="btn btn-info btn-xs">
                                                                    <i class="fa fa-cogs" title="Oda Düzenle"></i>
                                                                </a>
                                                                <a href="{{ route('room.gallery',$room->id) }}"
                                                                   class="btn btn-success btn-xs">
                                                                    <i class="fa fa-image" title="Galeri"></i>
                                                                </a>
                                                                <form id="delete-form-{{$room->id}}" method="POST"
                                                                      action="{{ route('hotel_room.destroy',$room->id) }}">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                    <a onclick='if(confirm("{{ Helper::js_confirm_message('delete') }})")){
                                                                            event.preventDefault();document.getElementById("delete-form-{{$room->id}}").submit()
                                                                            }else{
                                                                            event.preventDefault();
                                                                            }'
                                                                       href="#"
                                                                       class="btn btn-danger btn-xs"><i
                                                                                class="fa fa-trash" title="Delete"></i>
                                                                    </a>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel"
                                     class="tab-pane fade {{ app('request')->input('tab') == 'facilities' ? 'active in' : '' }}"
                                     id="facilities" aria-labelledby="profile-tab">
                                    <h3>Özellikler</h3>
                                    <div class="ln_solid"></div>
                                    <form class="form-horizontal" method="POST" action="{{url('adminpanel/facility')}}">
                                        <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                                        @csrf
                                        @foreach($facility_categories as $category)
                                            <h4>{{$category->name}}</h4>
                                            <div class="ln_solid"></div>
                                            <div class="row">
                                                @foreach($category->facilities as $facility)
                                                    <div class="col-md-3">
                                                        <label>
                                                            <input type="checkbox" class="js-switch" name="facilities[]"
                                                                   value="{{$facility->id}}" {{array_key_exists($facility->id, $hotel_facilities) ? "checked":""}}/> {{$facility->name}}
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" name="is_paid[]"
                                                                   value="{{$facility->id}}" {{ (array_key_exists($facility->id, $hotel_facilities) &&  $hotel_facilities[$facility->id] == true) ? "checked":""}}/>
                                                            Ücretli
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="ln_solid"></div>
                                        @endforeach
                                        <button type="submit" class="btn btn-success" style="margin-top: 26px;">Kaydet
                                        </button>
                                    </form>

                                </div>
                                <div role="tabpanel"
                                     class="tab-pane fade {{ app('request')->input('tab') == 'general_setting' ? 'active in' : '' }}"
                                     id="general_setting" aria-labelledby="profile-tab">
                                    <h4>Oda Tanım</h4>
                                    <div class="ln_solid"></div>
                                    <form class="form-horizontal" method="POST"
                                          action="{{url('adminpanel/hotel_setting')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$hotel->id}}">
                                        <div class="form-group">
                                            <label class="control-label">Ödeme Tipleri</label>
                                            <select class="payment_types form-control" multiple="multiple"
                                                    name="payment_types[]">
                                                @foreach($payment_types as $payment_type)
                                                    <option value="{{$payment_type->id}}" {{in_array($payment_type->id, $hotel_payment_types) ? "selected":""}}>{{$payment_type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="page_title">Sayfa Başlığı
                                            </label>
                                            <input type="text" id="page_title" name="page_title"
                                                   class="form-control" value="{{ $hotel->seo->page_title ?? old('page_title')}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="seo_title">Seo Başlığı
                                            </label>
                                            <input type="text" id="seo_title" name="seo_title"
                                                   class="form-control" value="{{ $hotel->seo->seo_title ?? old('seo_title') }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="seo_keyword">Seo Anahtar Sözcükler
                                            </label>
                                            <input type="text" id="seo_keyword" name="seo_keyword"
                                                   class="form-control" value="{{ $hotel->seo->seo_keyword ?? old('seo_keyword') }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="seo_description">Seo Açıklama
                                            </label>
                                            <textarea rows="2" id="seo_description" name="seo_description"
                                                      class="form-control">{{ $hotel->seo->seo_description ?? old('seo_description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="promo_photo">Reklam Görseli</label>
                                            <input type="file" name="promo_photo" id="promo_photo">
                                        </div>
                                        @isset($hotel->promo_photo)
                                            <img src="{{asset('hotels/promo_photos')}}/{{$hotel->promo_photo}}" alt=""
                                                 width="200px" height="200px">
                                        @endisset
                                        <div class="form-group">
                                            <label class="control-label">Otel Konsepti</label>
                                            <select class="js-example-basic-multiple" multiple="multiple"
                                                    name="themes[]">
                                                @foreach($themes as $theme)
                                                    <option value="{{$theme->id}}" {{in_array($theme->id, $hotel_themes) ? "selected":""}}>{{$theme->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Otel Konsepti</label>
                                            <select class="js-example-basic-multiple" name="features[]"
                                                    multiple="multiple">
                                                @foreach($features as $feature)
                                                    <option value="{{$feature->id}}" {{in_array($feature->id, $hotel_features) ? "selected":""}}>{{$feature->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" class="js-switch" name="reservation"
                                                       value="1" {{$hotel->reservation ? "checked":""}}/> Rezervasyon
                                            </label>
                                        </div>

                                        <button type="submit" class="btn btn-success" style="margin-top: 26px;">Kaydet
                                        </button>
                                    </form>
                                    <h4>Rezervasyon Sayfasındaki Transfer Bilgileri</h4>
                                    <div class="row">
                                        <form action="{{ route('hotel.transfer.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Nereden
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" id="name" name="transfer_from_location"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Nereye<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="name" name="transfer_to_location"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Fiyat<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="name" name="transfer_price"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Tip<span
                                                                class="required">*</span>
                                                    </label>
                                                    <br>
                                                    <input class="flat" type="radio" checked value="1" id="name"
                                                           name="transfer_type"
                                                    > Kişi Başı
                                                    {{--                                                    <input class="flat" type="radio" value="2" id="name" name="transfer_type"--}}
                                                    {{--                                                    > Toplu Taşıma--}}
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" class="btn btn-success" value="Kaydet"
                                                       style="margin-top: 26px;">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Nereden</th>
                                                    <th>Nereye</th>
                                                    <th>Fiyat</th>
                                                    <th>Tip</th>
                                                    <th>Işlemler</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($transfers as $transfer)
                                                    <tr>
                                                        <th>{{ $transfer->transfer_from_location ?? '' }}</th>
                                                        <th>{{ $transfer->transfer_to_location ?? '' }}</th>
                                                        <th>{{ $transfer->transfer_price ?? '' }}</th>
                                                        <th>{{ $transfer->type }}</th>
                                                        <th>
                                                            <a href="{{ route('hotel.transfer.edit',[$hotel->id,$transfer->id]) }}"
                                                               class="btn btn-info btn-xs">
                                                                <i class="fa fa-cogs" title="Düzenle"></i>
                                                            </a>
                                                            <a onClick='confirm("{{ Helper::js_confirm_message("delete") }}")'
                                                               href="{{ route('hotel.transfer.delete',[$hotel->id,$transfer->id]) }}"
                                                               class="btn btn-danger btn-xs">
                                                                <i class="fa fa-trash-o" title="Sil"></i>
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
            </div>
        </div>
    </div>
    <div class="modal fade room_features-modal-lg modal-xl" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="{{ route('room_feature.store')}}">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Oda Özellikleri Oluştur</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="name">Oda Özellik Adı<span
                                        class="required">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                   class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade room_possibilities-modal-lg modal-xl" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="{{ route('room_possibility.store')}}">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Oda Olanakları Oluştur</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="name">Oda Olanak Adı<span
                                        class="required">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                   class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/ckeditor/my_plugins/autogrow.min.js') }}"></script>
    <script>
        $(function () {
            var options = {
                uiColor: "#f4645f",
                language: "tr",
                extraPlugins: "autogrow",
                autoGrow_minHeight: 250,
                autoGrow_maxHeight: 600,
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
            CKEDITOR.replace("hotel_description", options);
            CKEDITOR.replace("cancel_description", options);
        });
    </script>
    <script src="{{ asset('js/slug.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
            $(".select3").select2({
                width: '100%',
                maximumSelectionLength: 3
            });
            $(".select4").select2({
                width: '100%',
            });
            $(".payment_types").select2({
                width: '100%',
            });
            $('.room_features').on('click', function () {
                $('.room_features-modal-lg').modal('show')
            });

            $('.room_possibilities').on('click', function () {
                $('.room_possibilities-modal-lg').modal('show')
            });

            $("#city_id").html('');
            $("#county_id").html('');
            $.ajax({
                url: '{{ url('/common/location/country/') }}/' + "{{ $hotel->country_id ?? '' }}",
                type: 'GET',
                data: '',
                success: function (data) {
                    // $("#city_id").attr("disabled", false).html("<option value=''>Seçin..</option>");
                    var selected_city = '';
                    console.log(data);
                    $.each(data, function (index, value) {

                        var $city_id = value.id;
                        if ($city_id == "{{ $hotel->city_id }}") {
                            selected_city = 'selected';
                        } else {
                            selected_city = null;
                        }

                        $("#city_id").append('<option ' + selected_city + '  value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });

            $.ajax({
                url: '{{ url('/common/location/city/') }}/' + "{{ $hotel->city_id ?? '' }}",
                type: 'GET',
                data: '',
                success: function (data) {
                    // $("#county_id").attr("disabled", false).html("<option value=''>Seçin..</option>");
                    var selected_county = '';
                    $.each(data, function (index, value) {
                        var $county_id = value.id;
                        if ($county_id == "{{ $hotel->county_id }}") {
                            selected_county = 'selected';
                        } else {
                            selected_county = null;
                        }
                        $("#county_id").append('<option ' + selected_county + ' value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });

            CKEDITOR.replace('editor1');
        });

        $('#country_id').on('change', function () {
            $("#city_id").html('');
            $.ajax({
                url: '{{ url('/common/location/country/') }}/' + $(this).val(),
                type: 'GET',
                data: '',
                success: function (data) {
                    $("#city_div").css("display", "block");
                    $("#city_id").attr("disabled", false).html("<option value=''>Seçin..</option>");
                    $.each(data, function (index, value) {
                        $("#city_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            })
        });

        $('#city_id').on('change', function () {
            $("#county_id").html('');
            $.ajax({
                url: '{{ url('/common/location/city/') }}/' + $(this).val(),
                type: 'GET',
                data: '',
                success: function (data) {
                    // $("#county_id").attr("disabled", false).html("<option value=''>Seçin..</option>");
                    $.each(data, function (index, value) {
                        $("#county_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            })
        });


    </script>
@endsection
