@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Rütbe Düzenle</h2>
                        <a href="{{ route('role.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Geri Dön
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12">
                            <form action="{{ route('role.update',$role->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="icon">Rütbe Adı<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ $role->name ?? old('name') }}" name="name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Yetkiler</label><br>
                                        @forelse($permissions as $permission)
                                            <label class="control-label" for="icon">
                                                <input type="checkbox" class="flat" {{ in_array($permission->id,$permission_ids) ? 'checked' : '' }}
                                                       value="{{ $permission->id ?? '' }}" name="permission_id[]">
                                                {{ $permission->name ?? '' }}
                                            </label>
                                        @empty
                                        @endforelse
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
            CKEDITOR.replace("description", options);
        });
    </script>
@endsection