@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            General Settings</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12">
                            <form action="{{ route('admin.pages.settings.general.save') }}"
                                  enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" value="{{ $general->id ?? '' }}" name="id">

                                <div class="form-group">
                                    <label class="control-label" for="hotel_description">
                                        Contract Details in the Reservation Area<span class="required">*</span>
                                    </label>
                                    <textarea id="hotel_description" class="form-control" rows="2" name="contract_detail">{{ $general->contract_detail ?? old('contract_detail') }}</textarea>
                                </div>
                                <br>

                                <!-- start accordion -->
                                <div class="accordion" id="accordion" role="tablist"
                                     aria-multiselectable="true">
                                    <div class="panel">
                                        <a class="panel-heading" role="tab" id="headingOne"
                                           data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                           aria-controls="collapseOne">
                                            <h4 class="panel-title">TURKISH</h4>
                                        </a>
                                        <div id="collapseOne" class="panel-collapse collapse in"
                                             role="tabpanel"
                                             aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="form-group col-md-8">
                                                    <label class="control-label" for="name">Turkish Short Description<span
                                                            class="required">*</span>
                                                    </label>
                                                    <textarea name="tr_description" rows="3"
                                                              class="form-control">{{ $general->tr_description ?? old('tr_description') }}</textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="name">
                                                        Turkish Page Title First Name<span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ $general->tr_title ?? old('tr_title') }}"
                                                           name="tr_title">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <a class="panel-heading collapsed" role="tab" id="headingTwo"
                                           data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseTwo"
                                           aria-expanded="false"
                                           aria-controls="collapseTwo">
                                            <h4 class="panel-title">ENGLISH</h4>
                                        </a>
                                        <div id="collapseTwo" class="panel-collapse collapse"
                                             role="tabpanel"
                                             aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="form-group col-md-8">
                                                    <label class="control-label" for="name">
                                                        English Short Description<span
                                                            class="required">*</span>
                                                    </label>
                                                    <textarea name="en_description" rows="3"
                                                              class="form-control">{{ $general->en_description ?? old('en_description') }}</textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="name">
                                                        English Page Title First Name
                                                        <span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ $general->en_title ?? old('en_title') }}"
                                                           name="en_title">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <a class="panel-heading collapsed" role="tab" id="headingThree"
                                           data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseThree"
                                           aria-expanded="false"
                                           aria-controls="collapseThree">
                                            <h4 class="panel-title">RUSSIAN</h4>
                                        </a>
                                        <div id="collapseThree" class="panel-collapse collapse"
                                             role="tabpanel"
                                             aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <div class="form-group col-md-8">
                                                    <label class="control-label" for="name">Russian Short Description<span
                                                            class="required">*</span>
                                                    </label>
                                                    <textarea name="ru_description" rows="3"
                                                              class="form-control">{{ $general->ru_description ?? old('ru_description') }}</textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="name">Russian Page Title Name<span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ $general->ru_title ?? old('ru_title') }}"
                                                           name="ru_title">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <a class="panel-heading collapsed" role="tab" id="headingFour"
                                           data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseFour"
                                           aria-expanded="false"
                                           aria-controls="collapseTwo">
                                            <h4 class="panel-title">ARABIC</h4>
                                        </a>
                                        <div id="collapseFour" class="panel-collapse collapse"
                                             role="tabpanel"
                                             aria-labelledby="headingFour">
                                            <div class="panel-body">
                                                <div class="form-group col-md-8">
                                                    <label class="control-label" for="name">Arabic Short Description<span
                                                            class="required">*</span>
                                                    </label>
                                                    <textarea name="ar_description" rows="3"
                                                              class="form-control">{{  $general->ar_description ?? old('ar_description') }}</textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label" for="name">
                                                        Arabic Page Title Name<span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ $general->ar_title ?? old('ar_title') }}"
                                                           name="ar_title">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of accordion -->
                                <div class="col-md-12">
                                    <div class="form-group col-md-2">
                                        @if(Helper::custom_check_empty($general) !== false)
                                            <img src="{{ asset($general->file) }}" width="100">
                                        @endif

                                        <label class="control-label" for="name">Logo
                                            <span class="required">*</span>
                                        </label>
                                        <input type="file" name="logo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
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
            CKEDITOR.replace("contract_detail", options);
        });
    </script>
@endsection