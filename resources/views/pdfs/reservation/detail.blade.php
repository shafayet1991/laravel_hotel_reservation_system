<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        *{
            font-family:"DeJaVu Sans Mono",monospace;
        }
    </style>
</head>
<body>
<div>
    <div class="col-md-12">
        <strong>Rezervasyon Sahibi</strong><br>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th width="10%">Adı Soyadı</th>
                <th width="10%">Email</th>
                <th width="10%">Telefon</th>
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
    <hr>
    <div class="col-md-12">
        <strong>Otel Rezervasyon Özeti</strong><br>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th width="10%">Rezervasyon Numarası</th>
                <th width="10%">Otel</th>
                <th width="10%">Adres</th>
                <th width="10%">Otel Telefon</th>
                <th width="10%">Otel Email</th>
                <th width="10%">Otel Tipi</th>
                <th width="10%">Oda</th>
                <th width="10%">Oda Tipi</th>
                <th width="10%">Pansiyon Tipi</th>
                <th width="10%">Yetişkin</th>
                <th width="10%">Çocuk</th>
                <th width="10%">Giriş Tarihi</th>
                <th width="10%">Çıkış Tarihi</th>
                <th width="10%">Gece</th>
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
    <hr>
    <div class="col-md-12">
        <strong>Genel Bilgilendirme</strong><br>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th width="10%">Durumu</th>
                <th width="10%">Rezervasyon Kaydı</th>
                <th width="10%">Yetişkin Sayısı</th>
                <th width="10%">Çocuk Sayısı</th>
                <th width="10%">Ödeme Tipi</th>
                <th width="10%">Ek İstekler</th>
                <th width="10%">Promosyon Kodu</th>
                <th width="10%">Ön Bilgilendirme İstiyor Mu?</th>
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
    <hr>
    <div class="col-md-12">
        <strong>Misafir Bilgileri</strong><br>
        <table class="mt-2" width="100%">
            <tr>
                <th><h6><b>Türü</b></h6></th>
                <th><h6><b>Ad Soyad</b></h6></th>
                <th><h6><b>Cinsiyet</b></h6></th>
                <th><h6><b>Yaşlar</b></h6></th>
                <th><h6><b>Doğum Tarihi</b></h6></th>
            </tr>
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
    <hr>
    <div class="col-md-12">
        <strong>Ulaşım Bilgileri</strong><br>
        @switch($reservation->is_transportation)
            @case(0)
            Kullanıcı ulaşım bilgilerini girmemiştir.
            @break;
            @case(1)
            Kullanıcı ulaşım bilgilerini girmemiştir.
            @break;
            @case(4)
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="10%">Transfer Nereden</th>
                    <th width="10%">Transfer Nereye</th>
                    <th width="10%">Transfer Türü</th>
                    <th width="10%">Transfer Ücreti</th>
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
    <hr>
    <div class="col-md-12">
        <strong>Fiyatlar</strong><br>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th width="15%">Ürün</th>
                <th width="20%">Fiyat</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    Otel Adı : {{ $reservation->room->hotel->name ?? '' }} <br>
                    Oda Adı : {{ $reservation->room->name ?? '' }} <br>
                </td>
                <td>{{ Helper::custom_money($reservation->room_price) ?? 0 }} ₺</td>
            </tr>
            <tr>
                <td>Transfer Ücreti</td>
                <td>{{ Helper::custom_money($reservation->transfer_amount) ?? 0 }} ₺</td>
            </tr>
            <tr style="background: #D3D3D3;">
                <td>Toplam</td>
                <td>Tahsilat</td>
            </tr>
            <tr>
                <td></td>
                <td>{{ Helper::custom_money($reservation->total_amount) ?? 0 }} ₺</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>