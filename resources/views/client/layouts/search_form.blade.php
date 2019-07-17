<div class="container-fluid header-bottom pt-5 pb-md-5 pb-2">
    <div class="container pb-5">
        <div class="row mt-2 mb-2">
            <div class="col-md-12 text-center">
                <h2 class="search-form-title font-weight-bold">Müslüman Dostu <br> Helal Otel Rezervasyonlarını Kontrol Et</h2>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-md-12 col-12 mt-3 pb-4">
                <ul class="nav nav-tabs first-special-tabs d-none" id="myTab" role="tablist">
                    <li class="nav-item text-center">
                        <div class="nav-item-background"></div>
                        <a class="nav-link active font-weight-bold pr-4 pl-4" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">
                            <i class="fa fa-hotel"></i><br>
                            OTEL
                        </a>
                    </li>
                    <li class="nav-item text-center ml-2 d-none">
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
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                        <div class="container first-special-container pt-2 pb-2 pr-4 pl-4">
                            <form action="{{ route('search') }}" id="search_form" method="get">
                                <input type="hidden" name="type" id="selectionType" value="all_hotels">
                                <input type="hidden" name="id" id="selectionId" value="">
                                <div class="row">
                                    <div class="col-md-4 col-12 p-0 mt-1 mt-md-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text first-special-input-text">
                                                    <i class="fa fa-search"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="search_label" class="form-control font-weight-bold first-special-input" value="Tüm Tesisler" autocomplete="off" data-search-form-view="true" data-search-form-id="1"/>
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
                                                        <h4><label class="d-block mt-1 mb-3 w-100 font-weight-bold" data-search-form-data="true" data-search-form-name="Şehir Otelleri" data-search-form-id="" data-search-form-type="city_hotels"><i class="fas fa-hotel first-text-color"></i> Şehir Otelleri <i class="fa fa-chevron-right float-right mr-2 mt-1 first-text-color"></i></label></h4>
                                                        <h4><label class="d-block mt-1 mb-3 w-100 font-weight-bold" data-search-form-data="true" data-search-form-name="Termal Oteller" data-search-form-id="" data-search-form-type="thermal_hotels"><i class="fas fa-leaf first-text-color"></i> Termal Oteller <i class="fa fa-chevron-right float-right mr-2 mt-1 first-text-color"></i></label></h4>
                                                        <h4><label class="d-block mt-1 mb-3 w-100 font-weight-bold" data-search-form-data="true" data-search-form-name="Villalar" data-search-form-id="" data-search-form-type="villas"><i class="fas fa-vihara first-text-color"></i> Villalar <i class="fa fa-chevron-right float-right mr-2 mt-1 first-text-color"></i></label></h4>
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
                                            <input type="text" class="form-control font-weight-bold first-special-input" id="datepicker-8" name="start_date" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 p-0 mt-1 mt-md-0">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text first-special-input-text">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control font-weight-bold first-special-input" id="datepicker-9" name="end_date" value="{{ \Carbon\Carbon::now()->addDay(4)->format('d.m.Y') }}"/>
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
                                                    <input type="text" class="ten-special-input" person-change-write="1" person-change-max="10" person-change-min="0" value="2" disabled/><span class="ml-0 pl-0">Kişi</span>
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
                                                            <input class="quantity" min="0" name="adult_count" type="number" value="2" person-change-value="1"/>
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" type="button" class="plus" person-change="button" person-change-write-id="1" person-change-min-value="0" person-change-max-value="6" person-change-value-id="1" person-change-type="up" person-disabled-button="1" person-disabled="2"></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12 pl-3 mb-2 mt-1">
                                                        <label class="font-small text-muted">
                                                            Çocuk Sayısı
                                                        </label>
                                                        <div class="def-number-input number-input first-special-number-input m-0 p-0">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" type="button" class="minus" data-visible="true" data-visible-type="down" data-visible-input-id="1" person-change="button" person-change-write-id="1" person-change-min-value="0" person-change-value-id="2" person-change-type="down" person-disabled-button="4" person-disabled="3"></button>
                                                            <input class="quantity" min="0" name="child_count" type="number" data-visible-input-id="1" value="0" person-change-value="2">
                                                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" type="button" class="plus" data-visible="true" data-visible-type="up" data-visible-input-id="1" person-change="button" person-change-write-id="1" person-change-min-value="0" person-change-max-value="4" person-change-value-id="2" person-change-type="up" person-disabled-button="3" person-disabled="4"></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-12 mt-1 mb-1 d-none" data-visibled-id="1">
                                                        <label class="font-small text-muted mb-0">
                                                            1. Çocuk Yaşı
                                                        </label>
                                                        <select name="child_ages[]" class="form-select custom-select">
                                                            @for($i=0;$i<=16;$i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 col-12 mt-1 mb-1 d-none" data-visibled-id="2">
                                                        <label class="font-small text-muted mb-0">
                                                            2. Çocuk Yaşı
                                                        </label>
                                                        <select name="child_ages[]" class="form-select custom-select">
                                                            @for($i=0;$i<=16;$i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 col-12 mt-1 mb-1 d-none" data-visibled-id="3">
                                                        <label class="font-small text-muted mb-0">
                                                            3. Çocuk Yaşı
                                                        </label>
                                                        <select name="child_ages[]" class="form-select custom-select">
                                                            @for($i=0;$i<=16;$i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 col-12 mt-1 mb-1 d-none" data-visibled-id="4">
                                                        <label class="font-small text-muted mb-0">
                                                            4. Çocuk Yaşı
                                                        </label>
                                                        <select name="child_ages[]" class="form-select custom-select">
                                                            @for($i=0;$i<=16;$i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
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
                    <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>