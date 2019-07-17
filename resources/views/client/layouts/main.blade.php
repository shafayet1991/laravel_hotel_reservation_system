<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="base_url" content="{{ URL::to('/') }}">
    <meta name="google-site-verification" content="ap8sXtkEHhXdfyA_Hfz4iGZhaJgWmRk4iF3WCSA_Hnc" />
    @yield('meta')
    @include('client.layouts.style')
    @yield('styles')
</head>
<body>
@include('client.layouts.header')
@yield('content')
@include('client.layouts.footer')
@include('client.layouts.script')

<input type="hidden" id="banned_key_input" name="banned_key_ctrl_z" value=""/>
<input type="hidden" id="banned_key_input" name="banned_key_ctrl_x" value=""/>
<input type="hidden" id="banned_key_input" name="banned_key_ctrl_c" value=""/>
<input type="hidden" id="banned_key_input" name="banned_key_ctrl_v" value=""/>
<input type="hidden" id="banned_key_input" name="banned_key_ctrl_u" value=""/>

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
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5cf2370c267b2e5785306ee8/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129947166-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129947166-4');
</script>
<!--End of Tawk.to Script-->
@yield('scripts')
</body>
</html>
