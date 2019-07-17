@extends('client.layouts.main')
@section('content')
    <div class="container-fluid header-bottom pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12 mt-5">
                    <ul class="nav nav-tabs first-special-tabs d-none" id="myTab" role="tablist">
                        <li class="nav-item text-center">
                            <div class="nav-item-background"></div>
                            <a class="nav-link active font-weight-bold pr-4 pl-4" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">
                                <i class="fa fa-hotel"></i><br>
                                OTEL
                            </a>
                        </li>
                        {{--<li class="nav-item text-center ml-2 d-none">
                            <div class="nav-item-background"></div>
                            <a class="nav-link font-weight-bold pr-4 pl-4" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">
                                <i class="fa fa-suitcase"></i><br>
                                TUR
                            </a>
                        </li>
                        <li class="nav-item text-center ml-2 d-none">
                            <div class="nav-item-background"></div>
                            <a class="nav-link font-weight-bold pr-4 pl-4" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">
                                <i class="fa fa-plane"></i><br>
                                UÇAK BİLETİ
                            </a>
                        </li>--}}
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                            <div class="container first-special-container pt-2 pb-2 pr-4 pl-4">
                                <form action="{{ route('search') }}" id="search_form" method="get">
                                    <input type="hidden" name="type" id="selectionType" value="{{ session('client.type') ?? 'all_hotels' }}">
                                    <input type="hidden" name="id" id="selectionId" value="{{ session('client.id') ?? '' }}">
                                    <div class="row">
                                        <div class="col-md-4 col-12 p-0 mt-1 mt-md-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text first-special-input-text">
                                                        <i class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="search_label" class="form-control font-weight-bold first-special-input" data-search-form-view="true" data-search-form-id="1" data-search-form-result="close" value="{{ session('client.search_label' ?? 'Tüm Tesisler') }}" />
                                                <div class="place-search-card d-none" data-search-form="1">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="font-weight-bold text-muted d-inline-block">Konum veya Otel ismi</label><button type="button" class="close d-inline-block float-right" aria-label="Close" data-search-form-close="true"><span aria-hidden="true">×</span></button>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text first-special-input-text">
                                                                        <i class="fa fa-search"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" class="form-control font-weight-bold first-special-input border-right" id="search_hotel"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 d-none" id="result">
                                                            @foreach($hotels as $hotel)
                                                                <h5>
                                                                    <label class="font-weight-bold text-muted mt-3 mb-2 w-100" data-search-form-data="true" data-search-form-name="{{$hotel->name}}" data-search-form-id="{{$hotel->id}}" data-search-form-type="hotel">
                                                                        <i class="fa fa-map-marker-alt second-text-color"></i>
                                                                        <span>{{ $hotel->name }}</span>
                                                                        <span class="text-muted float-right mr-2"></span>
                                                                    </label>
                                                                </h5>
                                                            @endforeach
                                                            @foreach($cities as $city)
                                                                <h5>
                                                                    <label class="font-weight-bold text-muted mt-3 mb-2 w-100" data-search-form-data="true" data-search-form-name="{{$city->name}}" data-search-form-id="{{$city->id}}" data-search-form-type="city">
                                                                        <i class="fa fa-map-marker-alt second-text-color"></i>
                                                                        <span>{{$city->name}}</span>
                                                                        <span class="text-muted float-right mr-2"></span>
                                                                    </label>
                                                                </h5>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-md-12" id="shortuct">
                                                            <label class="text-muted mt-3">ya da kategoriye göre gözatın</label>
                                                            <h4><label class="d-block mt-2 mb-3 w-100 font-weight-bold" data-search-form-data="true" data-search-form-name="Tüm Tesisler" data-search-form-id="" data-search-form-type="all_hotels"><i class="fa fa-list first-text-color"></i> Tüm Tesisler <i class="fa fa-chevron-right float-right mr-2 mt-1 first-text-color"></i></label></h4>
                                                            <h4><label class="d-block mt-1 mb-3 w-100 font-weight-bold" data-search-form-data="true" data-search-form-name="Tatil Köyleri" data-search-form-id="" data-search-form-type="holiday_resort_hotels"><i class="fa fa-umbrella-beach first-text-color"></i> Tatil Köyleri <i class="fa fa-chevron-right float-right mr-2 mt-1 first-text-color"></i></label></h4>
                                                            <h4><label class="d-block mt-1 mb-3 w-100 font-weight-bold" data-search-form-data="true" data-search-form-name="Şehir Otelleri" data-search-form-id="" data-search-form-type="city_hotels"><i class="fa fa-building first-text-color"></i> Şehir Otelleri <i class="fa fa-chevron-right float-right mr-2 mt-1 first-text-color"></i></label></h4>
                                                            <h4><label class="d-block mt-1 mb-3 w-100 font-weight-bold" data-search-form-data="true" data-search-form-name="Termal Oteller" data-search-form-id="" data-search-form-type="thermal_hotels"><i class="fab fa-pagelines first-text-color"></i> Termal Oteller <i class="fa fa-chevron-right float-right mr-2 mt-1 first-text-color"></i></label></h4>
                                                            <h4><label class="d-block mt-1 mb-3 w-100 font-weight-bold" data-search-form-data="true" data-search-form-name="Villalar" data-search-form-id="" data-search-form-type="villas"><i class="fa fa-synagogue first-text-color"></i> Villalar <i class="fa fa-chevron-right float-right mr-2 mt-1 first-text-color"></i></label></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-6 p-0 mt-1 mt-md-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text first-special-input-text">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control font-weight-bold first-special-input" id="datepicker-8" name="start_date" value="{{ session('client.start_date')??"" }}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-6 p-0 mt-1 mt-md-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text first-special-input-text">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control font-weight-bold first-special-input" id="datepicker-9" name="end_date" value="{{ session('client.end_date')??"" }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 p-0 mt-1 mt-md-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text first-special-input-text">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <button class="form-control first-special-input pt-2" dropdown-target="yes" dropdown-target-id="1" data-toggle="dropdown" aria-expanded="false">
                                                    <label class="float-left mt-2 font-weight-bold">
                                                        <input type="text" class="ten-special-input" person-change-write="1" person-change-max="10" person-change-min="0" value="{{ session('client.adult_count')+session('client.child_count') }}" disabled/><span class="ml-0 pl-0">Kişi</span>
                                                    </label>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right pt-1 pb-1 pl-2 pr-2" dropdown-id="1" role="menu">
                                                    <div class="row">
                                                        <div class="col-md-12 col-12 pl-3">
                                                            <label class="font-small text-muted">
                                                                Yetişkin Sayısı
                                                            </label>
                                                            <div class="def-number-input number-input first-special-number-input m-0 p-0">
                                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" type="button" class="minus" person-change="button" person-change-write-id="1" person-change-min-value="0" person-change-value-id="1" person-change-type="down" person-disabled-button="2" person-disabled="1"></button>
                                                                <input class="quantity" min="0" name="adult_count" type="number" value="{{ session('client.adult_count')??"2" }}" person-change-value="1"/>
                                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" type="button" class="plus" person-change="button" person-change-write-id="1" person-change-min-value="0" person-change-max-value="6" person-change-value-id="1" person-change-type="up" person-disabled-button="1" person-disabled="2"></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12 pl-3 mb-2 mt-1">
                                                            <label class="font-small text-muted">
                                                                Çocuk Sayısı
                                                            </label>
                                                            <div class="def-number-input number-input first-special-number-input m-0 p-0">
                                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" type="button" class="minus" data-visible="true" data-visible-type="down" data-visible-input-id="1" person-change="button" person-change-write-id="1" person-change-min-value="0" person-change-value-id="2" person-change-type="down" person-disabled-button="4" person-disabled="3"></button>
                                                                <input class="quantity" min="0" name="child_count" type="number" data-visible-input-id="1" value="{{session('client.child_count')}}" person-change-value="2">
                                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" type="button" class="plus" data-visible="true" data-visible-type="up" data-visible-input-id="1" person-change="button" person-change-write-id="1" person-change-min-value="0" person-change-max-value="4" person-change-value-id="2" person-change-type="up" person-disabled-button="3" person-disabled="4"></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12 mt-1 mb-1 {{  session('client.child_count') > 0 && session('client')['child_ages'][0] > 0 ? '' : 'd-none' }}"
                                                             data-visibled-id="1">
                                                            <label class="font-small text-muted mb-0">
                                                                1. Çocuk Yaşı
                                                            </label>
                                                            <select name="child_ages[]"
                                                                    class="form-select custom-select">
                                                                @for($i=0;$i<=16;$i++)
                                                                    <option
                                                                            {{ Helper::custom_selected_option($i,session('client')['child_ages'][0] )}} value="{{ $i }}">{{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 col-12 mt-1 mb-1 {{ session('client.child_count') > 1 && session('client')['child_ages'][1] > 0 ? '' : 'd-none' }}"
                                                             data-visibled-id="2">
                                                            <label class="font-small text-muted mb-0">
                                                                2. Çocuk Yaşı
                                                            </label>
                                                            <select name="child_ages[]"
                                                                    class="form-select custom-select">
                                                                @for($i=0;$i<=16;$i++)
                                                                    <option
                                                                            {{ Helper::custom_selected_option($i,session('client')['child_ages'][1] )}} value="{{ $i }}">{{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 col-12 mt-1 mb-1 {{ session('client.child_count') > 2 && session('client')['child_ages'][2] > 0 ? '' : 'd-none' }}"
                                                             data-visibled-id="3">
                                                            <label class="font-small text-muted mb-0">
                                                                3. Çocuk Yaşı
                                                            </label>
                                                            <select name="child_ages[]"
                                                                    class="form-select custom-select">
                                                                @for($i=0;$i<=16;$i++)
                                                                    <option
                                                                            {{ Helper::custom_selected_option($i,session('client')['child_ages'][2] )}} value="{{ $i }}">{{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12 col-12 mt-1 mb-1 {{ session('client.child_count') > 0 && session('client')['child_ages'][3] > 0 ? '' : 'd-none' }}"
                                                             data-visibled-id="4">
                                                            <label class="font-small text-muted mb-0">
                                                                4. Çocuk Yaşı
                                                            </label>
                                                            <select name="child_ages[]"
                                                                    class="form-select custom-select">
                                                                @for($i=0;$i<=16;$i++)
                                                                    <option
                                                                            {{ Helper::custom_selected_option($i,session('client')['child_ages'][3] )}} value="{{ $i }}">{{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 p-0 pr-2 pr-md-0 mt-1 mt-md-0 first-special-col" style="border-top-right-radius: 6px !important; border-bottom-right-radius: 6px !important;">
                                            <button type="submit" class="btn font-weight-bold first-special-button col-md-11 col-12 eigth-special-button">
                                                Ara &nbsp; <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                       {{-- <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                            <div class="container first-special-container mt-3 pt-2 pb-2 pr-4 pl-4">
                                <div class="row">
                                    <div class="col-md-5 col-12 p-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text first-special-input-text" style="border-top-left-radius: 6px !important; border-bottom-left-radius: 6px !important;">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control first-special-input" list="all-turs" placeholder="Otel Adı Giriniz" value="Tüm Kültür / Yurt Dışı / Gemi Turları"/>
                                            <datalist id="all-turs">
                                                <option>Tüm Kültür Turları</option>
                                                <option>Tüm Yurt Dışı Turları</option>
                                                <option>Tüm Gemi Turları</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-12 p-0 pt-1 pt-md-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text first-special-input-text">
                                                    <i class="fa fa-suitcase"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control first-special-input" list="turs" placeholder="Otel Adı Giriniz" value="Tur seçiniz"/>
                                            <datalist id="turs">
                                                <option>Afrika Turları</option>
                                                <option>Bahar Fırsatları</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 p-0 pr-2 pr-md-0 mt-1 mt-md-0 first-special-col" style="border-top-right-radius: 6px !important; border-bottom-right-radius: 6px !important;">
                                        <button class="btn font-weight-bold first-special-button col-md-11 col-12">
                                            Ara &nbsp; <i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                            <div class="container first-special-container mt-3 pt-2 pb-2 pr-4 pl-4">
                                <div class="row">
                                    <div class="col-md-3 col-12 p-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text first-special-input-text" style="border-top-left-radius: 6px !important; border-bottom-left-radius: 6px !important;">
                                                    <i class="fa fa-map-marker-alt"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control first-special-input" list="departure-airports" placeholder="Nereden"/>
                                            <datalist id="departure-airports">
                                                <option>Antalya Havalimanı</option>
                                                <option>İstanbul Havalimanı</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12 p-0 pt-1 pt-md-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text first-special-input-text">
                                                    <i class="fa fa-map-marker-alt"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control first-special-input" list="going-airports" placeholder="Nereye"/>
                                            <datalist id="going-airports">
                                                <option>Antalya Havalimanı</option>
                                                <option>İstanbul Havalimanı</option>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 p-0 mt-1 mt-md-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text first-special-input-text">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control first-special-input" id="datepicker-3" value="11.04.2019"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 p-0 mt-1 mt-md-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text first-special-input-text">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control first-special-input" id="datepicker-4" value="12.04.2019"/>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-12 p-0 mt-1 mt-md-0 border-left">
                                        <div class="input-group">
                                            <button class="form-control first-special-input pt-2" dropdown-target="yes" dropdown-target-id="2" data-toggle="dropdown" aria-expanded="false">
                                                <label class="float-left mt-2 font-weight-bold text-muted">
                                                    <i class="fa fa-user" style="color: #9e9e9e !important;"></i>
                                                    &nbsp; 4 Kişi
                                                </label>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right pt-1 pb-1 pl-2 pr-2" dropdown-id="2" role="menu">
                                                <div class="row">
                                                    <div class="col-md-12 col-12 pl-3">
                                                        <label class="font-small text-muted">
                                                            Yetişkin (12+)
                                                        </label>
                                                        <div class="def-number-input number-input first-special-number-input m-0 p-0">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                            <input class="quantity" min="0" name="quantity" value="4" type="number">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12 pl-3 mb-2 mt-1">
                                                        <label class="font-small text-muted">
                                                            Çocuk (2 - 11)
                                                        </label>
                                                        <div class="def-number-input number-input first-special-number-input m-0 p-0">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                            <input class="quantity" min="0" name="quantity" value="0" type="number">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12 pl-3 mb-2 mt-1">
                                                        <label class="font-small text-muted">
                                                            Bebek (0 - 2)
                                                        </label>
                                                        <div class="def-number-input number-input first-special-number-input m-0 p-0">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                            <input class="quantity" min="0" name="quantity" value="0" type="number">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12 pl-3 mb-2 mt-1">
                                                        <label class="font-small text-muted">
                                                            Genç (12- 24)
                                                        </label>
                                                        <div class="def-number-input number-input first-special-number-input m-0 p-0">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                            <input class="quantity" min="0" name="quantity" value="0" type="number">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12 pl-3 mb-2 mt-1">
                                                        <label class="font-small text-muted">
                                                            Öğrenci (12 - 24)
                                                        </label>
                                                        <div class="def-number-input number-input first-special-number-input m-0 p-0">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                            <input class="quantity" min="0" name="quantity" value="0" type="number">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12 pl-3 mb-2 mt-1">
                                                        <label class="font-small text-muted">
                                                            Yaşlı (65+)
                                                        </label>
                                                        <div class="def-number-input number-input first-special-number-input m-0 p-0">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                            <input class="quantity" min="0" name="quantity" value="0" type="number">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-12 p-0 pr-2 pr-md-0 mt-1 mt-md-0 first-special-col" style="border-top-right-radius: 6px !important; border-bottom-right-radius: 6px !important;">
                                        <button class="btn font-weight-bold first-special-button col-md-10 col-12">
                                            <i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-3">
        <div class="row">
            <div class="col-md-12">
                <label class="text-muted">
                    Otel Rezervasyon >
                    @if($selected_city)
                        {{ $selected_city->name }}
                    @else
                        {{ session('client.search_label') }}
                    @endif
                </label>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <h3 class="font-weight-bolder">
                    @if($selected_city)
                        {{ $selected_city->name }} Otelleri
                    @else
                        {{ session('client.search_label') }}
                    @endif
                </h3>
            </div>
            <div class="col-md-12">
                <h6>
                    {{ session('client.start_date') }} - {{ session('client.end_date') }}
                    tarihleri arasında {{ session('client.adult_count') }} yetişkin
                    @if(session('client.child_count'))
                    {{session('client.child_count')}} çocuk
                    @endif
                    için toplam fiyatlar
                    gösteriliyor.
                </h6>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            {{--<div class="col-md-3 col-11 second-special-col d-inline-block">
                <div class="row">
                    <div class="col-md-12 second-bg-color">
                        <div class="text-center mt-2">
                            <h5 class="text-white font-weight-bolder"><i class="fa fa-sliders-h"></i> FİLTRELER</h5>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h5 class="text-muted font-weight-bolder d-inline-block">Helal Yiyecekler</h5>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb1">
                            <label class="custom-control-label" for="cb1">Tüm Yiyecekler</label>
                            <div class="float-right">
                                566
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb2">
                            <label class="custom-control-label" for="cb2">Bazı Yiyecekler</label>
                            <div class="float-right">
                                755
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb3">
                            <label class="custom-control-label" for="cb3">Önceden Talep il</label>
                            <div class="float-right">
                                422
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb4">
                            <label class="custom-control-label" for="cb4">Yayınlarda</label>
                            <div class="float-right">
                                32
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h5 class="text-muted font-weight-bolder">Alkolsüzlük Kuralı</h5>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb5">
                            <label class="custom-control-label" for="cb5">Bütün Tesiste</label>
                            <div class="float-right">
                                345
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb6">
                            <label class="custom-control-label" for="cb6">Bazı Restorantlarda</label>
                            <div class="float-right">
                                45
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb7">
                            <label class="custom-control-label" for="cb7">Odanızda</label>
                            <div class="float-right">
                                12
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h5 class="text-muted font-weight-bolder">Bayanlara Özel</h5>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb8">
                            <label class="custom-control-label" for="cb8">Plajda Yüzme</label>
                            <div class="float-right">
                                212
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb9">
                            <label class="custom-control-label" for="cb9">Plajda Güneşlenme</label>
                            <div class="float-right">
                                56
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb10">
                            <label class="custom-control-label" for="cb10">Spa Merkezi</label>
                            <div class="float-right">
                                12
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb11">
                            <label class="custom-control-label" for="cb11">Kapalı Havuz</label>
                            <div class="float-right">
                                54
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb12">
                            <label class="custom-control-label" for="cb12">Açık Havuz</label>
                            <div class="float-right">
                                78
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb13">
                            <label class="custom-control-label" for="cb13">Havuzlu Oda & Villa</label>
                            <div class="float-right">
                                58
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h5 class="text-muted font-weight-bolder">Konum</h5>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb14">
                            <label class="custom-control-label" for="cb14">Türkiye</label>
                            <div class="float-right">
                                456
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb15">
                            <label class="custom-control-label" for="cb15">İspanya</label>
                            <div class="float-right">
                                466
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb16">
                            <label class="custom-control-label" for="cb16">Endenozya</label>
                            <div class="float-right">
                                623
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h5 class="text-muted font-weight-bolder">Yorum Puanı</h5>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb17">
                            <label class="custom-control-label" for="cb17">Süper: 9+</label>
                            <div class="float-right">
                                785
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb18">
                            <label class="custom-control-label" for="cb18">Çok İyi: 8+</label>
                            <div class="float-right">
                                183
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb19">
                            <label class="custom-control-label" for="cb19">İyi: 7+</label>
                            <div class="float-right">
                                233
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb20">
                            <label class="custom-control-label" for="cb20">Fena Değil: 6+</label>
                            <div class="float-right">
                                452
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb21">
                            <label class="custom-control-label" for="cb21">Puanı Yok</label>
                            <div class="float-right">
                                745
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <h5 class="text-muted font-weight-bolder">Yıldız Sayısı</h5>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb22">
                            <label class="custom-control-label" for="cb22">
                                <i class="fa fa-star second-text-color"></i>
                                <i class="fa fa-star second-text-color"></i>
                                <i class="fa fa-star second-text-color"></i>
                                <i class="fa fa-star second-text-color"></i>
                                <i class="fa fa-star second-text-color"></i>
                            </label>
                            <div class="float-right">
                                564
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb23">
                            <label class="custom-control-label" for="cb23">
                                <i class="fa fa-star second-text-color"></i>
                                <i class="fa fa-star second-text-color"></i>
                                <i class="fa fa-star second-text-color"></i>
                                <i class="fa fa-star second-text-color"></i>
                            </label>
                            <div class="float-right">
                                752
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb24">
                            <label class="custom-control-label" for="cb24">
                                <i class="fa fa-star second-text-color"></i>
                                <i class="fa fa-star second-text-color"></i>
                                <i class="fa fa-star second-text-color"></i>
                            </label>
                            <div class="float-right">
                                426
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb25">
                            <label class="custom-control-label" for="cb25">
                                <i class="fa fa-star second-text-color"></i>
                                <i class="fa fa-star second-text-color"></i>
                            </label>
                            <div class="float-right">
                                342
                            </div>
                        </div>
                        <div class="custom-control">
                            <input type="checkbox" class="custom-control-input" id="cb26">
                            <label class="custom-control-label" for="cb26">
                                <i class="fa fa-star second-text-color"></i>
                            </label>
                            <div class="float-right">
                                132
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}
            <div class="col-md-12 d-inline-block">
                <div class="row">
                    <div class="col-md-12 mt-5 mt-md-0 pr-md-0">
                        <div class="card second-bg-color">
                            <div class="card-body text-white p-2">
                                <a href="" class="text-white font-weight-bolder d-inline-block ml-2">Sırala:</a>
                                <a id="increase" data-url="{{ request()->fullUrl()."&sorting=price_asc" }}" onclick="increase()"  class="text-white d-inline-block ml-2">Fiyat (Artan)</a>
                                <a id="decrease" data-url="{{ request()->fullUrl()."&sorting=price_desc" }}" onclick="decrease()"  class="text-white d-inline-block ml-2">Fiyat (Azalan)</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sorts" class="row mt-5">
                    @foreach($hotels as $hotel)
                        <div  class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body pl-0 pt-0 pb-0 pr-0">
                                    <div class="row">
                                        <div class="col-md-3 col-12">
                                            <a style="color: #000000;" href="{{ route('client.slug',$hotel->slug ?? '') }}">
                                                <div class="view overlay zoom w-100">
                                                    <img src="{{asset('hotels/images')}}/{{$hotel->cover}}"
                                                         class=" first-special-img w-100" alt="">
                                                    <div class="mask flex-center waves-effect waves-light w-100">
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-6 pt-2 pl-4 pr-4 pl-md-0 pr-md-0">
                                            <a style="color: #000000;" href="{{ route('client.slug',$hotel->slug ?? '') }}"><h5
                                                        class="font-weight-bolder mt-2 ml-3 ml-md-0">{{$hotel->name}} <i
                                                            class="fa fa-check-circle second-text-color"></i></h5></a>
                                            <label class="text-muted mt-2 font-small ml-3 ml-md-0"><i
                                                        class="fa fa-map-marker-alt"></i> {{$hotel->city ? $hotel->city->name : ""}}
                                                / {{ $hotel->county ? $hotel->county->name : ""}}, {{ $hotel->address }}</label>
                                            @if (count($hotel->themes) !== 0)
                                                <label class="text-muted mt-2 font-small d-none d-md-block"><i class="fa fa-scroll"></i>
                                                    @foreach($hotel->themes as $index => $theme)
                                                        @if ($index < 2)
                                                            {{$theme->name}}
                                                            @if ($index === 0)
                                                                -
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </label>
                                            @endif
                                            <div class="d-none d-md-block">
                                            @foreach($hotel->features as $ind => $feature)
                                                @if ($ind < 3)
                                                    <span class="mt-2 text-muted font-small d-none d-md-inline-block"><i
                                                                class="fa fa-check-circle"></i> {{$feature->name}}</span> &nbsp;
                                                @endif
                                            @endforeach
                                            </div>
                                            <div class="card third-special-card col-md-12 mt-2 mt-md-3 mb-0 mb-md-3">
                                                <div class="card-body col-auto p-1 font-small font-weight-bolder">
                                                    {{ $hotel->campaign ?? '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <div class="text-center mt-3 mt-md-5 col-12">
                                                <h5 class="first-text-color font-weight-bold d-inline-block">%
                                                    {{ $hotel->discount }}
                                                </h5>
                                                <label class="font-small d-inline-block text-body">'ye varan indirim</label>
                                            </div>
                                            <div class="text-center col-12">
                                                <label class="text-muted mb-0" style="text-decoration: line-through;">
                                                    {{round(( $hotel->min_price * (100 + $hotel->discount)) / 100)}}
                                                    TL</label>
                                                <h4 class="mt-0 first-text-color font-weight-bold">
                                                    {{ Helper::custom_money($hotel->min_price) }}
                                                    <span class="font-small">{{ session('localize.currency') ?? 'TL' }}</span></h4>
                                            </div>
                                            <div class="text-center col-md-12 col-12 mb-3 mb-md-0">
                                                <a href="{{ route('client.slug',$hotel->slug ?? '') }}" class="btn third-special-button">
                                                    FIRSATI YAKALA
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-5 d-none">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pg-blue justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" tabindex="-1">Önceki</a>
                                </li>
                                <li class="page-item"><a class="page-link">1</a></li>
                                <li class="page-item"><a class="page-link">2</a></li>
                                <li class="page-item"><a class="page-link">3</a></li>
                                <li class="page-item">
                                    <a class="page-link">Sonraki</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        // function increase() {
        //     var increase_url = $("#increase").data('url');
        //     $.ajax({
        //         type:'POST',
        //         url:increase_url,
        //         data:{_token:token},
        //         success:function(response){
        //             console.log(response);
        //             $("#sorts").html(response)
        //         },
        //     });
        // }

        // function decrease(){
        //     var decrease_url = $("#decrease").data('url');
        //     $.ajax({
        //         type:'GET',
        //         url:decrease_url,
        //         data:'',
        //         success:function(response){
        //             console.log("here" + response);
        //             $("#sorts").html('');
        //         },
        //     });
        // }

        $(document).ready(function () {

            $('[dropdown-target="yes"]').on('click', function () {

                var dropdown_id = $(this).attr('dropdown-target-id');
                var dropdown_button_status = $(this).attr('aria-expanded');

                if (dropdown_button_status == "false") {
                    $('.dropdown-menu[dropdown-id="' + dropdown_id + '"]').addClass('d-block');
                } else {
                    $('.dropdown-menu[dropdown-id="' + dropdown_id + '"]').removeClass('d-block');
                }

            });

            $('[data-visible="true"]').on('click', function () {

                var data_visible_input_id = $(this).attr('data-visible-input-id');
                var data_visible_type = $(this).attr('data-visible-type');
                var data_input = $('input[data-visible-input-id="' + data_visible_input_id + '"]').val();
                var data_input_other_id = Number(data_input) + Number(1);

                if (data_visible_type == "up") {
                    $('[data-visibled-id="' + data_input + '"]').removeClass('d-none');
                }

                if (data_visible_type == "down") {
                    $('[data-visibled-id="' + data_input_other_id + '"]').addClass('d-none');
                }

            });

            $('[people-change-button="true"]').on('click', function () {

                var data_people_input_id = $(this).attr('data-people-input-id');
                var data_people_id = $('[data-people-id="' + data_people_input_id + '"]').val();
                var data_people_type = $(this).attr('data-people-type');
                var total_people = $('[data-people-total-id="' + data_people_input_id + '"]').html();
                var min_people_count = $('[data-people-total-id="' + data_people_input_id + '"]').attr('min-people');

                if (data_people_type == "up") {
                    var people_number = Number(total_people) + Number(1);
                    $('[data-people-total-id="' + data_people_input_id + '"]').html(people_number);
                }

                if (data_people_type == "down") {
                    var downed_people_total = Number(total_people) - Number(1);
                    if (downed_people_total >= min_people_count) {
                        var people_control = $('[data-people-total-id="' + data_people_input_id + '"]').html(downed_people_total);
                    }
                }
            });
        });
    </script>
@endsection
