@component('mail::message')
    Hata Mesajı : {{ $data['message'] }} <br>
    Hata Satırı : {{ $data['line'] }} <br>
    Hata Verdirten Dosya: {{ $data['file'] }} <br>
    Hata Kodu: {{ $data['code'] }} <br>
    En kısa süre lütfen hatayı çözüme kavuşturunuz!<br>
@endcomponent