<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Otel Rezevasyon</title>
    @include('client.layouts.style')
    @yield('styles')
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card" id="printable">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12 text-center">
                            <div class="w-100 border-bottom pb-2">
                                <img src="{{ asset('images/logo/logo.png') }}" class="text-center d-block center-element" height="70px" width="225px"/>
                                <label class="text-muted mt-2 d-block">halalhotelcheck.com</label>
                                <label class="text-muted d-block">{{ $data['reservation']->room->hotel->address ?? '' }}</label>
                                <label class="text-muted d-block">{{ $data['reservation']->room->hotel->phone ?? '' }}</label>
                            </div>
                        </div>
                        <div class="col-md-12 col-12 text-center">
                            <div class="w-100 border-bottom pb-1 pt-2">
                                <h5 class="font-weight-bolder text-muted">Rezervasyon Sözleşmesi</h5>
                            </div>
                        </div>
                        <div class="col-md-12 col-12 text-center">
                            <div class="w-100 border-bottom pb-1 pt-2">
                                <h5 class="font-weight-bolder text-muted">Otel Konaklama Bilgileri</h5>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <table class="mt-3">
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Rezervasyon Numarası</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->order_number ?? ''}}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Kayıt Tarihi</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->created_at ?? '' }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Otel Adı</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->room->hotel->name ?? '' }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Adres</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->room->hotel->address ?? '' }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Telefon</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->room->hotel->phone ?? '' }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">E-posta</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->room->hotel->email ?? '' }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Otel Tipleri</label></h6></td>
                                    <td>
                                        <label>
                                            <h6>
                                                @forelse($data['reservation']->room->hotel->hotel_types as $hotel_type)
                                                    {{ $hotel_type->name ?? '' }},
                                                @empty
                                                @endforelse
                                            </h6>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Oda Tipi</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->room->room_type->name ?? '' }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Pansiyon Tipi</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->room->hotel->board_type->name ?? '' }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Giriş</label></h6></td>
                                    <td><label><h6>{{ Helper::custom_carbon_full_date($data['reservation']->start_date ?? '') }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Çıkış</label></h6></td>
                                    <td><label><h6>{{ Helper::custom_carbon_full_date($data['reservation']->end_date ?? '') }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Yetişkin</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->adult_count ?? '' }}</h6></label></td>
                                </tr>
                                @if($data['reservation']->child_count > 0)
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Çocuk</label></h6></td>
                                        <td><label><h6>{{ $data['reservation']->child_count ?? '' }}</h6></label></td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Oda Sayısı</label></h6></td>
                                    <td><label><h6>1</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Gece Sayısı</label></h6></td>
                                    <td><label><h6>{{ Helper::custom_night($data['reservation']->start_date ?? '',$data['reservation']->end_date ?? '') }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Harita</label></h6></td>
                                    <td><label><h6>
                                                <a href="https://maps.google.com/?q={{ $data['reservation']->room->hotel->latitude ?? '' }},{{ $data['reservation']->room->hotel->longitude ?? '' }}" target="_blank">Haritayı görüntülemek için tıklayınız</a>
                                            </h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">İade Bilgileri</label></h6></td>
                                    <td><label><h6>
                                                {!! $data['reservation']->room->hotel->cancel_description ?? '' !!}
                                            </h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Toplam Tutar</label></h6></td>
                                    <td><label><h6><b>{{ Helper::custom_money($data['reservation']->total_amount ?? '')}} TL</b></h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Ödeme Tipi</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->payment }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Müşteri Temsilcisi</label></h6></td>
                                    <td><label><h6>Online (Website)</h6></label></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12 col-12 text-center">
                            <div class="w-100 border-bottom pb-1 pt-2">
                                <h5 class="font-weight-bolder text-muted">Misafir Bilgileri</h5>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <table class="mt-2" border="0" width="100%" cellpadding="10" cellspacing="10">
                                <th><h6><b>Türü</b></h6></th>
                                <th><h6><b>Ad Soyad</b></h6></th>
                                <th><h6><b>Cinsiyet</b></h6></th>
                                <th><h6><b>Yaş</b></h6></th>
                                @forelse($data['reservation']->adults as $adult)
                                    <tr>
                                        <td><h6>Yetişkin</h6></td>
                                        <td><h6>{{ $adult->adult_full_name ?? '' }}</h6></td>
                                        <td><h6>{{ $adult->gender_name }}</h6></td>
                                        <td><h6>{{ $adult->age ?? '' }}</h6></td>
                                    </tr>
                                @empty
                                @endforelse
                                @forelse($data['reservation']->children as $child)
                                    <tr>
                                        <td><h6>Çocuk</h6></td>
                                        <td><h6>{{ $child->child_full_name ?? '' }}</h6></td>
                                        <td><h6>{{ $child->gender_name ?? '' }}</h6></td>
                                        <td><h6>{{ $child->age ?? '' }}</h6></td>
                                    </tr>
                                @empty
                                @endforelse
                            </table>
                        </div>
                        <div class="col-md-12 col-12 text-center">
                            <div class="w-100 border-bottom pb-1 pt-2">
                                <h5 class="font-weight-bolder text-muted">İletişim Bilgileri</h5>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <table class="mt-3">
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Ad</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->person_name ?? 'Belirtilmedi' }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Soyad</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->person_surname ?? 'Belirtilmedi' }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">E-Posta</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->person_email ?? 'Belirtilmedi' }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Telefon</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->person_mobile ?? 'Belirtilmedi' }}</h6></label></td>
                                </tr>
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Ek İstekler</label></h6></td>
                                    <td><label><h6>{{ $data['reservation']->additional_requests ?? 'Belirtilmedi' }}</h6></label></td>
                                </tr>
                            </table>
                        </div>
                        {{--                            <div class="col-md-12 col-12 text-center">--}}
                        {{--                                <div class="w-100 border-bottom pb-1 pt-2">--}}
                        {{--                                    <h5 class="font-weight-bolder text-muted">Fatura Bilgileri</h5>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="col-md-12 col-12">--}}
                        {{--                                <table class="mt-3">--}}
                        {{--                                    <tr>--}}
                        {{--                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Türü</label></h6></td>--}}
                        {{--                                        <td><label><h6>Bireysel</h6></label></td>--}}
                        {{--                                    </tr>--}}
                        {{--                                    <tr>--}}
                        {{--                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Ünvan</label></h6></td>--}}
                        {{--                                        <td><label><h6>Mehmet Arslan</h6></label></td>--}}
                        {{--                                    </tr>--}}
                        {{--                                    <tr>--}}
                        {{--                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Vergi Numarası / TC No</label></h6></td>--}}
                        {{--                                        <td><label><h6></h6></label></td>--}}
                        {{--                                    </tr>--}}
                        {{--                                    <tr>--}}
                        {{--                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Vergi Dairesi</label></h6></td>--}}
                        {{--                                        <td><label><h6></h6></label></td>--}}
                        {{--                                    </tr>--}}
                        {{--                                    <tr>--}}
                        {{--                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Fatura Adresi</label></h6></td>--}}
                        {{--                                        <td><label><h6></h6></label></td>--}}
                        {{--                                    </tr>--}}
                        {{--                                </table>--}}
                        {{--                            </div>--}}
                        <div class="col-md-12 col-12 text-center">
                            <div class="w-100 border-bottom pb-1 pt-2">
                                <h5 class="font-weight-bolder text-muted">Ödeme</h5>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <table class="mt-3">
                                <tr>
                                    <td class="first-special-td"><h6><label class="font-weight-bolder">Toplam Tutar</label></h6></td>
                                    <td><label><h6><b>{{ Helper::custom_money($data['reservation']->total_amount ?? '') }} TL</b></h6></label></td>
                                </tr>
                                {{--                                    <tr>--}}
                                {{--                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Ödenen Tutar</label></h6></td>--}}
                                {{--                                        <td><label><h6><b>0.00 TL</b></h6></label></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Şimdi Ödenecek</label></h6></td>--}}
                                {{--                                        <td><label><h6>-</h6></label></td>--}}
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12 col-12 text-center">
                            <div class="w-100 border-bottom pb-1 pt-2">
                                <h5 class="font-weight-bolder text-muted">Sözleşme</h5>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            {!! $general->contract_detail ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 col-12 text-center">
            <a  class="btn details-view-button" data-toggle="modal" data-target="#basicExampleModal">Rezervasyonu Tamamla</a>
        </div>
    </div>
</div>

<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rezervasyonu Tamamla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Rezervasyonunuz başarılı bir şekilde kayıt edilmiştir. Otelden müsaitlik Alındıktan sonra sizinle iletişime geçilecektir.</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn first-special-button" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>


@include('client.layouts.script')

<style>
    .selectize-input {
        min-height: 60px !important;
        border: 0 !important;
        border-radius: 0 !important;
        -webkit-border-radius: 0 !important;
        -moz-border-radius: 0 !important;
        line-height: 40px !important;
        overflow: unset !important;
    }
</style>
@yield('scripts')
</body>
</html>