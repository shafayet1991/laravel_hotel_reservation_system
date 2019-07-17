@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Otel Teması Oluştur</h2>
                        <a href="{{ route('hotel_theme.index') }}" class="btn btn-info pull-right">
                            <i class="fa fa-undo"></i> Otel Temaları Listesine Dön</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('hotel_theme.update',$theme->id) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $theme->id }}" name="theme_id">
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="slugconvert">Tema Adı<span class="required">*</span>
                                    </label>
                                    <input value="{{ $theme->name ?? '' }}" type="text" id="slugconvert" name="name" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="slug">URL Yapılandırması<span
                                                class="required">*</span>
                                    </label>
                                    <input value="{{ $theme->slug ?? '' }}" type="text" id="slug" name="slug" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <img width="200" src="{{ asset($theme->file) }}" class="image"> <br>
                                    <label class="control-label" for="photo">Tema Fotoğrafı
                                        <span class="required">*</span>
                                    </label>
                                    <input type="file" id="photo" name="photo">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection

@section('scripts')
   <script src="{{ asset('js/slug.js') }}"></script>
@endsection