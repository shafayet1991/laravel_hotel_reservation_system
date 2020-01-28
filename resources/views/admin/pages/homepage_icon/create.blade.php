@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create a New Home Icon</h2>
                        <a href="{{ route('homepage_icon.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Turn back
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12">
                            <form action="{{ route('homepage_icon.store') }}" method="post">
                                @csrf
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="icon">Icon<span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control"
                                           value="{{ old('icon') }}" name="icon">
{{--                                    <select name="icon" class="form-control" style="font-family: 'FontAwesome', 'Helvetica'">--}}
{{--                                        @forelse($fa_icons as $icon)--}}
{{--                                            <option value="{{ $icon->icon ?? '' }}">{!! $icon->font ?? ''  !!}  {{ $icon->name ?? '' }}</option>--}}
{{--                                        @empty--}}
{{--                                        @endforelse--}}
{{--                                    </select>--}}
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="title">Icon Title<span
                                                class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control"
                                           value="{{ old('title') }}" name="title">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="description">Explanation<span
                                                class="required">*</span>
                                    </label>
                                    <textarea name="description" id="description"
                                              rows="5">{{ old('description') }}</textarea>
                                </div>
                                <br>
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
            CKEDITOR.replace("description", options);
        });
    </script>
@endsection

