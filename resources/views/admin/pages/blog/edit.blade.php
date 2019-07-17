@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Blog Düzenle</h2>
                        <a href="{{ route('blog.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Blog Listesine Dön
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12">
                            <form action="{{ route('blog.update',$blog->id ?? 0) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $blog->id ?? 0 }}" name="blog_id">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="slugconvert">Blog Adı <span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="slugconvert" name="name"
                                               class="form-control" value="{{ $blog->name ?? old('name') }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="slug">URL Yapılandırması<span class="required">*</span>
                                        </label>
                                        <input type="text" id="slug" value="{{ $blog->slug ?? old('slug') }}" name="slug"  class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        @if(Helper::custom_check_empty($blog->image->name ?? '') !== false)
                                            <img src="{{ asset($blog->file ?? '') }}" width="100">
                                        @endif
                                            <br>
                                        <label class="control-label">Blog Resmi<span class="required">*</span>
                                        </label>
                                        <input type="file" name="photo">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label class="control-label">Blog Yazarı<span
                                                    class="required">*</span>
                                        </label>
                                        <select class="form-control" name="author_id">
                                            @forelse($authors as $author)
                                                <option {{ Helper::custom_selected_option($author->id ?? '',$blog->author_id ?? '') }}
                                                        value="{{ $author->id }}">{{ $author->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="control-label">Blog Kategorileri<span
                                                    class="required">*</span>
                                        </label>
                                        <select class="select4" multiple="multiple" name="blog_category_id[]">
                                            @forelse($categories as $category)
                                                <option {{ in_array($category->id ?? '',$blog_category_ids) ? 'selected' : null }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="control-label">Blog Etiketleri<span
                                                    class="required">*</span>
                                        </label>
                                        <select class="select4" multiple="multiple" name="blog_tag_id[]">
                                            @forelse($tags as $tag)
                                                <option {{ in_array($tag->id ?? '',$blog_tag_ids) ? 'selected' : null }}
                                                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label" for="short_description">
                                            Kısa Açıklama<span class="required"> (Sadece blog listeleme sayfasında gösterilir. Birkaç cümlede özetlemeye çalışınız.)</span>
                                        </label>
                                        <textarea class="form-control" rows="2"
                                                  name="short_description">{{ $blog->short_description ?? old('short_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label" for="description">
                                            İçerik<span class="required">*</span>
                                        </label>
                                        <textarea class="form-control" id="description" rows="2"
                                                  name="description">{{ $blog->description ?? old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="page_title">Sayfa Başlığı<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="page_title" name="page_title"
                                               class="form-control" value="{{ $blog->seo->page_title ?? old('page_title') }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="seo_title">Seo Başlığı<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="seo_title" name="seo_title"
                                               class="form-control" value="{{ $blog->seo->seo_title ?? old('seo_title') }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="seo_keyword">Seo Anahtar Sözcükler<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="seo_keyword" name="seo_keyword"
                                               class="form-control" value="{{ $blog->seo->seo_keyword ?? old('seo_keyword') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label" for="seo_description">
                                            Seo Açıklaması<span class="required">*</span>
                                        </label>
                                        <textarea class="form-control" rows="2"
                                                  name="seo_description">{{ $blog->seo->seo_description ?? old('seo_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
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
    <script>
        $(document).ready(function () {
            $(".select4").select2({
                width: '100%',
            });
        });
    </script>
    <script src="{{ asset('js/slug.js') }}"></script>
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