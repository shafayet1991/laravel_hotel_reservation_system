@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-bars"></i> Tur Tür Tanımı
                            <small></small>
                        </h2>
                        <a href="{{ route('tour_type.index') }}" class="btn btn-info pull-right">
                            <i class="fa fa-undo"></i> Tur Türlerine Dön
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                                     aria-labelledby="home-tab">
                                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('tour_type.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Tur Tür Adı<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="text" id="name" name="name"

                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Tur Tür Resmi<span
                                                                class="required">*</span>
                                                    </label>
                                                    <input type="file" id="name" name="file">
                                                </div>
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
