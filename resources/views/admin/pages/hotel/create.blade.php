@extends('admin.templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Yeni Bir Otel Oluştur<small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Genel Bilgiler</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                <form class="form-horizontal" method="POST" action="{{url('adminpanel/hotel')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="slugconvert">Otel Adı <span class="required">*</span>
                                                </label>
                                                <input type="text" id="slugconvert" value="{{ old('name') }}" name="name"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="slug">URL Yapılandırması<span class="required">*</span>
                                                </label>
                                                <input type="text" id="slug" value="{{ $hotel->slug ?? old('slug') }}" name="slug"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="hotel_description">Hotel Açıklama<span class="required">*</span>
                                                </label>
                                                <textarea id="hotel_description" class="form-control" rows="2" name="hotel_description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="cancel_description">İptal Açıklaması<span class="required">*</span>
                                                </label>
                                                <textarea id="cancel_description" class="form-control" rows="2" name="cancel_description"></textarea>
                                            </div>
{{--                                            <div class="form-group">--}}
{{--                                                <label class="control-label" for="hotel_type_id">Otel Tipi<span class="required">*</span>--}}
{{--                                                </label>--}}
{{--                                                <select multiple class="form-control" name="hotel_type_id[]" required>--}}
{{--                                                    <option disabled>Seçin</option>--}}
{{--                                                    @foreach($hotel_types as $type)--}}
{{--                                                        <option value="{{$type->id}}">{{$type->name}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
                                            <div class="form-group">
                                                <label class="control-label" for="phone">Otel Telefon <span class="required">*</span>
                                                </label>
                                                <input type="text" id="phone" name="phone"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="phone">Adres <span class="required">*</span>
                                                </label>
                                                <textarea class="form-control" rows="2" name="address"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="restaurant_distance">Otelin Yıldız Sayısı (Max 5)<span class="required">*</span>
                                                </label>
                                                <input type="number" id="start" maxlength="5"
                                                       name="star"
                                                       value="{{ old('start') }}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="commission_rate">Komisyon Oranı (% Yüzdelik)<span class="required">*</span>
                                                </label>
                                                <input type="text" id="commission_rate" name="commission_rate"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="country_id">Ülke<span class="required">*</span>
                                                </label>
                                                <select class="form-control" id="country_id" name="country_id">
                                                    <option disabled>Seçin</option>
                                                    @forelse($countries as $country)
                                                        <option {{ Helper::custom_selected_option($country->sortname ?? '',$hotel->country->sortname ?? '') }} value="{{$country->id}}">{{$country->name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group" id="city_div" style="display:none;">
                                                <label class="control-label" for="city_id">il<span class="required">*</span>
                                                </label>
                                                <select class="form-control" id="city_id" name="city_id">
                                                </select>
                                            </div>
                                            <div class="form-group" id="county_div" style="display:none;">
                                                <label class="control-label" for="county_id">ilçe<span class="required">*</span>
                                                </label>
                                                <select class="form-control" name="county_id" id="county_id">
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="airport_id">Hava Limanı<span class="required">*</span>
                                                </label>
                                                <select class="form-control" name="airport_id" required>
                                                    <option disabled>Seçin</option>
                                                    @foreach($airports as $airport)
                                                        <option value="{{$airport->id}}">{{$airport->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="email">Otel Mail <span class="required">*</span>
                                                </label>
                                                <input type="text" id="email" name="email"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="checkout_time">Checkout Time <span class="required">*</span>
                                                </label>
                                                <input type="text" id="checkout_time" name="checkout_time"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="min_day">En Az Gün <span class="required">*</span>
                                                </label>
                                                <input type="text" id="min_day" name="min_day"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="ops_day">Ops. Gün <span class="required">*</span>
                                                </label>
                                                <input type="text" id="ops_day" name="ops_day"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="airport_distance">Havaalanı Mesafesi<span class="required">*</span>
                                                </label>
                                                <input type="text" id="airport_distance" name="airport_distance"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="sea_distance">Deniz Mesafesi<span class="required">*</span>
                                                </label>
                                                <input type="text" id="sea_distance" name="sea_distance"  class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label" for="restaurant_distance">Restaurant Mesafesi<span class="required">*</span>
                                                </label>
                                                <input type="text" id="restaurant_distance" name="restaurant_distance"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="restaurant_distance">Otelin Kampanyası<span class="required">*</span>
                                                </label>
                                                <input type="text" id="campaign"
                                                       name="campaign"
                                                       value="{{ old('campaign') }}"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="hotel_board_type_id">Otel Pansiyon Tipi<span class="required">*</span>
                                                </label>
                                                <select class="form-control" name="hotel_board_type_id">
                                                    <option disabled>Seçin</option>
                                                    @forelse($hotel_board_types as $board_type)
                                                        <option value="{{$board_type->id}}"> {{ $board_type->name }} </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="currency_id">Para Birimi<span class="required">*</span>
                                                </label>
                                                <select class="form-control" name="currency_id">
                                                    <option disabled>Seçin</option>
                                                    @forelse($currencies as $currency)
                                                        <option value="{{$currency->id}}">{{$currency->name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="latitude">Enlem <span class="required">*</span>
                                                </label>
                                                <input type="text" id="latitude" name="latitude"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="longitude">Boylam <span class="required">*</span>
                                                </label>
                                                <input type="text" id="longitude" name="longitude"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="season_date">Sezon Tarihi <span class="required">*</span>
                                                </label>
                                                <input type="text" class="form-control date" id="season_date" name="season_date" autocomplete="false">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="authorized_full_name">Yetkili<span class="required">*</span>
                                                </label>
                                                <input type="text" id="authorized_full_name" name="authorized_full_name"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="authorized_phone">Yetkili Telefon <span class="required">*</span>
                                                </label>
                                                <input type="text" id="authorized_phone" name="authorized_phone"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="authorized_email">Yetkili Mail <span class="required">*</span>
                                                </label>
                                                <input type="text" id="authorized_email" name="authorized_email"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="shop_distance">Market Mesafesi<span class="required">*</span>
                                                </label>
                                                <input type="text" id="shop_distance" name="shop_distance"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="hospital_distance">Hastane Mesafesi<span class="required">*</span>
                                                </label>
                                                <input type="text" id="hospital_distance" name="hospital_distance"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="center_distance">Merkez Mesafesi<span class="required">*</span>
                                                </label>
                                                <input type="text" id="center_distance" name="center_distance"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="baby_age_limit">Bebek Yaş Sınırı<span class="required"> (Kontrat hesaplaması için gereklidir ve zorunlu alandır.) *</span>
                                                </label>
                                                <input type="text" id="baby_age_limit" value="{{ old('baby_age_limit') }}" name="baby_age_limit"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="child_age_limit">Çocuk Yaş Sınırı<span class="required"> (Kontrat hesaplaması için için gereklidir ve zorunlu alandır.) *</span>
                                                </label>
                                                <input type="text" id="child_age_limit" value="{{ old('child_age_limit') }}" name="child_age_limit"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="young_age_limit">Genç Yaş Sınırı<span class="required"> (Kontrat hesaplaması için için gereklidir ve zorunlu alandır.) *</span>
                                                </label>
                                                <input type="text" id="young_age_limit" value="{{ old('young_age_limit') }}" name="young_age_limit"  class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success">Kaydet</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/ckeditor/my_plugins/autogrow.min.js') }}"></script>
    <script>
        $(function () {
            var options = {
                uiColor: "#f4645f",
                language: "tr",
                extraPlugins: "autogrow",
                autoGrow_minHeight: 250,
                autoGrow_maxHeight: 600,
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
            CKEDITOR.replace("hotel_description", options);
            CKEDITOR.replace("cancel_description", options);
        });
    </script>
    <script src="{{ asset('js/slug.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $.ajax({
                url:'{{ url('/common/location/country/') }}/'+ 223,
                type:'GET',
                data:'',
                success : function (data) {
                    $("#city_div").css("display","block");
                    $("#city_id").attr("disabled", false).html("<option value=''>Seçin..</option>");
                    $.each(data, function(index, value){
                        $("#city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            })
        });

        $('#country_id').on('change', function () {
            $.ajax({
                url:'{{ url('/common/location/country/') }}/'+$(this).val(),
                type:'GET',
                data:'',
                success : function (data) {
                    $("#city_div").css("display","block");
                    $("#city_id").attr("disabled", false).html("<option value=''>Seçin..</option>");
                    $.each(data, function(index, value){
                        $("#city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            })
        });

        $('#city_id').on('change', function () {
            $.ajax({
                url:'{{ url('/common/location/city/') }}/'+$(this).val(),
                type:'GET',
                data:'',
                success : function (data) {
                    $("#county_div").css("display","block");
                    $("#county_id").attr("disabled", false).html("<option value=''>Seçin..</option>");
                    $.each(data, function(index, value){
                        $("#county_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                }
            })
        })

    </script>
@endsection
