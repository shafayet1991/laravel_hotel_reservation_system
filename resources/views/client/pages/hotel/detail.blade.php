@extends('client.layouts.main')

@section('meta')
    {!! SEOMeta::generate() !!}
{{--    {!! OpenGraph::generate() !!}--}}
{{--    {!! Twitter::generate() !!}--}}
@endsection

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 pr-md-1">
                <div class="card box-shadow-none">
                    <div class="card-body">
                        <h3 class="text-muted font-weight-bolder">{{ $hotel->name }} <i
                                    class="fa fa-check-circle second-text-color"></i></h3>
                        <span class="text-muted"><i class="fa fa-map-marker-alt second-text-color"></i> {{ $hotel->address }} - {{ $hotel->county->name ?? '' }}, {{ $hotel->city->name ?? '' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-9 d-inline-block">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carousel-example-2" class="carousel slide carousel-fade first-special-carousel"
                             data-ride="carousel">
                            <ol class="carousel-indicators">
                                @for($i=0;$i<count($hotel->files);$i++)
                                    <li data-target="#carousel-example-2" data-slide-to="{{ $i }}"
                                        class="{{ $i == 0 ? 'active' : ''}}"></li>
                                @endfor
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @forelse($hotel->files as $index => $image)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="view">
                                            <img class="d-block w-100" src="{{ asset("hotels/images/$image->name") }}"
                                                 alt="">
                                        </div>
                                        <div class="carousel-caption">
                                            <p>Genel Görünüm</p>
                                        </div>
                                    </div>
                                @empty
                                    Henüz Resim Eklenmedi
                                @endforelse
                            </div>
                            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left" style="font-size: 60px !important;"></i>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                                <i class="fa fa-chevron-right" style="font-size: 60px !important;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <label class="text-muted">{!! $hotel->hotel_description ?? '' !!}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 pl-3 pr-3">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="first" role="tabpanel"
                                 aria-labelledby="first-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-4">
                                            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                            <div class="col-md-12 mb-1">
                                                <h3 class="text-muted font-weight-bolder">Oda Seçenekleri</h3>
                                            </div>
                                            <div class="col-md-3 col-6 p-0 pt-1 mt-1 mt-md-0">
                                                <label class="text-muted font-small text-uppercase ml-2">Giriş Tarihi</label>
                                                <div class="input-group border-left border-left-md-0">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text first-special-input-text border-left-0">
                                                            <i class="fa fa-calendar-alt"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="start_date"
                                                           class="form-control first-special-input"
                                                           id="datepicker-8"
                                                           value="{{$start_date??\Carbon\Carbon::now()->format('d.m.Y')}}"
                                                           night-date-get-id="1"/>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 p-0 pt-1 mt-1 mt-md-0">
                                                <label class="text-muted font-small text-uppercase ml-2">Çıkış Tarihi</label>
                                                <div class="input-group border-right border-right-md-0">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text first-special-input-text">
                                                            <i class="fa fa-calendar-alt"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="end_date"
                                                           class="form-control first-special-input"
                                                           id="datepicker-9"
                                                           value="{{$end_date??\Carbon\Carbon::now()->addDay(4)->format('d.m.Y')}}"
                                                           night-date-set-id="1"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 p-0 pt-1 mt-1 mt-md-0">
                                                <label class="text-muted font-small text-uppercase ml-2">Yetişkin
                                                    Sayısı</label>
                                                <div class="input-group border-right border-right-md-0">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text first-special-input-text">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <select name="adult_count" id="adult_count"
                                                            class="form-control custom-select first-special-input">
                                                        <option value="1" @if($adult_count === "1") selected @endif>1 Kişi
                                                        </option>
                                                        <option selected value="2" @if($adult_count === "2") selected @endif >2 Kişi
                                                        </option>
                                                        <option value="3" @if($adult_count === "3") selected @endif>3 Kişi
                                                        </option>
                                                        <option value="4" @if($adult_count === "4") selected @endif>4 Kişi
                                                        </option>
                                                        <option value="5" @if($adult_count === "5") selected @endif>5 Kişi
                                                        </option>
                                                        <option value="6" @if($adult_count === "6") selected @endif>6 Kişi
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 p-0 pt-1 mt-1 mt-md-0">
                                                <label class="text-muted font-small text-uppercase ml-2">Çocuk Sayısı</label>
                                                <div class="input-group border-right border-right-md-0">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text first-special-input-text">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <select onchange="handleChildCount()" name="child_count"
                                                            id="child_count"
                                                            class="form-control custom-select first-special-input"
                                                            child-change="yes">
                                                        <option value="0" @if($child_count === "0") selected @endif>0 Kişi
                                                        </option>
                                                        <option value="1" @if($child_count === "1") selected @endif>1 Kişi
                                                        </option>
                                                        <option value="2" @if($child_count === "2") selected @endif>2 Kişi
                                                        </option>
                                                        <option value="3" @if($child_count === "3") selected @endif>3 Kişi
                                                        </option>
                                                        <option value="4" @if($child_count === "4") selected @endif>4 Kişi
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12 p-0 pt-1 mt-1 mt-md-0"
                                                 style="border-top-right-radius: 6px !important; border-bottom-right-radius: 6px !important;">
                                                <label class="text-white font-small text-uppercase">.</label>
                                                <div class="input-group">
                                                    <button onClick="searchByParams()"
                                                            class="btn font-weight-bold fifth-special-button col-md-11 col-12">
                                                        Ara &nbsp; <i class="fa fa-chevron-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12 p-3 mt-0 white">
                                                <label class="font-weight-bolder text-muted text-uppercase mb-0 mr-4">
                                                    Gece Sayısı
                                                </label>
                                                <br class="d-block d-md-none">
                                                <button type="button" class="btn sixth-special-button"
                                                        night-day-button="true" night-day-select="false" night-day="1"
                                                        night-selectbox-active="false" night-date-get-id="1"
                                                        night-date-set-id="1" night-selectbox-id="1">1
                                                </button>
                                                <button type="button" class="btn sixth-special-button ss-btn-active"
                                                        night-day-button="true" night-day-select="false" night-day="2"
                                                        night-selectbox-active="false" night-date-get-id="1"
                                                        night-date-set-id="1" night-selectbox-id="1">2
                                                </button>
                                                <button type="button" class="btn sixth-special-button ss-btn-active"
                                                        night-day-button="true" night-day-select="false" night-day="3"
                                                        night-selectbox-active="false" night-date-get-id="1"
                                                        night-date-set-id="1" night-selectbox-id="1">3
                                                </button>
                                                <button type="button" class="btn seven-special-button ss-btn-active"
                                                        night-day-button="true" night-day-select="false" night-day="4"
                                                        night-selectbox-active="true" night-date-get-id="1"
                                                        night-date-set-id="1" night-selectbox-id="1">4+
                                                </button>
                                                <select class="browser-default custom-select d-none col-md-2 mt-2 mt-md-0 ml-md-4"
                                                        night-selectbox="true" night-date-get-id="1" night-date-set-id="1"
                                                        night-selectbox-id="1">
                                                    @for($i=1;$i<40;$i++)
                                                        <option value="{{$i}}">{{$i}} Gece</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-3 {{ $child_count > 0 ? '':'d-none' }}"
                                                 child-id="1" child-visible="true">
                                                <label class="text-muted mt-1 mb-0 d-inline-block">1.Çocuk Yaşı</label><br>
                                                <select name="first_child_age" class="form-control mb-2">
                                                    @for($i=1;$i<16;$i++)
                                                        <option value="{{$i}}" {{ ( array_key_exists(0, $child_ages) && $child_ages[0] == $i ) ? "selected":"" }}>{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-3 {{ $child_count > 1 ? '':'d-none' }}"
                                                 child-id="2" child-visible="true">
                                                <label class="text-muted mt-1 mb-0 d-inline-block">2.Çocuk Yaşı</label><br>
                                                <select name="second_child_age" class="form-control mb-2">
                                                    @for($i=1;$i<16;$i++)
                                                        <option value="{{$i}}" {{ ( array_key_exists(1, $child_ages) && $child_ages[1] == $i ) ? "selected":"" }}>{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-3 {{ $child_count > 2 ? '':'d-none' }}"
                                                 child-id="3" child-visible="true">
                                                <label class="text-muted mt-1 mb-0 d-inline-block">3.Çocuk Yaşı</label><br>
                                                <select name="third_child_age" class="form-control mb-2">
                                                    @for($i=1;$i<16;$i++)
                                                        <option value="{{$i}}" {{ ( array_key_exists(2, $child_ages) && $child_ages[2] == $i ) ? "selected":"" }}>{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-3 {{ $child_count > 3 ? '':'d-none' }}"
                                                 child-id="4" child-visible="true">
                                                <label class="text-muted mt-1 mb-0 d-inline-block">4.Çocuk Yaşı</label><br>
                                                <select name="fourth_child_age" class="form-control mb-2">
                                                    @for($i=1;$i<16;$i++)
                                                        <option value="{{$i}}" {{ ( array_key_exists(3, $child_ages) && $child_ages[3] == $i ) ? "selected":"" }}>{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3" id="rooms">
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h4 class="text-muted font-weight-bolder">Tesis Bilgileri</h4>
                    </div>
                    <div class="col-md-12">
                        <div class="accordion md-accordion accordion-1" id="accordionEx23" role="tablist">
                            <div class="card">
                                <div class="card-header white lighten-3 z-depth-1" role="tab" id="heading96">
                                    <h5 class="text-uppercase mb-0">
                                        <a class="third-text-color font-weight-bolder" data-toggle="collapse"
                                           href="#collapse96" aria-expanded="true" aria-controls="collapse96">
                                            <i class="fas fa-angle-down"></i> Öne Çıkan Özellikler
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse96" class="collapse show" role="tabpanel" aria-labelledby="heading96"
                                     data-parent="#accordionEx23">
                                    <div class="card-body">
                                        <div class="row p-1">
                                            @forelse($hotel->facilities as $facility)
                                                <div class="border p-2 mb-md-0 col-md-4 col-6"
                                                     style="width: auto; color: black !important;">
                                                    {{ $facility->name }}
                                                    @if($facility->pivot->is_paid === 1)
                                                        <span style="color:red; font-size:15px;">* Bu Aktivite Ücretlidir.</span>
                                                    @endif
                                                </div>
                                            @empty
                                                Henüz Öne Çıkan Bir Özellik Bulunmamaktadır.
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header white lighten-3 z-depth-1" role="tab" id="heading97">
                                    <h5 class="text-uppercase mb-0 py-1">
                                        <a class="collapsed font-weight-bolder third-text-color" data-toggle="collapse"
                                           href="#collapse97" aria-expanded="false" aria-controls="collapse97">
                                            <i class="fas fa-angle-down rotate-icon"></i> Konum
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse97" class="collapse" role="tabpanel" aria-labelledby="heading97"
                                     data-parent="#accordionEx23">
                                    <div class="card-body">
                                        <div class="row my-1">
                                            <div class="col-md-12">
                                                <p class="mb-0">{{ $hotel->address }} {{ $hotel->county->name ?? '' }}
                                                    /{{ $hotel->city->name ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header white lighten-3 z-depth-1" role="tab" id="heading97">
                                    <h5 class="text-uppercase mb-0 py-1">
                                        <a class="collapsed font-weight-bolder third-text-color" data-toggle="collapse"
                                           href="#collapse98" aria-expanded="false" aria-controls="collapse97">
                                            <i class="fas fa-angle-down rotate-icon"></i> Mesafeler
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse98" class="collapse" role="tabpanel" aria-labelledby="heading97"
                                     data-parent="#accordionEx23">
                                    <div class="card-body">
                                        <div class="row my-1">
                                            <div class="mb-3 col-md-6">
                                                <i class="fa fa-map-marker-alt"></i>
                                                Merkez Mesafesi : {{ $hotel->center_distance ?? '' }}
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <i class="fa fa-plane-departure"></i>
                                                Havaalanı Mesafesi : {{ $hotel->airport_distance ?? '' }}
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <i class="fa fa-water"></i>
                                                Deniz Mesafesi : {{ $hotel->sea_distance ?? '' }}
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <i class="fa fa-clinic-medical"></i>
                                                Hastane Mesafesi : {{ $hotel->hospital_distance ?? '' }}
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <i class="fa fa-utensils"></i>
                                                Restaurant Mesafesi : {{ $hotel->restaurant_distance ?? '' }}
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <i class="fa fa-shopping-cart"></i>
                                                Market Mesafesi : {{ $hotel->shop_distance ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                {{--@foreach($facility_categories as $category)--}}
                                <div class="mb-2">
                                    <h5 class="text-muted mb-2">{{--{{$category->name}}--}} Aktiviteler</h5>
                                    <table>
                                        {{--@forelse($hotel->facilities as $facility)--}}
                                            <tr>
                                                <td><label class="features-icon-alt">
                                                        <i class="fas fa-certificate"></i>
                                                        <i class="fa fa-bicycle feature-icon-top"></i>
                                                    </label>
                                                </td>
                                                <td><label class="feature-text">{{--{{ $facility->name }}--}} Deniz Bisikleti
                                                        {{--@if($facility->pivot->is_paid === 1)--}}<span class="feature-paid-text" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Ücretli">*</span>
                                                        {{--@endif--}}
                                                    </label>
                                                </td>
                                            </tr>
                                            {{-- Örnek Tasarım İçin Ekledim Bu Alanı --}}
                                            <tr>
                                                <td><label class="features-icon-alt">
                                                        <i class="fas fa-certificate"></i>
                                                        <i class="fa fa-bicycle feature-icon-top"></i>
                                                    </label>
                                                </td>
                                                <td><label class="feature-text">{{--{{ $facility->name }}--}} Deniz Bisikleti</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label class="features-icon-alt">
                                                        <i class="fas fa-certificate"></i>
                                                        <i class="fa fa-bicycle feature-icon-top"></i>
                                                    </label>
                                                </td>
                                                <td><label class="feature-text">{{--{{ $facility->name }}--}} Gazete</td>
                                            </tr>
                                            {{-- Örnek Tasarım İçin Ekledim Bu Alanı --}}
                                        {{--@empty--}}
                                        {{--Henüz Öne Çıkan Bir Özellik Bulunmamaktadır.--}}
                                    {{--@endforelse--}}
                                    </table>
                                </div>
                                {{--@endforeach--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-inline-block">
                <div class="row mb-4 border p-0 first-special-row d-none d-md-flex">
                    @forelse($hotel->files as $index => $image)
                        <div class="col-md-6 col-6 mb-3 p-0 pr-1">
                            <div class="modal fade" id="modal{{ ++$index }}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body mb-0 p-0">
                                            <img class="img-fluid z-depth-1"
                                                 src="{{ asset("hotels/images/$image->name") }}" alt=""
                                                 style="width: 100% !important;"/>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <span class="mr-4">Genel Görünüm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a>
                                <img class="img-fluid z-depth-1 w-100 d-inline-block" src="{{ asset("hotels/images/$image->name") }}" alt=""
                                     data-toggle="modal" data-target="#modal{{ $index }}"
                                     style="height: 100px !important;">
                            </a>
                        </div>
                    @empty
                        Henüz Resim Eklenmedi
                    @endforelse
                </div>
                <div class="row mt-4 mt-md-0">
                    <div class="col-md-8 col-8 d-inline-block p-0 pl-3">
                        <label class="text-primary"><i class="far fa-heart"></i> Beğendiklerime ekle</label>
                    </div>
                    <div class="col-md-4 col-4 d-inline-block pl-0 pr-0">
                        <label class="text-primary"><i class="fa fa-share"></i> Paylaş</label>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 p-2">
                        <div class="card second-bg-color text-white">
                            <div class="card-body p-1 pb-0">
                                <div class="text-left d-inline-block">
                                    <label class="font-weight-bolder align-middle m-0 ml-2"
                                           style="margin-top: 2px !important;">Puan</label>
                                </div>
                                <div class="float-right d-inline-block">
                                    <h4 class="font-weight-bold m-0 mr-2">7.2</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="alert alert-light border alert-dismissible fade show font-small mt-3" role="alert">
                    Şu anda bu oteli <strong style="color:red; font-size:17px;"><u>{{ rand(1,50) }}</u></strong> kişi
                    inceliyor
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>--}}
                <div class="row mt-3">
                    <div class="col-md-12 pl-1">
                        <a href="" class="btn col-md-12 eleven-special-button">Fiyat Tablosu <i
                                    class="fa fa-chevron-right"></i></a>
                        <a href="" class="btn col-md-12 eleven-special-button">Etkinlikler <i
                                    class="fa fa-chevron-right"></i></a>
                        <a class="btn col-md-12 eleven-special-button" data-toggle="modal" data-target="#modalRegular">Haritada
                            Göster</a>
                        <div class="modal fade p-0" id="modalRegular" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg p-0" role="document">
                                <div class="modal-content p-0">
                                    <div class="modal-body mb-0 p-0">
                                        <div id="map-container-google-17"
                                             class="z-depth-1-half col-md-12 map-container-10 p-0"
                                             style="height: 400px !important;">
                                            <iframe src="https://maps.google.com/maps?q=new%20york&t=k&z=13&ie=UTF8&iwloc=&output=embed"
                                                    frameborder="0" class="col-md-12 m-0"
                                                    style="border: 0; height: 400px !important;"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-outline-info btn-md" data-dismiss="modal">
                                            Kapat <i class="fas fa-times ml-1"></i></button>
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
            <div class="col-md-12">
                <h4 class="text-muted font-weight-bolder">Beğenebileceğiniz Oteller</h4>
            </div>
        </div>
        <div class="row mt-3">
            @forelse($interests as $interest)
                @if($interest->price == "" || $interest->price == 0)
                    @continue
                @endif
                <div class="col-md-4 d-inline-block mb-3">
                    <div class="card first-special-card ">
                        @if(Helper::custom_check_numeric($interest->star) !== false)
                            <div class="rating-stars first-rating-stars">
                                @for($i=0; $i<$interest->star;$i++)
                                    <span><i class="fa fa-star fa-fw"></i></span>
                                @endfor
                            </div>
                        @endif
                        <img class="card-img-top" src="{{ asset("hotels/images/$interest->cover") }}" alt="">
                        <div class="card-body pb-1">
                            <h5 class="card-title p-0 m-0"><a>{{ $interest->name }}</a></h5>
                            <label class="card-text p-0 m-0"><i
                                        class="fa fa-map-marker-alt"></i>
                                {{ $interest->county->name ?? '' }} / {{ $interest->city->name ?? '' }}
                            </label>
                            <br><label class="card-text p-0 mt-0" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Sahur & İftar dahildir."><i class="fa fa-check second-text-color"></i> {{ $hotel->board_type->name ?? '' }}</label>
                            <label class="first-specil-card-campaign">{{ $hotel->campaign ?? '' }}</label>
                            <hr/>
                            <a href="{{ route('client.slug',$interest->slug ?? '') }}" class="first-special-card-icon float-right d-inline-block">
                                <i class="far fa-arrow-alt-circle-right"></i>
                            </a>
                            <label class="float-right d-inline-block mt-2 mr-2 font-weight-bolder">
                                <h4>{{ Helper::custom_money($hotel->price) }} {{ session('localize.currency') ?? 'TL' }}</h4>
                            </label>
                            <label class="float-right text-muted d-inline-block mt-2 mr-1">1 GECE</label>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        $(document).ready(function () {

            $('[child-change="yes"]').on('change', function () {

                var child = $(this).val();

                console.log(child);

                if (child == 0) {
                    $('[child-visible="true"]').addClass('d-none');
                    $('[child-visible="true"]').attr('child-visible', 'false');
                }

                for (var i = 0; i < child; i++) {

                    var add_number = Number(i) + Number(1);
                    var visible_control = $('[child-id="' + add_number + '"]').attr('child-visible');

                    if (visible_control == "false") {
                        $('[child-id="' + add_number + '"]').removeClass('d-none');
                        $('[child-id="' + add_number + '"]').attr('child-visible', 'true');
                    }

                    if (visible_control == "true") {

                        $('[child-visible="true"]').addClass('d-none');
                        $('[child-visible="true"]').attr('child-visible', 'false');
                        $('[child-id="' + add_number + '"]').removeClass('d-none');
                        $('[child-id="' + add_number + '"]').attr('child-visible', 'true');
                    }

                }

            });

        });

        $('.js-example-basic-single').select2();

        function handleChildCount() {
            {{--$.ajax({--}}
            {{--    type: "GET",--}}
            {{--    url: "{{ route('hotel.childCount') }}",--}}
            {{--    data: {--}}
            {{--        child_count: $('#child_count').val(),--}}
            {{--    },--}}
            {{--    success: function (data) {--}}
            {{--        console.log(data);--}}
            {{--        $("#rooms").html(data);--}}
            {{--    }--}}
            {{--});--}}
        }

        $('#search_button').on('click', function (event) {

            event.preventDefault();

            var type = $('select[name="select_id"] option:selected').data('type');
            var value = $('select[name="select_id"] option:selected').text();

            $('input[name="type"]').val(type);

            $('#search_form').attr('action', $('#search_form').attr('action') + value);

            $('#search_form').submit();

        });

        function searchByParams() {
            $.ajax({
                type: "GET",
                url: "{{ route('hotel.rooms') }}",
                data: {
                    hotel_id: "{{ $hotel->id }}",
                    start_date: $('#datepicker-8').val(),
                    end_date: $('#datepicker-9').val(),
                    adult_count: $('#adult_count').val(),
                    child_count: $('#child_count').val(),
                    child_ages: [
                        $('select[name="first_child_age"]').val(),
                        $('select[name="second_child_age"]').val(),
                        $('select[name="third_child_age"]').val(),
                        $('select[name="fourth_child_age"]').val(),
                    ]
                },
                success: function (data) {
                    $("#rooms").html(data);
                }
            });
        }

        window.onload = function () {
            searchByParams();
        };
    </script>
@endsection
