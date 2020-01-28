@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create a New Blog</h2>
                        <a href="{{ route('blog.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i>
                            Return to Blog List
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12">
                            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="slugconvert">
                                            Blog Name <span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="slugconvert" name="name"
                                               class="form-control" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="slug">URL Configuration<span class="required">*</span>
                                        </label>
                                        <input type="text" id="slug" value="{{ old('slug') }}" name="slug"  class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label">
                                            Blog Image<span class="required">*</span>
                                        </label>
                                        <input type="file" name="photo">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label class="control-label">
                                            Blog Writer<span
                                                    class="required">*</span>
                                        </label>
                                        <select class="form-control" name="author_id">
                                            @forelse($authors as $author)
                                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="control-label">
                                            Blog Categories<span
                                                    class="required">*</span>
                                        </label>
                                        <select class="select4" multiple="multiple" name="blog_category_id[]">
                                            @forelse($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="control-label">
                                            Blog Tags<span
                                                    class="required">*</span>
                                        </label>
                                        <select class="select4" multiple="multiple" name="blog_tag_id[]">
                                            @forelse($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label" for="short_description">
                                            Short Description<span class="required"> (
It is only shown on the blog listing page. Try to summarize in a few sentences.)</span>
                                        </label>
                                        <textarea class="form-control" rows="2"
                                                  name="short_description">{{ old('short_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label" for="description">
                                            Content<span class="required">*</span>
                                        </label>
                                        <textarea class="form-control" id="description" rows="2"
                                                  name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="page_title">
                                            Page Title<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="page_title" name="page_title"
                                               class="form-control" value="{{ old('page_title') }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="seo_title">
                                            Seo Title<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="seo_title" name="seo_title"
                                               class="form-control" value="{{ old('seo_title') }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label" for="seo_keyword">
                                            Seo Keywords<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" id="seo_keyword" name="seo_keyword"
                                               class="form-control" value="{{ old('seo_keyword') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label" for="seo_description">

                                            Seo Description<span class="required">*</span>
                                        </label>
                                        <textarea class="form-control" rows="2"
                                                  name="seo_description">{{ old('seo_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary">Save</button>
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