@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        Customer name : {{ $customer->name ?? '' }} <br>
                        Customer Email : {{ $customer->email ?? '' }} <br>
                        Topic : {{ $customer->subject ?? '' }} <br>
                        Message : {{ $customer->message ?? '' }} <br>
                        IP Address : {{ $customer->ip_address ?? '' }} <br>
                        User's Browser Information : {{ $customer->user_agent ?? '' }} <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
