@extends('admin.templates.admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <strong>
                    Reservation Owner</strong><br>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width = "10%"> Name Surname </th>
                        <th width = "10%"> Email </th>
                        <th width = "10%"> Phone </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $reservation->person_full_name ?? '' }}</td>
                        <td>{{ $reservation->person_email ?? '' }}</td>
                        <td>{{ $reservation->person_mobile }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <strong>Hotel Reservation Summary</strong><br>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width = "10%"> Reservation Number </th>
                        <th width = "10%"> Hotel </th>
                        <th width = "10%"> Address </th>
                        <th width = "10%"> Hotel Telephone </th>
                        <th width = "10%"> Hotel Email </th>
                        <th width = "10%"> Hotel Type </th>
                        <th width = "10%"> Room </th>
                        <th width = "10%"> Room Type </th>
                        <th width = "10%"> Pension Type </th>
                        <th width = "10%"> Adult </th>
                        <th width = "10%"> Child </th>
                        <th width = "10%"> Entry Date </th>
                        <th width = "10%"> Release Date </th>
                        <th width = "10%"> Night </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $reservation->order_number ?? '' }}</td>
                        <td> {{ $reservation->room->hotel->name ?? '' }}</td>
                        <td> {{ $reservation->room->hotel->address ?? '' }}</td>
                        <td> {{ $reservation->room->hotel->phone ?? '' }}</td>
                        <td> {{ $reservation->room->hotel->email ?? '' }}</td>
                        <td>
                            @forelse($reservation->room->hotel->hotel_types as $hotel_type)
                                {{ $hotel_type->name ?? '' }},
                            @empty
                            @endforelse
                        </td>
                        <td> {{ $reservation->room->name ?? '' }}</td>
                        <td> {{ $reservation->room->room_type->name ?? '' }}</td>
                        <td>{{ $reservation->room->hotel->board_type->name ?? '' }}</td>
                        <td> {{ $reservation->adult_count ?? '' }}</td>
                        <td> {{ $reservation->child_count ?? '' }}</td>
                        <td>{{ $reservation->start_date ?? '' }}</td>
                        <td>{{ $reservation->end_date ?? '' }}</td>
                        <td>{{ Helper::custom_night($reservation->start_date,$reservation->end_date) }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <strong>Genel Bilgilendirme</strong><br>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width = "10%"> Status </th>
                        <th width = "10%"> Booking Record </th>
                        <th width = "10%"> Number of Adults </th>
                        <th width = "10%"> Number of Children </th>
                        <th width = "10%"> Payment Type </th>
                        <th width = "10%"> Additional Requests </th>
                        <th width = "10%"> Promo Code </th>
                        <th width = "10%"> Does It Request Preliminary Information? </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $reservation->status ?? '' }}</td>
                        <td>{{ $reservation->created_at ?? '' }}</td>
                        <td>{{ $reservation->adult_count ?? '' }}</td>
                        <td>{{ $reservation->child_count ?? '' }}</td>
                        <td>{{ $reservation->payment_type ?? '' }}</td>
                        <td>{{ $reservation->additional_requests ?? '' }}</td>
                        <td>{{ $reservation->promotional_code ?? 'Girilmedi'}}</td>
                        <td>{{ $reservation->approval_information }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <strong>Misafir Bilgileri</strong><br>
                <table class="mt-2" border="0" width="100%" cellpadding="10" cellspacing="10">
                    <th> <h6> <b> Type </b> </h6> </th>
                    <th><h6> <b> Name Surname </b> </h6> </th>
                    <Th> <h6> <b> Gender </b> </h6> </th>
                    <Th> <h6> <b> Age </b> </h6> </th>
                    <th><h6> <b> Date of Birth </b> </h6> </th>
                    @forelse($reservation->adults as $adult)
                        <tr>
                            <td><h6>Yetişkin</h6></td>
                            <td><h6>{{ $adult->adult_full_name ?? '' }}</h6></td>
                            <td><h6>{{ $adult->gender_name?? '' }}</h6></td>
                            <td><h6>{{ $adult->age ?? '' }}</h6></td>
                            <td><h6>{{ $adult->adult_birthday ?? '' }}</h6></td>
                        </tr>
                    @empty
                    @endforelse
                    @forelse($reservation->children as $child)
                        <tr>
                            <td><h6>Çocuk</h6></td>
                            <td><h6>{{ $child->child_full_name ?? '' }}</h6></td>
                            <td><h6>{{ $child->gender_name ?? '' }}</h6></td>
                            <td><h6>{{ $child->age ?? '' }}</h6></td>
                            <td><h6>{{ $child->child_birthday ?? '' }}</h6></td>
                        </tr>
                    @empty
                    @endforelse
                </table>
            </div>
            <div class="col-md-12">
                <strong>Ulaşım Bilgileri</strong><br>
                @switch($reservation->is_transportation)
                    @case(0)
                    The user has not entered transportation information.
                    @break;
                    @case(1)

                    The user has not entered transportation information.
                    @break;
                    @case(4)
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width = "10%"> Where to Transfer </th>
                            <th width = "10%"> Where To Transfer </th>
                            <th width = "10%"> Transfer Type </th>
                            <th width = "10%"> Transfer Fee </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($reservation->transfers as $transfer)
                        <tr>
                            <td>{{ $transfer->transfer_from_location }}</td>
                            <td>{{ $transfer->transfer_to_location ?? '' }}</td>
                            <td>{{ $transfer->type ?? '' }}</td>
                            <td>{{ $transfer->transfer_price ?? '' }} (TL??)</td>
                        </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    @break;
                @endswitch
            </div>
{{--            <div class="col-md-12">--}}
{{--                <strong>Fatura Bilgileri</strong><br>--}}
{{--                @if($reservation->is_billing_information === 1)--}}
{{--                    <table class="table table-striped table-bordered">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th width="10%">Fatura türü</th>--}}
{{--                            <th width="10%">Adı Soyadı</th>--}}
{{--                            <th width="10%">TC No</th>--}}
{{--                            <th width="10%">Email</th>--}}
{{--                            <th width="10%">Adres</th>--}}
{{--                            <th width="10%">Ülke</th>--}}
{{--                            <th width="10%">İl</th>--}}
{{--                            <th width="10%">İlçe</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>{{ $reservation->billing_type_info}}</td>--}}
{{--                            <td>{{ $reservation->billing_person_name ?? '' }} {{ $reservation->person_surname ?? '' }}</td>--}}
{{--                            <td>{{ $reservation->billing_person_tc_no ?? '' }}</td>--}}
{{--                            <td>{{ $reservation->billing_email ?? '' }}</td>--}}
{{--                            <td>{{ $reservation->billing_address ?? ''}}</td>--}}
{{--                            <td>{{ $reservation->country->name ?? ''}}</td>--}}
{{--                            <td>{{ $reservation->city->name ?? ''}}</td>--}}
{{--                            <td>{{ $reservation->district->name ?? ''}}</td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                @else--}}
{{--                    Kullanıcı fatura bilgilerini belirtmedi.--}}
{{--                    <br>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--            <div class="col-md-12">--}}
{{--                <strong>Genel Bilgilendirme - Tesise İletmek İstediğiniz Notlar</strong><br>--}}
{{--                <table class="table table-striped table-bordered">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th width="10%">Rezervasyon Tamamlandı Mı?</th>--}}
{{--                        <th width="10%">Kampanyalardan Haberdar Edelim Mi?</th>--}}
{{--                        <th width="10%">Asansöre Yakın Oda Mı?</th>--}}
{{--                        <th width="10%">Sigara İçilmeyen Oda Mı?</th>--}}
{{--                        <th width="10%">Genel Kullanım Alanlarına Yakın Oda Mı?</th>--}}
{{--                        <th width="10%">Üst Katta Yer Alan Oda Mı?</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td>{{ $reservation->process }}</td>--}}
{{--                        <td>{{ $reservation->campaign }}</td>--}}
{{--                        <td>{{ $reservation->elevator }}</td>--}}
{{--                        <td>{{ $reservation->smoking }}</td>--}}
{{--                        <td>{{ $reservation->general_usage }}</td>--}}
{{--                        <td>{{ $reservation->floor }}</td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}

{{--            <div class="col-md-12">--}}
{{--                <strong>Acenta Bilgileri</strong><br>--}}
{{--                <table class="table table-striped table-bordered">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th width="10%">Müşteri Temsilcisi</th>--}}
{{--                        <th width="10%">Acente</th>--}}
{{--                        <th width="10%">Acente Telefon</th>--}}
{{--                        <th width="10%">Acente Fax</th>--}}
{{--                        <th width="10%">Acente Adres</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                           test--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            test--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            test--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            test--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            test--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}

{{--            <div class="col-md-12">--}}
{{--                <strong>Otel Misafir Listesi</strong><br>--}}
{{--                <table class="table table-striped table-bordered">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th width="20%">Oda Tipi</th>--}}
{{--                        <th width="80%">Misafir Bilgileri</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            test--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            test--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--            <div class="col-md-12">--}}
{{--                <strong>Ödeme Bilgileri</strong><br>--}}
{{--                <table class="table table-striped table-bordered">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th width="15%">Ödemeyi Yapan T.C No</th>--}}
{{--                        <th width="10%">Ödeme Tipi</th>--}}
{{--                        <th width="10%">Banka Adı</th>--}}
{{--                        <th width="10%">Kart No</th>--}}
{{--                        <th width="10%">Ödeme Tarihi</th>--}}
{{--                        <th width="10%">Tutar</th>--}}
{{--                        <th width="10%">Alış Komisyonu</th>--}}
{{--                        <th width="10%">Satış Komisyonu</th>--}}
{{--                        <th width="10%">Açıklama</th>--}}
{{--                        <th width="10%">Onay</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--            <div class="col-md-12">--}}
{{--                <strong>Ödeme Bildirimleri</strong><br>--}}
{{--                <table class="table table-striped table-bordered">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Ad Soyad</th>--}}
{{--                        <th>Tarih</th>--}}
{{--                        <th>Tutar</th>--}}
{{--                        <th>Açıklama</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($reservation->reports as $report)--}}
{{--                        <tr>--}}
{{--                            <td>{{$report->full_name}}</td>--}}
{{--                            <td>{{$report->date}}</td>--}}
{{--                            <td>{{$report->amount}}</td>--}}
{{--                            <td>{{$report->description}}</td>--}}
{{--                        </tr>--}}
{{--                        @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
            <div class="col-md-12">
                <strong>Fiyatlar</strong><br>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="15%">Ürün</th>
                        <th width="20%">Fiyat</th>
{{--                        <th width="10%">Maliyet</th>--}}
{{--                        <th width="10%">Karlılık</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            Otel Adı : {{ $reservation->room->hotel->name ?? '' }} <br>
                            Oda Adı : {{ $reservation->room->name ?? '' }} <br>
                        </td>
                        <td>{{ Helper::custom_money($reservation->room_price) ?? 0 }} ₺</td>
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
                    </tr>
{{--                    <tr>--}}
{{--                        <td>İptal Güvence Bedeli</td>--}}
{{--                        <td>{{ LanguageHelper::custom_money($reservation->cancel_amount) ?? 0 }} ₺</td>--}}
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
{{--                    </tr>--}}
                    <tr>
                        <td>Transfer Ücreti</td>
                        <td>{{ Helper::custom_money($reservation->transfer_amount) ?? 0 }} ₺</td>
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
                    </tr>
                    <tr style="background: #D3D3D3;">
                        <td>Toplam</td>
                        <td>Tahsilat</td>
{{--                        <td>Maliyet</td>--}}
{{--                        <td>Kar</td>--}}
                    </tr>
                    <tr>
                        <td></td>
                        <td>{{ Helper::custom_money($reservation->total_amount) ?? 0 }} ₺</td>
{{--                        <td>test</td>--}}
{{--                        <td>test</td>--}}
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection