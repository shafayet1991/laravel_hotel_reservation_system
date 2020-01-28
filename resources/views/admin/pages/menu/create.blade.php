@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create a New Menu</h2>
                        <a href="{{ route('menu.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Return to Menus List
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12">
                            <form action="{{ route('menu.store') }}" method="post">
                                @csrf

                                <div class="col-md-4">
                                    <div class="col-md-4">
                                        <ul class="nav nav-tabs tabs-left">
                                            <li class="active"><a href="#turkish"
                                                                  data-toggle="tab">TURKISH</a>
                                            </li>
                                            <li><a href="#english" data-toggle="tab">ENGLISH</a>
                                            </li>
                                            <li><a href="#russian" data-toggle="tab">RUSSIAN</a>
                                            </li>
                                            <li><a href="#arabic" data-toggle="tab">ARABIC</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="turkish">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Turkish Menu Name<span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ old('tr_name') }}" name="tr_name">
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="english">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">English Menu Name<span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ old('en_name') }}" name="en_name">
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="russian">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Russian Menu Name<span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ old('ru_name') }}" name="ru_name">
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="arabic">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Arabic Menu Name<span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ old('ar_name') }}" name="ar_name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="control-label" for="room_type_id">
Top Menu<span
                                                        class="required">*</span>
                                            </label>
                                            <select class="form-control" name="top_id">
                                                <option value="0">New Top Menu</option>
                                                {{--                                            @forelse($menus as $menu)--}}
                                                {{--                                                <option--}}
                                                {{--                                                    value="{{ $menu->id ?? '' }}">{{ $menu->textTrans('name') ?? '' }}</option>--}}
                                                {{--                                            @empty--}}
                                                {{--                                            @endforelse--}}
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Menu Theme<span
                                                        class="required">*</span>
                                            </label>
                                            <select class="form-control" name="template">
                                                <option value="staticpage-template">Fixed Page</option>
                                                <option value="hotel-template">Hotel Template</option>
                                                <option value="tour-template">Tour Template</option>
                                                <option value="contact-template">Contact</option>
                                                <option value="blog-template">Blog</option>
                                                {{--                                            <option value="event-template">Etkinlikler</option>--}}
                                                {{--                                            <option value="blog-template">Blog</option>--}}
                                                {{--                                            <option value="homepage-template">Anasayfa</option>--}}
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="slug">URL Configuration
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" id="slug" name="slug" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="page_title">Page Title<span
                                                        class="required">*</span>
                                            </label>
                                            <input type="text" id="page_title" name="page_title"
                                                   class="form-control" value="{{ old('page_title') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="seo_title">Seo Title<span
                                                        class="required">*</span>
                                            </label>
                                            <input type="text" id="seo_title" name="seo_title"
                                                   class="form-control" value="{{ old('seo_title') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="seo_keyword">Seo Keywords<span
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
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
