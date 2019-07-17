@extends('client.layouts.main')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-muted font-weight-bolder">
                    {{ $tour->name ?? '' }}
                </h4>
                <p>
                    <span class="text-muted">OtelRezerv > 2018 Kültür Turları Son Dakika Fırsatları > Karadeniz Turları > Antalya Çıkışlı Karadeniz Batum Turu / 5 Gece Otel Konaklaması</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-9 d-inline-block">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carousel-example-2" class="carousel slide carousel-fade first-special-carousel"
                             data-ride="carousel">
                            <ol class="carousel-indicators">
                                @for($i=0;$i<count($tour->files);$i++)
                                    <li data-target="#carousel-example-2" data-slide-to="{{ $i }}"
                                        class="{{ $i == 0 ? 'active' : ''}}"></li>
                                @endfor
                            </ol>
                            <div class="carousel-inner" role="listbox">

                                @forelse($tour->files as $index => $image)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="view">
                                            <img class="d-block w-100" src="{{ asset("tours/images/$image->name") }}"
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
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h3 class="text-muted font-weight-bolder">Konaklama Tarihinizi Belirleyin</h3>
                    </div>
                    <div class="col-md-12 pl-1 pr-2">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="first" role="tabpanel"
                                 aria-labelledby="first-tab">
                                <div class="container pt-2 pb-2 pr-4 pl-4">
                                    <div class="row">
                                        <div class="col-md-3 col-6 p-0 mt-1 mt-md-0">
                                            <label class="text-muted font-small text-uppercase">Giriş Tarihi</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text first-special-input-text">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control first-special-input"
                                                       id="datepicker-6" value="11.04.2019"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-6 p-0 mt-1 mt-md-0">
                                            <label class="text-muted font-small text-uppercase">Çıkış Tarihi</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text first-special-input-text">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control first-special-input"
                                                       id="datepicker-5" value="12.04.2019"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 p-0 mt-1 mt-md-0">
                                            <label class="text-muted font-small text-uppercase">Yetişkin Sayısı</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text first-special-input-text">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <select class="form-control custom-select first-special-input">
                                                    <option selected>1 Kişi</option>
                                                    <option value="1">2 Kişi</option>
                                                    <option value="2">3 Kişi</option>
                                                    <option value="3">4 Kişi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 p-0 mt-1 mt-md-0">
                                            <label class="text-muted font-small text-uppercase">Çocuk Sayısı</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text first-special-input-text">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <select class="form-control custom-select first-special-input">
                                                    <option selected>1 Kişi</option>
                                                    <option value="1">2 Kişi</option>
                                                    <option value="2">3 Kişi</option>
                                                    <option value="3">4 Kişi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12 p-0 mt-1 mt-md-0 border-bottom"
                                             style="border-top-right-radius: 6px !important; border-bottom-right-radius: 6px !important;">
                                            <label class="text-white font-small text-uppercase">.</label>
                                            <div class="input-group border-top border-right">
                                                <button class="btn font-weight-bold fifth-special-button col-md-11 col-12">
                                                    Ara &nbsp; <i class="fa fa-chevron-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs md-tabs second-special-tabs" id="myTabMD" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="first-tab-md" data-toggle="tab" href="#first-md"
                                   role="tab"
                                   aria-controls="first-md" aria-selected="true">Tur Programı</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="second-tab-md" data-toggle="tab" href="#second-md" role="tab"
                                   aria-controls="second-md" aria-selected="false">Oteller / Fiyatlar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="third-tab-md" data-toggle="tab" href="#third-md" role="tab"
                                   aria-controls="third-md" aria-selected="false">Genel Şartlar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="fourth-tab-md" href="">Grup Talebi</a>
                            </li>
                        </ul>
                        <div class="tab-content card mt-3 p-3" id="myTabContentMD">
                            <div class="tab-pane fade show active" id="first-md" role="tabpanel"
                                 aria-labelledby="first-tab-md">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-muted font-weight-bolder">
                                            {!! $tour->name ?? '' !!}</h5>
                                    </div>
                                    <div class="col-md-12 pl-5 mt-3">
                                        {!! $tour->program ?? '' !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="second-md" role="tabpanel" aria-labelledby="second-tab-md">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-muted font-weight-bolder">Fiyat Tablosu</h5>
                                        <div class="mt-1 mb-1">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Dönem / Pansiyon</th>
                                                    <th scope="col">İndirim</th>
                                                    <th scope="col">2 Kişilik Oda'da Kişi Başı</th>
                                                    <th scope="col">Tek Kişilik Oda</th>
                                                    <th scope="col">İlave Yatak</th>
                                                    <th scope="col">Çocuk</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @forelse($tour->prices as $price)
                                                    <tr>
                                                        <th scope="row">
                                                            <label class="mt-3">
                                                                {{ Helper::custom_carbon_d_m_y_format($price->start_date) ?? '' }}
                                                                -
                                                                {{ Helper::custom_carbon_d_m_y_format($price->end_date) ?? '' }}
                                                            </label>
                                                        </th>
                                                        <td class="first-text-color"><label
                                                                    class="mt-2 font-weight-bolder">%40<br>İndirim</label>
                                                        </td>
                                                        <td>
                                                            {{ Helper::custom_money($price->person_price) }}
                                                            TL <br>
                                                            <button class="btn fifth-special-button ml-0 p-1 pl-4 pr-4">
                                                                Seç
                                                            </button>
                                                        </td>
                                                        <td>
                                                            {{ Helper::custom_money($price->person_price) }}
                                                            TL
                                                            <br>
                                                            <button class="btn fifth-special-button ml-0 p-1 pl-4 pr-4">
                                                                Seç
                                                            </button>
                                                        </td>
                                                        <td>
                                                            {{ Helper::custom_money($price->extra_bed_price) }}
                                                            TL
                                                            <br>
                                                            <button class="btn fifth-special-button ml-0 p-1 pl-4 pr-4">
                                                                Seç
                                                            </button>
                                                        </td>
                                                        <td><label class="mt-3"><a href="">Detay</a></label></td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="third-md" role="tabpanel" aria-labelledby="third-tab-md">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! $tour->general_condition ?? '' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-inline-block">
                <div class="row mb-3">
                    <div class="col-md-12 mt-3 mt-md-0 p-0">
                        <div class="text-center">
                            <button type="button" class="btn fourth-special-button fsb-1 col-md-12 col-11">
                                Rezervasyon Yap
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 p-md-0 mb-0">
                        <div class="card mb-0">
                            <div class="card-body p-2 text-white second-bg-color mb-0">
                                <label class="mb-0 font-weight-bolder text-white ml-2">1.207 <span class="font-small">TL'den itibaren</span></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 border p-0 second-special-row ssr-1">
                    @forelse($tour->files as $index => $image)
                        <div class="col-md-6 col-6 p-0 pr-1">
                            <div class="modal fade" id="modal{{ ++$index }}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body mb-0 p-0">
                                            <img class="img-fluid z-depth-1"
                                                 src="{{ asset("tours/images/$image->name") }}"
                                                 alt="" style="width: 100% !important;"/>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <span class="mr-4">Genel Görünüm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a>
                                <img class="img-fluid z-depth-1"
                                     src="{{ asset("tours/images/$image->name") }}"
                                     alt="" data-toggle="modal" data-target="#modal{{ $index }}"
                                     style="height: 100px !important;">
                            </a>
                        </div>
                    @empty
                        Henüz Resim Eklenmedi
                    @endforelse

                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card second-bg-color text-white">
                            <div class="card-body p-1 pb-0">
                                <div class="text-left d-inline-block">
                                    <label class="font-weight-bolder align-middle m-0 ml-2"
                                           style="margin-top: 2px !important;">Puan</label>
                                </div>
                                <div class="float-right d-inline-block">
                                    <h4 class="font-weight-bold m-0 mr-2">9.0</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-light border alert-dismissible fade show font-small mt-3" role="alert">
                    Şu anda bu turu <strong>{{ rand(1,50) }}</strong> kişi inceliyor
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card p-2 border">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="font-weight-bolder text-muted">Tüm Antalya Turları</label>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <label class="text-muted font-small d-inline-block">Side Turları</label>
                                            <i class="fa fa-chevron-right mt-1 second-text-color d-inline-block float-right"></i>
                                        </div>
                                        <div class="col-md-6 col-6 pl-1">
                                            <label class="text-muted font-small d-inline-block">Alanya Turları</label>
                                            <i class="fa fa-chevron-right mt-1 second-text-color d-inline-block float-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <label class="text-muted font-small d-inline-block">Side Turları</label>
                                            <i class="fa fa-chevron-right mt-1 second-text-color d-inline-block float-right"></i>
                                        </div>
                                        <div class="col-md-6 col-6 pl-1">
                                            <label class="text-muted font-small d-inline-block">Alanya Turları</label>
                                            <i class="fa fa-chevron-right mt-1 second-text-color d-inline-block float-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <label class="text-muted font-small d-inline-block">Side Turları</label>
                                            <i class="fa fa-chevron-right mt-1 second-text-color d-inline-block float-right"></i>
                                        </div>
                                        <div class="col-md-6 col-6 pl-1">
                                            <label class="text-muted font-small d-inline-block">Alanya Turları</label>
                                            <i class="fa fa-chevron-right mt-1 second-text-color d-inline-block float-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <label class="text-muted font-small d-inline-block">Side Turları</label>
                                            <i class="fa fa-chevron-right mt-1 second-text-color d-inline-block float-right"></i>
                                        </div>
                                        <div class="col-md-6 col-6 pl-1">
                                            <label class="text-muted font-small d-inline-block">Alanya Turları</label>
                                            <i class="fa fa-chevron-right mt-1 second-text-color d-inline-block float-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <label class="text-muted font-small d-inline-block">Side Turları</label>
                                            <i class="fa fa-chevron-right mt-1 second-text-color d-inline-block float-right"></i>
                                        </div>
                                        <div class="col-md-6 col-6 pl-1">
                                            <label class="text-muted font-small d-inline-block">Alanya Turları</label>
                                            <i class="fa fa-chevron-right mt-1 second-text-color d-inline-block float-right"></i>
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
            <div class="col-md-12">
                <h4 class="text-muted font-weight-bolder">Benzer Turlar</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 d-inline-block">
                <div class="card first-special-card">
                    <img class="card-img-top"
                         src="https://ucdn.tatilbudur.net/tur/kurban-bayrami-ozel-karadeniz-ruyasi-ve-batum-turu-5-gece-otel-konaklamasi//365x160//117578.jpg"
                         alt="">
                    <div class="card-body pb-1">
                        <h5 class="card-title p-0 m-0"><a>KURBAN BAYRAMI ÖZEL KARADENİZ...</a></h5>
                        <label class="card-text p-0 m-0">7 Gün 6 Gece 09.08.2019 - 15.08.2019</label>
                        <hr/>
                        <a href="" class="first-special-card-icon float-right d-inline-block"><i
                                    class="far fa-arrow-alt-circle-right"></i></a>
                        <label class="float-right d-inline-block mt-2 mr-2 font-weight-bolder"><h4>2.447 TL</h4></label>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3 mt-md-0 d-inline-block">
                <div class="card first-special-card">
                    <img class="card-img-top"
                         src="https://ucdn.tatilbudur.net/tur/kurban-bayrami-ozel-karadeniz-ruyasi-ve-batum-turu-5-gece-otel-konaklamasi//365x160//117578.jpg"
                         alt="">
                    <div class="card-body pb-1">
                        <h5 class="card-title p-0 m-0"><a>KURBAN BAYRAMI ÖZEL KARADENİZ...</a></h5>
                        <label class="card-text p-0 m-0">7 Gün 6 Gece 09.08.2019 - 15.08.2019</label>
                        <hr/>
                        <a href="" class="first-special-card-icon float-right d-inline-block"><i
                                    class="far fa-arrow-alt-circle-right"></i></a>
                        <label class="float-right d-inline-block mt-2 mr-2 font-weight-bolder"><h4>2.447 TL</h4></label>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3 mt-md-0 d-inline-block">
                <div class="card first-special-card">
                    <img class="card-img-top"
                         src="https://ucdn.tatilbudur.net/tur/kurban-bayrami-ozel-karadeniz-ruyasi-ve-batum-turu-5-gece-otel-konaklamasi//365x160//117578.jpg"
                         alt="">
                    <div class="card-body pb-1">
                        <h5 class="card-title p-0 m-0"><a>KURBAN BAYRAMI ÖZEL KARADENİZ...</a></h5>
                        <label class="card-text p-0 m-0">7 Gün 6 Gece 09.08.2019 - 15.08.2019</label>
                        <hr/>
                        <a href="" class="first-special-card-icon float-right d-inline-block"><i
                                    class="far fa-arrow-alt-circle-right"></i></a>
                        <label class="float-right d-inline-block mt-2 mr-2 font-weight-bolder"><h4>2.447 TL</h4></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#datepicker-1').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
            });

            $('#datepicker-2').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
            });

            $('#datepicker-3').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
            });

            $('#datepicker-4').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            }, function (start, end, label) {
                var years = moment().diff(start, 'years');
            });

            $('[data-toggle="popover"]').popover();

        });

    </script>
@endsection