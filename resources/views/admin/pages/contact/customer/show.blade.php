@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        Müşteri Adı : {{ $customer->name ?? '' }} <br>
                        Müşteri Email : {{ $customer->email ?? '' }} <br>
                        Konu : {{ $customer->subject ?? '' }} <br>
                        Mesaj : {{ $customer->message ?? '' }} <br>
                        IP Adresi : {{ $customer->ip_address ?? '' }} <br>
                        Kullanıcının Tarayıcı Bilgileri : {{ $customer->user_agent ?? '' }} <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
