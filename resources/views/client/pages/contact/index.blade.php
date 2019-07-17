@extends('client.layouts.main')
@section('meta')
    {!! SEOMeta::generate() !!}
    {{--    {!! OpenGraph::generate() !!}--}}
    {{--    {!! Twitter::generate() !!}--}}
@endsection
@section('content')

    <div class="container-fluid mt-5 pt-5 pb-5"
         style="background: url('https://www.nexusyazilim.com/wp-content/themes/seoengine/assets/img/banner.jpg');">
        <div class="row pt-5 pb-5">
            <div class="col-md-12 text-center">
                <h1 class="font-weight-bold text-white text-center">İletişim</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5 pt-3 pb-3 pl-4 pr-4">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 mb-md-0 mb-5 mt-3">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h5 class="text-muted font-weight-bolder">MEED TOUR SEYAHAT TURİZM ORG. VE TİC.
                                            LTD. ŞTİ <br> HACEGAN TUR</h5>
                                    </div>
                                </div>
                                <input type="hidden" id="ip_addressValue" value="{{ $_SERVER['REMOTE_ADDR'] }}"
                                       name="ip_address">
                                <input type="hidden" id="user_agentValue" value="{{ $_SERVER['HTTP_USER_AGENT'] }}"
                                       name="user_agent">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="name" name="name" class="form-control">
                                            <label for="name" class="">Adınız</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="emailValue" name="email" class="form-control">
                                            <label for="email" class="">E-posta Adresiniz</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <input type="text" id="subject" name="subject" class="form-control">
                                            <label for="subject" class="">Konu</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <textarea type="text" id="message" name="message" rows="2"
                                                      class="form-control md-textarea"></textarea>
                                            <label for="message">Mesajınız</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="btn fourth-special-button" id="newsletterSubmit">Gönder</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="status"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-5">
                                        <div id="map-container-google-1" class="z-depth-1-half map-container"
                                             style="height: 500px">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3201.9933466692955!2d31.76346321562969!3d36.62654678515437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14dcaf01f97993c3%3A0xfb1e4cccc5ac2ed6!2sAvsallar+Mahallesi%2C+Bah%C3%A7e+Sk.+No%3A22%2C+07410+Alanya%2FAntalya!5e0!3m2!1str!2str!4v1559546906494!5m2!1str!2str"
                                                    allowfullscreen
                                                    style="border:0" allowfullscreen height="100%"
                                                    width="100%"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <ul class="list-unstyled mb-0 mt-4">
                                    <li><i class="fas fa-map-marker-alt fa-2x first-text-color"></i>
                                        <h6 class="mt-2 font-weight-bolder">Adres</h6>
                                        <label class="text-muted">Avsallar Mh. Bahçe sk. No : 22 Alanya / ANTALYA /
                                            TÜRKİYE</label>
                                    </li>
                                    <hr/>
                                    <li><i class="fas fa-phone fa-2x first-text-color"></i>
                                        <h6 class="mt-2 font-weight-bolder">Şirket Numaralarımız</h6>
                                        <label class="text-muted"><a href="tel:02425171405"
                                                                     class="text-decoration-none">0 242 517 14 05</a> –
                                            <a href="tel:08504663987">0 850 466 39 87</a></label>
                                    </li>
                                    <hr/>
                                    <li><i class="fas fa-envelope fa-2x first-text-color"></i>
                                        <h6 class="mt-2 font-weight-bolder">Kurumsal</h6>
                                        <label class="text-muted">info@halalhotelcheck.com</label>
                                    </li>
                                    <div class="border-bottom mt-1 mb-3"></div>
                                    <li><i class="fas fa-envelope fa-2x first-text-color"></i>
                                        <h6 class="mt-2 font-weight-bolder">Satış Pazarlama</h6>
                                        <label class="text-muted">satis@halalhotelcheck.com</label>
                                    </li>
                                    <hr/>
                                    <li><i class="fas fa-envelope fa-2x first-text-color"></i>
                                        <h6 class="mt-2 font-weight-bolder">Yeni Otel Ekleme</h6>
                                        <label class="text-muted">oteldestek@halalhotelcheck.com</label>
                                    </li>
                                    <hr/>
                                    <li><i class="fas fa-envelope fa-2x first-text-color"></i>
                                        <h6 class="mt-2 font-weight-bolder">Muhasebe</h6>
                                        <label class="text-muted">muhasebe@halalhotelcheck.com</label>
                                    </li>
                                    <hr/>
                                    <li><i class="fas fa-envelope fa-2x first-text-color"></i>
                                        <h6 class="mt-2 font-weight-bolder">İnsan Kaynakları</h6>
                                        <label class="text-muted">ik@halalhotelcheck.com</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $("#newsletterSubmit").on("click", function () {
                var ip_addressValue = $("#ip_addressValue").val();
                var user_agentValue = $("#user_agentValue").val();
                var email = $("#emailValue").val();
                var name = $("#name").val();
                var subject = $("#subject").val();
                var message = $("#message").val();
                var url = "{{ route('page.contact.save') }}";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {email: email,ip_address: ip_addressValue, user_agent: user_agentValue,name:name,subject:subject,message:message, _token: token},
                    success: function (data) {
                        if (data.status == 200) {
                            swal(data.message);
                            $("#name").val("");
                            $("#emailValue").val("");
                            $("#subject").val("");
                            $("#message").val("");
                        }
                    },
                    error: function (reject) {
                        if (reject.status === 422) {
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function (key, val) {
                                swal("" + val);
                            });
                        }
                        if (reject.status === 404) {
                            swal("Hata");
                        }
                    }
                });
            });
        });

    </script>
@endsection