@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Tur Tanımı
                            <small></small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab"
                                       aria-expanded="false">Genel Bilgiler</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                                     aria-labelledby="home-tab">
                                    <form class="form-horizontal" method="POST" action="{{ route('tour.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Tur Adı <span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="name" name="name"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="hotel_description">Tur
                                                        Açıklama<span class="required">*</span>
                                                    </label>
                                                    <textarea id="editor1" class="form-control" rows="2"
                                                              name="description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="hotel_description">Tur
                                                        Genel Şartları<span class="required">*</span>
                                                    </label>
                                                    <textarea id="editor2" class="form-control" rows="2"
                                                              name="general_condition"></textarea>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="tour_type">Tur Tür<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="type_id" id="tour_type">
                                                        @forelse($types as $type)
                                                            <option value="{{$type->id ?? ''}}">{{$type->name ?? ''}}</option>
                                                        @empty
                                                            <option value="0">Henüz Tur Türü Eklemediniz</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="travel_type">Seyahat Tipi<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="travel_type" id="travel_type">
                                                        <option value="1">Gemi ile gidiş dönüş</option>
                                                        <option value="2">Otobüs ile gidiş dönüş</option>
                                                        <option value="3">Otobüs ile uçak ile dönüş</option>
                                                        <option value="4">Tekne ile gidiş dönüş</option>
                                                        <option value="5">Uçak ile gidiş otobüs ile dönüş</option>
                                                        <option value="6">Uçak ile gidiş uçak ile dönüş</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="departure_city_id">Kalkış İli
                                                        <span class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="departure_city_id"
                                                            id="departure_city_id">
                                                        @forelse($cities as $city)
                                                            <option value="{{ $city->id ?? '' }}">{{ $city->name ?? '' }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="return_city_id">Dönüş İli<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="return_city_id"
                                                            id="return_city_id">
                                                        @forelse($cities as $city)
                                                            <option value="{{ $city->id ?? '' }}">{{ $city->name ?? '' }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="number_of_days">Gün Sayısı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="number" id="number_of_days" name="number_of_days"

                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="places_to_visit">
                                                        Gezilecek Yerler
                                                        <span class="required">*</span>
                                                    </label>
                                                    <textarea id="places_to_visit" rows="2" class="form-control"
                                                              rows="2"
                                                              name="places_to_visit"></textarea>
                                                    <small>Lütfen, virgül ile ayırınız</small>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="editor3">
                                                        Tur Programları<span class="required">*</span>
                                                    </label>
                                                    <textarea id="editor3" class="form-control" rows="2"
                                                              name="program"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="free_child_age">Ücretsiz Çocuk
                                                        Yaşı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="number" id="free_child_age" name="free_child_age"

                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="maximum_child_age">Maximum Çocuk
                                                        Yaşı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="number" id="maximum_child_age" name="maximum_child_age"

                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="period">Dönem<span
                                                                class="required">*</span>
                                                    </label>
                                                    <select class="form-control" name="period" id="period">
                                                        <option value="06-2019">06-2019</option>
                                                        <option value="07-2019">07-2019</option>
                                                        <option value="08-2019">08-2019</option>
                                                        <option value="09-2019">09-2019</option>
                                                        <option value="10-2019">10-2019</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="sales_start_date">Satış Baslangic
                                                        Tarihi <span class="required"></span>
                                                    </label>
                                                    <input type="text" class="form-control date" id="sales_start_date"
                                                           name="sales_start_date" value="" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="sales_end_date">Satış Bitiş Tarihi
                                                        <span class="required"></span>
                                                    </label>
                                                    <input type="text" class="form-control date" id="sales_end_date"
                                                           name="sales_end_date" value="" autocomplete="off">
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
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
        $('#city_id').on('change', function () {
            $.ajax({
                url: '{{url('/city')}}/' + $(this).val(),
                type: 'GET',
                data: '',
                success: function (data) {
                    $("#county_id").attr("disabled", false).html("<option value=''>Seçin..</option>");
                    $.each(data, function (index, value) {
                        $("#county_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            })
        })
    </script>
@endsection
