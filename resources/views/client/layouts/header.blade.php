<div class="side-nav d-none" side-nav="true" side-nav-id="1">
    <span class="side-nav-close" side-nav-type="close" side-nav-id="1">X</span>
    <div class="side-nav-content">
        <div class="row">
            <div class="col-12 mt-2">
                <div class="currency-select-dropdown-mobile">
                    <div id="ytWidget"></div>
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="dropdown currency-select-dropdown-mobile" style="width: 99% !important;">
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown">₺ {{session('localize.currency')}}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        @foreach(\App\Models\Currency::all() as $currency)
                            @if($currency->code == session('localize.currency'))
                                @continue
                            @endif
                            <li>
                                <a class="dropdown-item" href="{{route('currency_set',$currency->code)}}">
                                    <b>
                                        {{ $currency->symbol }}
                                    </b>
                                    {{ $currency->code }}
                                </a>
                            </li>
                        @endforeach
                        {{--                                        <li><a class="dropdown-item" href="#"><b>£</b> İngiliz Sterlini</a></li>--}}
                        {{--                                        <li><a class="dropdown-item" href="#"><b>TL</b> Türk Lirası</a></li>--}}
                        {{--                                        <li><a class="dropdown-item" href="#"><b>AED</b> BAE Dirhemi</a></li>--}}
                        {{--                                        <li><a class="dropdown-item" href="#"><b>SAR</b> Suudi Riyali</a></li>--}}
                        {{--                                        <li><a class="dropdown-item" href="#"><b>RUB</b> Rus Rublesi</a></li>--}}
                        {{--                                        <li class="dropdown-submenu">--}}
                        {{--                                            <a class="test" tabindex="-1" href="#"><strong>Diğer Para Birimleri</strong></a>--}}
                        {{--                                            <ul class="dropdown-menu">--}}
                        {{--                                                <li><a class="dropdown-item" href="#"><b>€</b> Euro</a></li>--}}
                        {{--                                                <li><a class="dropdown-item" href="#"><b>£</b> İngiliz Sterlini</a></li>--}}
                        {{--                                                <li><a class="dropdown-item" href="#"><b>$</b> ABD Doları</a></li>--}}
                        {{--                                                <li><a class="dropdown-item" href="#"><b>TL</b> Türk Lirası</a></li>--}}
                        {{--                                                <li><a class="dropdown-item" href="#"><b>AED</b> BAE Dirhemi</a></li>--}}
                        {{--                                                <li><a class="dropdown-item" href="#"><b>SAR</b> Suudi Riyali</a></li>--}}
                        {{--                                                <li><a class="dropdown-item" href="#"><b>RUB</b> Rus Rublesi</a></li>--}}
                        {{--                                            </ul>--}}
                        {{--                                        </li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-12 mt-3">
                <a href="tel:+905312788068" class="twelve-special-button"><i class="fa fa-phone"></i> &nbsp; +90 531 278 80 68</a>
            </div>
            <div class="col-12 mt-3">
                <a href="tel:08504663987" class="twelve-special-button"><i class="fa fa-phone"></i> &nbsp; 0850 466 3987</a>
            </div>
            <div class="col-12 mt-3">
                <a class="twelve-special-button" data-toggle="modal" data-target="#contact">Tıklayın Sizi Arayalım</a>
            </div>
            <div class="col-12 mt-3">
                <a href="" class="twelve-special-button"><i class="fa fa-user"></i> &nbsp; Giriş Yap & Kayıt Ol</a>
            </div>
            <div class="col-12 mt-3">
                <a href="" class="twelve-special-button border-bottom">Tüm Tesisler</a>
                <a href="" class="twelve-special-button border-bottom">Tatil Köyleri</a>
                <a href="" class="twelve-special-button border-bottom">Şehir Otelleri</a>
                <a href="" class="twelve-special-button border-bottom">Termal Oteller</a>
                <a href="" class="twelve-special-button">Villa Oteller</a>
            </div>
            <div class="col-12 mt-3 mb-3">
                <h5 class="text-center text-white font-weight-bolder pb-2 pt-2 border-bottom">Hakkımızda</h5>
                <h5 class="text-center text-white font-weight-bolder pb-2 pt-2 border-bottom">Basında</h5>
                <h5 class="text-center text-white font-weight-bolder pb-2 pt-2 border-bottom">Helal Tatil</h5>
                <h5 class="text-center text-white font-weight-bolder pb-2 pt-2 border-bottom">En İyi Fiyatlar</h5>
                <h5 class="text-center text-white font-weight-bolder pb-2 pt-2 border-bottom">Hukuki Şartlar ve Koşullar</h5>
                <h5 class="text-center text-white font-weight-bolder pb-2 pt-2 border-bottom">Gizlilik Politikası</h5>
                <h5 class="text-center text-white font-weight-bolder pb-2 pt-2 border-bottom">SSS</h5>
                <h5 class="text-center text-white font-weight-bolder pb-2 pt-2 border-bottom">İletişim</h5>
                <h5 class="text-center text-white font-weight-bolder pb-2 pt-2 border-bottom">Bültenlerimiz</h5>
                <h5 class="text-center text-white font-weight-bolder pb-2 pt-2 border-bottom">Acentamız Olun</h5>
                <h5 class="text-center text-white font-weight-bolder pb-2 pt-2 border-bottom">Tesisinizi Ekleyin</h5>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid d-none d-md-block" style="background-color: #757575">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12 pt-2">
                <label class="font-weight-bolder font-small d-inline-block">
                    <i class="fa fa-phone-square text-white"></i> &nbsp;
                    <a href="tel:+905312788068" class="text-white">
                        +90 531 278 80 68
                    </a>
                </label>
                <label class="d-inline-block text-white font-weight-bold ml-0 ml-md-2">|</label>
                <label class="font-weight-bolder font-small d-inline-block ml-0 ml-md-2">
                    <a href="tel:08504661972" class="text-white">
                        0850 466 39 87
                    </a>
                </label>
            </div>
            <div class="col-md-6 col-12 pr-0 pt-0 pt-md-2">
                <a class="float-right text-white font-small" data-toggle="modal" data-target="#contact">
                    Tıklayın Sizi Arayalım
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid header-tabaka">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 pr-0">
                <nav class="navbar navbar-expand-lg header pl-0 pr-0">
                    <a class="navbar-brand font-weight-bold" href="{{url('/')}}">
                        <img src="{{ asset('images/logo/halal-hotel-2.png') }}"/>
                        {{--<h4><label class="text-white font-weight-bold header-title">HALALHOTEL<span class="text-white">CHECK</span></label></h4>--}}
                    </a>
                    <button class="navbar-toggler d-none" type="button" data-toggle="collapse" data-target="#header"
                            aria-controls="header" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                    </button>
                    <button class="navbar-toggler d-block d-md-none" type="button">
                        <span class="navbar-toggler-icon" side-nav-type="button" side-nav-id="1" side-nav-status="close"><i class="fa fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="header">
                        <ul class="navbar-nav mr-auto pt-1">
                            <li class="nav-item">
                                <div id="ytWidget"></div><script src="https://translate.yandex.net/website-widget/v1/widget.js?widgetId=ytWidget&pageLang=tr&widgetTheme=light&autoMode=false" type="text/javascript"></script>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown currency-select-dropdown">
                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown">{{session('localize.currency')}}
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach(\App\Models\Currency::all() as $currency)
                                            @if($currency->code == session('localize.currency'))
                                                @continue
                                            @endif
                                            <li>
                                                <a class="dropdown-item" href="{{route('currency_set',$currency->code)}}">
                                                    <b>
                                                        {{ $currency->symbol }}
                                                    </b>
                                                    {{ $currency->code }}
                                                </a>
                                            </li>
                                        @endforeach
{{--                                        <li><a class="dropdown-item" href="#"><b>£</b> İngiliz Sterlini</a></li>--}}
{{--                                        <li><a class="dropdown-item" href="#"><b>TL</b> Türk Lirası</a></li>--}}
{{--                                        <li><a class="dropdown-item" href="#"><b>AED</b> BAE Dirhemi</a></li>--}}
{{--                                        <li><a class="dropdown-item" href="#"><b>SAR</b> Suudi Riyali</a></li>--}}
{{--                                        <li><a class="dropdown-item" href="#"><b>RUB</b> Rus Rublesi</a></li>--}}
{{--                                        <li class="dropdown-submenu">--}}
{{--                                            <a class="test" tabindex="-1" href="#"><strong>Diğer Para Birimleri</strong></a>--}}
{{--                                            <ul class="dropdown-menu">--}}
{{--                                                <li><a class="dropdown-item" href="#"><b>€</b> Euro</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><b>£</b> İngiliz Sterlini</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><b>$</b> ABD Doları</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><b>TL</b> Türk Lirası</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><b>AED</b> BAE Dirhemi</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><b>SAR</b> Suudi Riyali</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#"><b>RUB</b> Rus Rublesi</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <a class="font-weight-bold first-text-color d-inline-block mt-md-2 p-0">
                            Giriş Yap
                        </a> &nbsp;
                        <label class="d-inline-block text-muted mt-md-3">veya</label> &nbsp;
                        <a class="font-weight-bold first-text-color d-inline-block mt-md-2 p-0">
                            Kayıt Ol
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Sizi Arayalım</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p>
                            Aşağıdaki bilgileri girin, sizi belirttiğiniz saatte biz arayalım.
                        </p>
                        <form action="{{route('call_request.store')}}" method="post" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col-12">Ad Soyad</div>
                                <div class="col-12">
                                    <input type="text" id="full_name" name="full_name" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">Telefon</div>
                                <div class="col-2">
                                    <select class="form-control" name="phone_code">
                                        <option value="+90">+90</option>
                                    </select>
                                </div>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">E-Posta adresiniz:</div>
                                <div class="col-12">
                                    <input type="text" id="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">Arama Zamanı:</div>
                                <div class="col-6 pr-0">
                                    <select name="call_day" class="form-control">
                                        <option value="Bugün">Bugün</option>
                                        <option value="Yarın">Yarın</option>
                                    </select>
                                </div>
                                <div class="col-6 pl-0">
                                    <select name="call_hour" class="form-control">
                                        <option value="En Kısa Sürede">En Kısa Sürede</option>
                                        <option value="11:00 den Sonra">11:00 den Sonra</option>
                                        <option value="12:00 dan Sonra">12:00 den Sonra</option>
                                        <option value="13:00 den Sonra">13:00 den Sonra</option>
                                        <option value="14:00 dan Sonra">14:00 den Sonra</option>
                                        <option value="15:00 den Sonra">15:00 den Sonra</option>
                                        <option value="16:00 dan Sonra">16:00 dan Sonra</option>
                                        <option value="17:00 den Sonra">17:00 den Sonra</option>
                                        <option value="18:00 den Sonra">18:00 den Sonra</option>
                                        <option value="19:00 dan Sonra">19:00 dan Sonra</option>
                                        <option value="20:00 den Sonra">20:00 den Sonra</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="checkbox1" name="subscribe" value="1" class="form-check-input">
                                                Fırsat ve kampanyalardan haberdar olmak istiyorum.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>