@extends('client.layouts.main')
@section('meta')
    {!! SEOMeta::generate() !!}
    {{--    {!! OpenGraph::generate() !!}--}}
    {{--    {!! Twitter::generate() !!}--}}
@endsection
@section('content')
    @include('client.layouts.search_form')

    <div class="container mt-5 mb-3 pb-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-muted text-center first-text-title">Neden HalalHotelCheck'i Tercih Etmelisiniz ?</h1>
            </div>
        </div>
        <div class="row mt-2">

            @forelse($icons as $icon)
            <div class="col-md-2 p-1">
                <div class="feature-card">
                    <span class="feature-card-icon-alt">
                        <i class="fa fa-star"></i>
                        <i class="{{ $icon->icon ?? '' }} feature-card-icon-top"></i>
                    </span>
                    <div class="feature-card-title-card text-muted font-weight-bolder">
                        {!! $icon->title ?? '' !!}
                        <div class="feature-card-title-description-card">
                            {!! $icon->description ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse

{{--            <div class="col-md-2 p-1">--}}
{{--                <div class="feature-card">--}}
{{--                    <span class="feature-card-icon-alt"><i class="fa fa-star"></i><i class="fa fa-utensils feature-card-icon-top"></i></span>--}}
{{--                    <div class="feature-card-title-card text-muted font-weight-bolder">--}}
{{--                        Helal yiyecekler ve alkolsüz içecekler--}}
{{--                        <div class="feature-card-title-description-card">--}}
{{--                            Otel ve tatil köylerinde bulunan kafe ile restoranlarda helal yiyecek ve alkolsüz içecek imkanı bulunmaktadır. Müstakil villalarda kalan misafirler, helal gıda paketlerini önceden sipariş edebilirler.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-2 p-1">--}}
{{--                <div class="feature-card">--}}
{{--                    <span class="feature-card-icon-alt"><i class="fa fa-star"></i><i class="fab fa-pagelines feature-card-icon-top"></i></span>--}}
{{--                    <div class="feature-card-title-card text-muted font-weight-bolder">--}}
{{--                        Aile değerlerine uygun eğlence--}}
{{--                        <div class="feature-card-title-description-card">--}}
{{--                            Tatil köylerimizde, çocuklara özel kulüpler ve oyun odaları bulunmakta olup, ailelere birlikte vakit geçirebilecekleri uygun olarak, ailece keyifli bir zaman geçirmeniz için hazırlanmıştır. Tesis yakınında ki şehir ve turistik yerlere günlük geziler ve kültür turları düzenlenmektedir.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-2 p-1">--}}
{{--                <div class="feature-card">--}}
{{--                    <span class="feature-card-icon-alt"><i class="fa fa-star"></i><i class="fa fa-users feature-card-icon-top"></i></span>--}}
{{--                    <div class="feature-card-title-card text-muted font-weight-bolder">--}}
{{--                        Kesin ve toplam aile fiyatlandırması--}}
{{--                        <div class="feature-card-title-description-card">--}}
{{--                            Yetişkin sayıları ve çocuk yaşları göz önünde alınarak, aileler için kesin ve toplam fiyatlandırmalar yapılır.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-2 p-1">--}}
{{--                <div class="feature-card">--}}
{{--                    <span class="feature-card-icon-alt"><i class="fa fa-star"></i><i class="fa fa-money-bill-wave feature-card-icon-top"></i></span>--}}
{{--                    <div class="feature-card-title-card text-muted font-weight-bolder">--}}
{{--                        Fiyatlara vergi ve ücretler dâhildir--}}
{{--                        <div class="feature-card-title-description-card">--}}
{{--                            Çoğu web sitesi ek misafirler için vergi ve ekstra ücretleri gizlemekte ve sadece <b>temel kullanım ücretini</b> misafirlerine göstermektedirler. Bu da reel fiyatlar arası karşılaştırma yapılmasını zorlaştırmaktadır. Bunun aksine biz ise, vergileri çocuklar dahil tüm misafirler için yatak ücretlerini de içeren <b>reel toplam fiyatları</b> göstermekteyiz.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-2 p-1">--}}
{{--                <div class="feature-card">--}}
{{--                    <span class="feature-card-icon-alt"><i class="fa fa-star"></i><i class="fa fa-bed feature-card-icon-top"></i></span>--}}
{{--                    <div class="feature-card-title-card text-muted font-weight-bolder">--}}
{{--                        Oda kapasite <br>garantisi--}}
{{--                        <div class="feature-card-title-description-card">--}}
{{--                            Yetişkin sayıları ve çocuk yaşları hesaba katılıp; aileler, konaklayacakları en uygun odalara yerleştirilir. Sadece uygun odalar online olarak satışa sunulur.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

    <hr/>

    @include('client.pages.homepage.choosed')

    @include('client.pages.homepage.city')

    <div class="container mt-5 mb-2 d-none">
        <div class="row">
            <div class="col-md-6 col-12 d-inline-block p-md-0">
                <div id="carouselExampleFade" class="carousel slide carousel-fade first-special-carousel"
                     data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100"
                                 src="https://imagessl.etstur.com/files/images/site//images/cmsRoot/slide/selectum-luxury-760x400-040220193213.jpg"
                                 alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                 src="https://imagessl.etstur.com/files/images/site//images/cmsRoot/slide/limak-arcadia-760x400-07022019.jpg"
                                 alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                 src="https://imagessl.etstur.com/files/images/site//images/cmsRoot/slide/izer-otel-760x400-29032019.jpg"
                                 alt="">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
{{--            <div class="col-md-6 mt-3 mt-md-0 d-inline-block">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6 col-12 d-inline-block border-right border">--}}
{{--                        <div class="view overlay zoom second-special-view">--}}
{{--                            <label class="position-absolute ml-2 mt-2 text-white">Yurtiçi Oteller</label>--}}
{{--                                <img src="{{ $theme['domestic']->file }}"--}}
{{--                                 class="img-fluid" alt="" style="width: 100% !important;">--}}
{{--                            <div class="mask flex-center waves-effect waves-light">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row mt-2">--}}

{{--                            @forelse($theme['domestic']['cities'] as $domestic)--}}
{{--                                <div class="col-md-6 col-6 d-inline-block pr-0">--}}
{{--                                    <a href="{{ url('search/' . $domestic['name'] . '?selection_type=1&select_id=' . $domestic['id']  . '&start_date=' . LanguageHelper::custom_carbon_today() .'&end_date=' . LanguageHelper::custom_carbon_today_after(LanguageHelper::custom_carbon_today(),5) . '&adult_count=2&child_count=0&child_ages%5B%5D=0&child_ages%5B%5D=0&child_ages%5B%5D=0&child_ages%5B%5D=0' ) }}"--}}
{{--                                       class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                        {{ $domestic['name'] ?? '' }} Otelleri--}}
{{--                                    </a>--}}
{{--                                    <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                                </div>--}}
{{--                            @empty--}}
{{--                            @endforelse--}}

{{--                            <div class="col-md-6 col-6 d-inline-block">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block pr-0 mt-2">--}}
{{--                                <a href="" class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block mt-2">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block pr-0 mt-2">--}}
{{--                                <a href="" class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block mt-2">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block pr-0 mt-2">--}}
{{--                                <a href="" class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block mt-2">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block pr-0 mt-2">--}}
{{--                                <a href="" class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block mt-2">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block pr-0 mt-2">--}}
{{--                                <a href="" class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block mt-2">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block pr-0 mt-2">--}}
{{--                                <a href="" class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block mt-2">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block pr-0 mt-2 mb-2">--}}
{{--                                <a href="" class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block mt-2 mb-2">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-6 d-inline-block">--}}

{{--                        <div class="view overlay zoom second-special-view">--}}
{{--                            <label class="position-absolute ml-2 mt-2 text-white">Uluslararası Oteller</label>--}}
{{--                            <img src="{{ $theme['international']->file }}"--}}
{{--                                 class="img-fluid " alt="" style="width: 100% !important;">--}}
{{--                            <div class="mask flex-center waves-effect waves-light">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row mt-2">--}}

{{--                            @forelse($theme['international']['cities'] as $international)--}}

{{--                                <div class="col-md-6 col-6 d-inline-block pr-0">--}}
{{--                                    <a href="{{ url('search/' . $international['name'] . '?selection_type=1&select_id=' . $international['id']  . '&start_date=' . LanguageHelper::custom_carbon_today() .'&end_date='.LanguageHelper::custom_carbon_today_after(LanguageHelper::custom_carbon_today(),5).'&adult_count=2&child_count=0&child_ages%5B%5D=0&child_ages%5B%5D=0&child_ages%5B%5D=0&child_ages%5B%5D=0' ) }}"--}}
{{--                                       class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                        {{ $international['name'] ?? '' }} Otelleri--}}
{{--                                    </a>--}}
{{--                                    <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                                </div>--}}
{{--                            @empty--}}
{{--                            @endforelse--}}


{{--                            <div class="col-md-6 col-6 d-inline-block">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block pr-0 mt-2">--}}
{{--                                <a href="" class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block mt-2">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="view overlay zoom second-special-view mt-3">--}}
{{--                            <label class="position-absolute ml-2 mt-2 text-white">Kıbrıs Otelleri</label>--}}
{{--                            <img src="https://www.tatilbudur.com/themes/tbcom/assets/images/otel-kibris-v2.jpg"--}}
{{--                                 class="img-fluid " alt="" style="width: 100% !important;">--}}
{{--                            <div class="mask flex-center waves-effect waves-light">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row mt-2">--}}
{{--                            <div class="col-md-6 col-6 d-inline-block pr-0">--}}
{{--                                <a href="" class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block pr-0 mt-2">--}}
{{--                                <a href="" class="font-small d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-6 d-inline-block mt-2">--}}
{{--                                <a href="" class="font-small text-muted d-inline-block font-weight-bolder text-muted">--}}
{{--                                    Antalya Otelleri--}}
{{--                                </a>--}}
{{--                                <i class="fa fa-chevron-right text-muted float-right mt-1"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

{{--    @include('client.pages.homepage.tour')--}}



    @include('client.pages.homepage.thermal')

    @include('client.pages.homepage.villa')

    @include('client.pages.homepage.theme')

{{--    @include('client.pages.homepage.blog')--}}

    @include('client.pages.homepage.faq')

    @include('client.pages.homepage.keywords')

    @include('client.pages.homepage.newsletter')

@endsection
