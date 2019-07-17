@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        Email Adresi : {{ $subscriber->email ?? '' }} <br>
                        IP Adresi : {{ $subscriber->ip_address ?? '' }} <br>
                        Tarayıcı Bilgileri : {{ $subscriber->user_agent ?? '' }} <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
