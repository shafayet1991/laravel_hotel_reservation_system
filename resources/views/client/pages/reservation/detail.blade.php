@extends('client.layouts.main')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card" id="printable">
                    <div class="card-body">
                        @if (session()->has('success'))
                            {{ session('success') }}
                        @endif
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <a onclick="window.print()" class="btn third-special-button d-inline-block">
                                    <i class="fas fa-print"></i> Yazdır</a>
                                <a href="{{ route('common.reservation.sendEmail',$reservation->id ?? 0) }}" class="btn third-special-button d-inline-block">
                                    <i class="fa fa-envelope"></i> E-Mail Gönder
                                </a>
                            </div>
                            <div class="col-md-12 col-12 text-center">
                                <div class="w-100 border-bottom pb-2">
                                    <img src="{{ asset('images/logo/logo.png') }}"
                                         class="text-center d-block center-element" height="70px" width="225px"/>
                                    <label class="text-muted mt-2 d-block">halalhotelcheck.com</label>
                                    <label class="text-muted d-block">{{ $reservation->room->hotel->address ?? '' }}</label>
                                    <label class="text-muted d-block">{{ $reservation->room->hotel->phone ?? '' }}</label>
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
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Rezervasyon
                                                    Numarası</label></h6></td>
                                        <td><label><h6>{{ $reservation->order_number ?? ''}}</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Kayıt
                                                    Tarihi</label></h6></td>
                                        <td><label><h6>{{ $reservation->created_at ?? '' }}</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Otel
                                                    Adı</label></h6></td>
                                        <td><label><h6>{{ $reservation->room->hotel->name ?? '' }}</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Adres</label>
                                            </h6></td>
                                        <td><label><h6>{{ $reservation->room->hotel->address ?? '' }}</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label
                                                        class="font-weight-bolder">Telefon</label></h6></td>
                                        <td><label><h6>{{ $reservation->room->hotel->phone ?? '' }}</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label
                                                        class="font-weight-bolder">E-posta</label></h6></td>
                                        <td><label><h6>{{ $reservation->room->hotel->email ?? '' }}</h6></label></td>
                                    </tr>
                                    {{--                                    <tr>--}}
                                    {{--                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Otel Tipleri</label></h6></td>--}}
                                    {{--                                        <td>--}}
                                    {{--                                            <label>--}}
                                    {{--                                                <h6>--}}
                                    {{--                                                    @forelse($reservation->room->hotel->hotel_types as $hotel_type)--}}
                                    {{--                                                        {{ $hotel_type->name ?? '' }},--}}
                                    {{--                                                    @empty--}}
                                    {{--                                                    @endforelse--}}
                                    {{--                                                </h6>--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </td>--}}
                                    {{--                                    </tr>--}}
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Oda
                                                    Tipi</label></h6></td>
                                        <td><label><h6>{{ $reservation->room->room_type->name ?? '' }}</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Pansiyon
                                                    Tipi</label></h6></td>
                                        <td><label><h6>{{ $reservation->room->hotel->board_type->name ?? '' }}</h6>
                                            </label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Giriş
                                                    Tarihi</label></h6></td>
                                        <td><label>
                                                <h6>{{ Helper::custom_carbon_full_date($reservation->start_date ?? '') }}</h6>
                                            </label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Çıkış
                                                    Tarihi</label></h6></td>
                                        <td><label>
                                                <h6>{{ Helper::custom_carbon_full_date($reservation->end_date ?? '') }}</h6>
                                            </label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Konaklayacağı
                                                    Gece Sayısı</label></h6></td>
                                        <td><label>
                                                <h6>{{ Helper::custom_night($reservation->start_date ?? '',$reservation->end_date ?? '') }}</h6>
                                            </label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label
                                                        class="font-weight-bolder">Yetişkin</label></h6></td>
                                        <td><label><h6>{{ $reservation->adult_count ?? '' }} Kişi</h6></label></td>
                                    </tr>
                                    @if($reservation->child_count > 0)
                                        <tr>
                                            <td class="first-special-td"><h6><label
                                                            class="font-weight-bolder">Çocuk</label></h6></td>
                                            <td><label><h6>{{ $reservation->child_count ?? '' }} Kişi</h6></label></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Oda
                                                    Sayısı</label></h6></td>
                                        <td><label><h6>1 Adet</h6></label></td>
                                    </tr>

                                    <tr>
                                        <td class="first-special-td"><h6><label
                                                        class="font-weight-bolder">Harita</label></h6></td>
                                        <td><label><h6>
                                                    <a href="https://maps.google.com/?q={{ $reservation->room->hotel->latitude ?? '' }},{{ $reservation->room->hotel->longitude ?? '' }}"
                                                       target="_blank">Haritayı görüntülemek için tıklayınız</a>
                                                </h6></label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">İade
                                                    Bilgileri</label></h6></td>
                                        <td><label><h6>
                                                    {!! $reservation->room->hotel->cancel_description ?? '' !!}
                                                </h6></label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Toplam
                                                    Tutar</label></h6></td>
                                        <td><label><h6>
                                                    <b>{{ Helper::custom_money($reservation->total_amount ?? '')}} {{ $reservation->currency ?? '' }}</b>
                                                </h6></label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Ödeme
                                                    Tipi</label></h6></td>
                                        <td><label><h6>{{ $reservation->payment }}</h6></label></td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Müşteri
                                                    Temsilcisi</label></h6></td>
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
                                    <th><h6><b>Yaşlar</b></h6></th>
                                    @forelse($reservation->adults as $adult)
                                        <tr>
                                            <td><h6>Yetişkin</h6></td>
                                            <td><h6>{{ $adult->adult_full_name ?? '' }}</h6></td>
                                            <td><h6>{{ $adult->gender_name ?? '' }}</h6></td>
                                            <td><h6>{{ $adult->age ?? '' }}</h6></td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    @forelse($reservation->children as $child)
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
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Ad</label>
                                            </h6></td>
                                        <td><label><h6>{{ $reservation->person_name ?? 'Belirtilmedi' }}</h6></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Soyad</label>
                                            </h6></td>
                                        <td><label><h6>{{ $reservation->person_surname ?? 'Belirtilmedi' }}</h6></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label
                                                        class="font-weight-bolder">E-Posta</label></h6></td>
                                        <td><label><h6>{{ $reservation->person_email ?? 'Belirtilmedi' }}</h6></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label
                                                        class="font-weight-bolder">Telefon</label></h6></td>
                                        <td><label><h6>{{ $reservation->person_mobile ?? 'Belirtilmedi' }}</h6></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Ek
                                                    İstekler</label></h6></td>
                                        <td><label><h6>{{ $reservation->additional_requests ?? 'Belirtilmedi' }}</h6>
                                            </label></td>
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
                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Toplam
                                                    Tutar</label></h6></td>
                                        <td><label><h6>
                                                    <b>{{ Helper::custom_money($reservation->total_amount ?? '') }} {{ $reservation->currency ?? '' }}</b>
                                                </h6></label></td>
                                    </tr>
                                    {{--                                    <tr>--}}
                                    {{--                                        <td class="first-special-td"><h6><label class="font-weight-bolder">Ödenen Tutar</label></h6></td>--}}
                                    {{--                                        <td><label><h6><b>0.00 {{  session('localize.currency' ?? 'TL) }}</b></h6></label></td>--}}
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

    <div id="reservation_done" class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 col-12 text-center">
                <a class="btn details-view-button" onClick="complete()">
                    Rezervasyonu Tamamla
                </a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function complete() {
            $.ajax({
                url: '{{ route('common.reservation.complete',$reservation->id) }}',
                type: 'GET',
                data: '',
                success: function (data) {
                    if(data.status == 'success'){
                        swal({
                            title: 'Başarılı',
                            text: data.message,
                            type: 'success',
                            button: 'Kapat'
                        }).then(function() {
                            window.location = "https://halalhotelcheck.com"
                        });
                    } else if (data.status == 'error') {
                        swal("Uyarı", data.message, "error").then(function() {
                            window.location = "https://halalhotelcheck.com"
                        });
                    }
                }
            });
        }
    </script>
@endsection