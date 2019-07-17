@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Yeni Bir Sosyal Medya Hesabı Oluştur</h2>
                        <a href="{{ route('social_media_setting.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Sosyal Medya Hesapları Listesine Dön
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12">
                            <form action="{{ route('social_media_setting.update',$social->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="name">Sosyal Medya Adı<span
                                            class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control"
                                           value="{{ $social->name ?? '' }}" name="name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="url">URL Bilgisi<span
                                            class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control"
                                           value="{{ $social->url ?? '' }}" name="url">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="icon">İkonu<span
                                            class="required"> (https://fontawesome.com/ Adresinden daha fazla ikon bulabilirsiniz. Örn fa fa-facebook)</span>
                                    </label>
                                    <input type="text" class="form-control"
                                           value="{{ $social->icon ?? '' }}" name="icon">
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Kaydet</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
@endsection

