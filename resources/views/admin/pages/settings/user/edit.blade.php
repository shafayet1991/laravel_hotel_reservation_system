@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sistem Kullanıcısını Düzenle</h2>
                        <a href="{{ route('user_setting.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Sistem Kullanıcıları Listesine Dön
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form action="{{ route('user_setting.update',$user->id) }}"
                              enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $user->id }}" name="user_id">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Adı Soyadı<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ $user->name ?? old('name') }}" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="name">Email<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ $user->email ?? old('email') }}" name="email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Telefon Numarası<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ $user->phone ?? old('phone') }}" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <img src="{{ asset($user->file) }}" width="200">
                                        <br>
                                        <label class="control-label" for="name">Fotoğraf<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="file" name="photo">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Rütbe<span
                                                    class="required">*</span>
                                        </label>
                                        <select class="form-control" name="role_id[]">
                                            @forelse($roles as $role)
                                                <option value="{{ $role->id ?? '' }}"
                                                   {{ in_array($role->id ?? 0,$role_ids) ? 'selected' : null }}     >{{ $role->name ?? '' }}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Kaydet</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            @endsection
            @section('scripts')
                <script src="{{ asset('js/slug.js') }}"></script>
@endsection
