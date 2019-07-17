@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Yeni Bir Blog Yazarı Oluştur</h2>
                        <a href="{{ route('blog_author.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Blog Yazarları Listesine Dön
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <form action="{{ route('blog_author.store') }}"
                              enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label class="control-label" for="name">Yazar Adı Soyadı<span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" id="slugconvert" class="form-control"
                                           value="{{ old('name') }}" name="name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="slug">URL Yapılandırması
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" id="slug" value="{{ old('slug') }}" name="slug"
                                           class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="name">Yazar Fotoğrafı<span
                                                class="required">*</span>
                                    </label>
                                    <input type="file" name="photo">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="name">Yazar Ünvanı<span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control"
                                           value="{{ old('title') }}" name="title">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="name">Yazar Mail Adresi<span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control"
                                           value="{{ old('email') }}" name="email">
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Yazar Telefonu<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ old('phone') }}" name="phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="page_title">Sayfa Başlığı<span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" id="page_title" name="page_title"
                                           class="form-control" value="{{ old('page_title') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="seo_title">Seo Başlığı<span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" id="seo_title" name="seo_title"
                                           class="form-control" value="{{ old('seo_title') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label" for="seo_keyword">Seo Anahtar Sözcükler<span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" id="seo_keyword" name="seo_keyword"
                                           class="form-control" value="{{ old('seo_keyword') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label" for="seo_description">
                                        Seo Açıklaması<span class="required">*</span>
                                    </label>
                                    <textarea class="form-control" rows="2"
                                              name="seo_description">{{ old('seo_description') }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Kaydet</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/slug.js') }}"></script>
@endsection
