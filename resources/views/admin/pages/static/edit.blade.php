@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sabit Sayfa Düzenle</h2>
                        <a href="{{ route('static_page.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Sabit Sayfalar Listesine Dön
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12">
                            <form action="{{ route('static_page.update',$static->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="control-label" for="menu_id">Menü Adı
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-control" name="menu_id">
                                        @forelse($menus as $menu)
                                            <option value="{{ $menu->id ?? '' }}">{{ $menu->tr_name ?? ''}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>

                                <!-- start accordion -->
                                <div class="accordion" id="accordion" role="tablist"
                                     aria-multiselectable="true">
                                    <div class="panel">
                                        <a class="panel-heading" role="tab" id="headingOne"
                                           data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                                           aria-controls="collapseOne">
                                            <h4 class="panel-title">TÜRKÇE</h4>
                                        </a>
                                        <div id="collapseOne" class="panel-collapse collapse in"
                                             role="tabpanel"
                                             aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="name">Türkçe Açıklama<span
                                                                class="required">*</span>
                                                    </label>
                                                    <textarea name="tr_description" id="editor_tr"
                                                              rows="5">{{ $static->tr_description ?? old('tr_description') }}</textarea>
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
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="name">İngilizce Açıklama<span
                                                                class="required">*</span>
                                                    </label>
                                                    <textarea name="en_description" id="editor_en"
                                                              rows="5">{{ $static->en_description ?? old('en_description') }}</textarea>
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
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="name">Rusça Açıklama<span
                                                                class="required">*</span>
                                                    </label>
                                                    <textarea name="ru_description" id="editor_ru"
                                                              rows="5">{{ $static->ru_description ?? old('ru_description') }}</textarea>
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
                                                <div class="form-group col-md-12">
                                                    <label class="control-label" for="name">Arapça Açıklama<span
                                                                class="required">*</span>
                                                    </label>
                                                    <textarea name="ar_description" id="editor_ar"
                                                              rows="5">{{ $static->ar_description ?? old('ar_description') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of accordion -->

                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Kaydet</button>
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
            }
            CKEDITOR.replace("editor_tr", options);
            CKEDITOR.replace("editor_en", options);
            CKEDITOR.replace("editor_ru", options);
            CKEDITOR.replace("editor_ar", options);
        });
    </script>
@endsection
