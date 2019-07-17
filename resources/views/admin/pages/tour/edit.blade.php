@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        @isset($success)
            {{$success}}
        @endisset
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Tur Tanımı
                            <small></small>
                        </h2>
                        <a href="{{ route('tour.index') }}" class="btn btn-info pull-right">
                            <i class="fa fa-undo"></i> Turlara Dön
                        </a>
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
                                    class="{{ app('request')->input('tab') == 'prices' ? 'active' : '' }}"><a
                                            href="#prices" role="tab" id="profile-tab3" data-toggle="tab"
                                            aria-expanded="true">Otel ve Fiyatlandırma</a>
                                </li>
                                <li role="presentation"
                                    class="{{ app('request')->input('tab') == 'day_count' ? 'active' : '' }}"><a
                                            href="#day_count" role="tab" id="profile-tab5" data-toggle="tab"
                                            aria-expanded="true">Bitir</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="general_information"
                                     aria-labelledby="home-tab">
                                    <form class="form-horizontal" method="POST"
                                          action="{{ route('tour.update',$tour->id)}}">
                                        @csrf
                                        @method("PUT")
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">
                                                        Tur Adı
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input value="{{ $tour->name ?? '' }}" type="text" id="name"
                                                           name="name"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="hotel_description">
                                                        Tur Açıklama
                                                        <span class="required">*</span>
                                                    </label>
                                                    <textarea id="editor1" class="form-control" rows="2"
                                                              name="description">{{ $tour->description ?? '' }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="hotel_description">Tur
                                                        Genel Şartları<span class="required">*</span>
                                                    </label>
                                                    <textarea id="editor2" class="form-control" rows="2"
                                                              name="general_condition">{{ $tour->general_condition ?? '' }}</textarea>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="type_id">Tur Tür<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="type_id" id="type_id">
                                                        @forelse($types as $type)
                                                            <option {{ $type->id == $tour->type_id ? 'selected' : '' }} value="{{ $type->id ?? '' }}">
                                                                {{ $type->name ?? '' }}
                                                            </option>
                                                        @empty
                                                            <option value="">Herhangi Bir Tur Türü Eklemediniz</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="travel_type">Seyahat Tipi<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="travel_type" id="travel_type">
                                                        <option {{ $tour->travel_type == 1 ? "selected" : null }} value="1">
                                                            Gemi ile gidiş dönüş
                                                        </option>
                                                        <option {{ $tour->travel_type == 2 ? "selected" : null }} value="2">
                                                            Otobüs ile gidiş dönüş
                                                        </option>
                                                        <option {{ $tour->travel_type == 3 ? "selected" : null }} value="3">
                                                            Otobüs ile uçak ile dönüş
                                                        </option>
                                                        <option {{ $tour->travel_type == 4 ? "selected" : null }} value="4">
                                                            Tekne ile gidiş dönüş
                                                        </option>
                                                        <option {{ $tour->travel_type == 5 ? "selected" : null }} value="5">
                                                            Uçak ile gidiş otobüs ile dönüş
                                                        </option>
                                                        <option {{ $tour->travel_type == 6 ? "selected" : null }} value="6">
                                                            Uçak ile gidiş uçak ile dönüş
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="departure_city_id">Kalkış İli<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="departure_city_id"
                                                            id="departure_city_id">
                                                        @forelse($cities as $city)
                                                            <option {{ $city->id == $tour->departure_city_id ? "selected" : null }} value="{{ $city->id ?? '' }}">{{ $city->name ?? '' }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="return_city_id">Dönüş İli<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="return_city_id"
                                                            id="return_city_id">
                                                        @forelse($cities as $city)
                                                            <option {{ $city->id == $tour->return_city_id ? "selected" : null }} value="{{ $city->id ?? '' }}">{{ $city->name ?? '' }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="number_of_days">Gün Sayısı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="number" value="{{ $tour->number_of_days ?? '' }}"
                                                           id="number_of_days" name="number_of_days"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="places_to_visit">
                                                        Gezilecek Yerler
                                                        <span class="required">*</span>
                                                    </label>
                                                    <textarea id="places_to_visit" rows="2" class="form-control"
                                                              rows="2"
                                                              name="places_to_visit">{{ $tour->places_to_visit }}</textarea>
                                                    <small>Lütfen, virgül ile ayırınız</small>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="editor3">
                                                        Tur Programları<span class="required">*</span>
                                                    </label>
                                                    <textarea id="editor3" class="form-control" rows="2"
                                                              name="program">{{ $tour->program }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="free_child_age">Ücretsiz Çocuk
                                                        Yaşı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="number" value="{{ $tour->free_child_age ?? '' }}"
                                                           id="free_child_age" name="free_child_age"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="maximum_child_age">Maximum Çocuk
                                                        Yaşı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="number" value="{{ $tour->maximum_child_age ?? '' }}"
                                                           id="maximum_child_age" name="maximum_child_age"

                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="period">Dönem<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="period" id="period">
                                                        <option {{ $tour->period == "06-2019" ? "selected" : null }} value="06-2019">
                                                            06-2019
                                                        </option>
                                                        <option {{ $tour->period == "07-2019" ? "selected" : null }} value="07-2019">
                                                            07-2019
                                                        </option>
                                                        <option {{ $tour->period == "08-2019" ? "selected" : null }} value="08-2019">
                                                            08-2019
                                                        </option>
                                                        <option {{ $tour->period == "09-2019" ? "selected" : null }} value="09-2019">
                                                            09-2019
                                                        </option>
                                                        <option {{ $tour->period == "10-2019" ? "selected" : null }} value="10-2019">
                                                            10-2019
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="sales_start_date">Satış Baslangic
                                                        Tarihi <span class="required"></span>
                                                    </label>
                                                    <input type="text" value="{{ $tour->sales_start_date ?? '' }}"
                                                           class="form-control date" id="sales_start_date"
                                                           name="sales_start_date" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="sales_end_date">Satış Bitiş Tarihi
                                                        <span class="required"></span>
                                                    </label>
                                                    <input type="text" value="{{ $tour->sales_end_date ?? '' }}"
                                                           class="form-control date" id="sales_end_date"
                                                           name="sales_end_date" autocomplete="off">
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
                                            <form method="post" action="{{ url('/adminpanel/tour_add_file') }}"
                                                  enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="file_type_id" value="2">
                                                <input type="hidden" name="tour_id" value="{{$tour->id}}">
                                                @isset($tour->files)
                                                    @foreach($tour->files as $file)
                                                        <div class="dz-preview dz-processing dz-image-preview dz-complete"
                                                             data-path="{{asset("/adminpanel/tour_remove_file")}}"
                                                             data-id="{{$file->id}}" data-url="{{$file->name}}"
                                                             data-name="{{$file->original_name}}">
                                                            <div class="dz-image">
                                                                <img data-dz-thumbnail="" alt="" width="120"
                                                                     height="120"
                                                                     src="{{asset("tours/images/".$file->name)}}">
                                                            </div>
                                                            <div class="dz-progress">
                                                                <span class="dz-upload" data-dz-uploadprogress=""
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
                                     class="tab-pane fade {{ app('request')->input('tab') == 'prices' ? 'active in' : '' }}"
                                     id="prices" aria-labelledby="profile-tab">
                                    <div class="ln_solid"></div>
                                    <form class="form-horizontal" method="POST"
                                          action="{{ route('tour_price.store')}}">
                                        @csrf
                                        <input type="hidden" value="{{ $tour->id }}" name="tour_id">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label" for="start_date">Baslangic Tarihi <span
                                                                class="required"></span>
                                                    </label>
                                                    <input type="text" class="form-control date" id="start_date"
                                                           name="start_date" value="" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label" for="end_date">Bitis Tarihi <span
                                                                class="required"></span>
                                                    </label>
                                                    <input type="text" class="form-control date" id="end_date"
                                                           name="end_date" value="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="control-label" for="description">
                                                    Açıklama
                                                    <span class="required">*</span>
                                                </label>
                                                <textarea id="editor4" class="form-control" rows="2"
                                                          name="description"></textarea>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="adult_count">Kişi Sayısı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="number" id="adult_count" name="adult_count"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="extra_bed_price">İlave Yatak
                                                        Ücreti<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="number" id="extra_bed_price" name="extra_bed_price"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="person_price">Tek Kişilik
                                                        Ücret<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="number" id="person_price" name="person_price"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="free_child_price">0
                                                        - {{ $tour->free_child_age ?? '' }} Çoçuk<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input value="" type="number" id="free_child_price"
                                                           name="free_child_price"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label"
                                                           for="maximum_child_price">{{ $tour->free_child_age ?? '' }}
                                                        - {{ $tour->maximum_child_age ?? '' }} Çoçuk<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="number" id="maximum_child_price"
                                                           name="maximum_child_price"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="profit">Kar<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="number" id="profit" name="profit"
                                                           class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-success" style="margin-top: 26px;">
                                                    Kaydet
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Başlangıç Tarihi</th>
                                                    <th>Bitiş Tarihi</th>
                                                    <th>Kişi Sayısı</th>
                                                    <th>Tek Kişilik Ücret</th>
                                                    <th>Yüzdelik Kar Oranı</th>
                                                    <th>Işlemler</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($tour->prices as $price)
                                                    <tr>
                                                        <th>{{ $price->start_date ?? '' }}</th>
                                                        <th>{{ $price->end_date?? '' }}</th>
                                                        <th>{{ $price->adult_count ?? '' }}</th>
                                                        <th>{{ $price->person_price }}</th>
                                                        <th>{{ $price->profit }}</th>
                                                        <th>
                                                            <form id="delete-form-{{$price->id}}" method="post"
                                                                  action="{{ route('tour_price.destroy',$price->id) }}">
                                                                <a href="{{ route('tour_price.edit',$price->id) }}"
                                                                   class="btn btn-info btn-xs">
                                                                    <i class="fa fa-cogs" title="Düzenle"></i>
                                                                </a>

                                                                @csrf
                                                                @method("DELETE")
                                                                <a onclick='if(confirm("{{ Helper::js_confirm_message() }})")){
                                                                        event.preventDefault();document.getElementById("delete-form-{{$price->id}}").submit()
                                                                        }else{
                                                                        event.preventDefault();
                                                                        }'
                                                                   href="#"
                                                                   class="btn btn-danger btn-xs"><i class="fa fa-trash"
                                                                                                    title="Delete"></i>
                                                                </a>
                                                            </form>
                                                        </th>
                                                    </tr>
                                                @empty
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                </div>
                                <div role="tabpanel"
                                     class="tab-pane fade {{ app('request')->input('tab') == 'day_count' ? 'active in' : '' }}"
                                     id="day_count" aria-labelledby="profile-tab">

                                    <div class="row">
                                        <form action="{{ route('tour.day',$tour->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-success">Günleri Kaydet
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="accordion" id="accordionExample">
                                                @for($i=1;$i<=$tour->number_of_days;$i++)
                                                    @php
                                                        $day = \App\Models\Tour\TourDay::where(['tour_id' => $tour->id,'rank' => $i])->first();
                                                    @endphp
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapse{{ $i }}"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapseOne">
                                                                    {{ $i }}. Gün Programı
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapse{{ $i }}" class="collapse"
                                                             aria-labelledby="headingOne"
                                                             data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <input type="hidden" name="rank[]" value="{{ $i }}">
                                                                <input type="hidden" name="tour_id"
                                                                       value="{{ $tour->id }}">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="control-label" for="name">
                                                                                Başlık
                                                                                <span class="required">*</span>
                                                                            </label>
                                                                            <input value="{{ $day->title ?? '' }}"
                                                                                   type="text" id="title"
                                                                                   name="title[]"
                                                                                   class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="control-label"
                                                                                   for="description">
                                                                                Açıklama
                                                                                <span class="required">*</span>
                                                                            </label>
                                                                            <textarea id="editor1"
                                                                                      class="form-control ckeditor"
                                                                                      rows="2"
                                                                                      name="description[]">{{ $day->description ?? '' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--                                                    @empty--}}
                                                    {{--                                                    @endforeach--}}
                                                @endfor
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
        CKEDITOR.replace('editor4');
        CKEDITOR.replace('editor1');
        $('#city_id').on('change', function () {
            $.ajax({
                url: '{{url('/city')}}/' + $(this).val(),
                type: 'GET',
                data: '',
                success: function (data) {
                    $("#county_id").attr("disabled", false).html("<option value=''>Seçin..</option>");
                    $.each(data, function (index, value) {
                        $("#county_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            })
        })
    </script>
@endsection
