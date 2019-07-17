@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Yeni Bir Sistem Kullanıcısı Oluştur</h2>
                        <a href="{{ route('user_setting.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Sistem Kullanıcıları Listesine Dön
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12">
                            <form action="{{ route('user_setting.store') }}"
                                  enctype="multipart/form-data" method="post">
                                @csrf

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Adı Soyadı<span
                                                class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ old('name') }}" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="name">Email<span
                                                class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ old('email') }}" name="email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Şifre<span
                                                class="required">*</span>
                                        </label>
                                        <input type="password" class="form-control"
                                               value="{{ old('password') }}" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="name">Şifreyi Onayla<span
                                                class="required">*</span>
                                        </label>
                                        <input type="password" class="form-control"
                                               value="{{ old('password_confirmation') }}" name="password_confirmation">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Telefon Numarası<span
                                                class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ old('phone') }}" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Rütbe<span
                                                    class="required">*</span>
                                        </label>
                                        <select class="form-control" name="role_id">
                                            @forelse($roles as $role)
                                                <option value="{{ $role->id ?? '' }}">{{ $role->name ?? '' }}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Fotoğraf<span class="required">*</span>
                                        </label>
                                        <input type="file" name="photo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Kaydet</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/slug.js') }}"></script>
@endsection
