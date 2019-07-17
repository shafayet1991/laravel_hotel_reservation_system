<div class="container-fluid mt-5 pt-3 pb-3 first-special-container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-12 mt-1 mt-md- d-inline-block text-center">
                <h4 class="text-white text-center font-weight-bolder">Abone olun fırsatlardan yararlanın</h4>
            </div>
            <div class="col-md-6 col-12 mt-2 mt-md-0 d-inline-block">
                @csrf
                <input type="hidden" id="ip_addressValue"  value="{{ $_SERVER['REMOTE_ADDR'] }}" name="ip_address">
                <input type="hidden" id="user_agentValue"  value="{{ $_SERVER['HTTP_USER_AGENT'] }}" name="user_agent">
                <div class="input-group subscribe-input-group">
                    <input type="text" id="emailValue" name="email" class="form-control" placeholder="E-Mail adresiniz" />
                    <div class="input-group-prepend">
                        <button type="submit" class="input-group-text" id="newsletterSubmit">ABONE OL</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function () {
            $("#newsletterSubmit").on("click", function () {
                var ip_addressValue  = $("#ip_addressValue").val();
                var user_agentValue  = $("#user_agentValue").val();
                var emailValue  = $("#emailValue").val();
                var url = "{{ route('subscriber.save') }}";
                $.ajax({
                    type:"POST",
                    url:url,
                    data:{ ip_address:ip_addressValue,user_agent:user_agentValue,email:emailValue,_token:token},
                    success:function(data){
                        if(data.status == 200){
                            swal(data.message);
                            $("#emailValue").val("");
                        }
                    },
                    error:function(reject){
                        if(reject.status === 422){
                            var response = $.parseJSON(reject.responseText);
                            $.each(response.errors, function (key, val) {
                                swal("" + val);
                            });
                        }
                        if(reject.status === 404){
                            swal("Hata");
                        }
                    }
                });
            });
        });

    </script>
@endsection