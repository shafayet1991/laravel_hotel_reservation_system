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
<body class="not-found-page-background">

    <div id="particles-js"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 text-center">
                <div class="not-found-page-box">
                    <img src="{{ asset('images/500.png') }}" class="mt-3 mb-3" height="300px" width="450px"/>
                    <br><h1 class="text-white font-weight-bolder">Şu anda sunucularımızı güncelliyoruz. Lütfen daha sonra tekrar deneyiniz.</h1>
                </div>
            </div>
        </div>
    </div>

@include('client.layouts.script')
@yield('scripts')

</body>
</html>




