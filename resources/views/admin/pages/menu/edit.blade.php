@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><strong style="font-size:17px">{{ Helper::custom_where_am_i($names) }}</strong>
                        You are currently on the edit page for menu information.</h2>
                        <a href="{{ route('menu.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Return to Menus List
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12">
                            <form action="{{ route('menu.update',$menu->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $menu->id }}" name="menu_id">

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
                                    <div class="col-md-6">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="turkish">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Turkish Menu Name<span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ $menu->tr_name ?? old('tr_name') }}" name="tr_name">
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="english">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">English Menu Name<span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ $menu->en_name ?? old('en_name') }}" name="en_name">
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="russian">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Russian Menu Name<span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ $menu->ru_name ?? old('ru_name') }}" name="ru_name">
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="arabic">
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Arabic Menu Name<span
                                                            class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control"
                                                           value="{{ $menu->ar_name ?? old('ar_name') }}" name="ar_name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="control-label" for="room_type_id">Top Menu<span
                                                        class="required">*</span>
                                            </label>
                                            <select class="form-control" name="top_id">
                                                <option {{ Helper::custom_selected_option($menu->id,0) }} value="0">Top Menu</option>
                                                {{--                                            @forelse($menus as $top)--}}
                                                {{--                                                <option value="{{ $top->id ?? '' }}">{{ $top->textTrans('name') ?? ''}}</option>--}}
                                                {{--                                            @empty--}}
                                                {{--                                            @endforelse--}}
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label" for="room_type_id">Menu Theme<span
                                                        class="required">*</span>
                                            </label>
                                            <select class="form-control" name="template">
                                                <option {{ Helper::custom_selected_option($menu->template,"staticpage-template")  }}
                                                        value="staticpage-template">Fixed Page</option>
                                                <option {{ Helper::custom_selected_option($menu->template,"hotel-template")  }}
                                                        value="hotel-template">Hotel Template</option>
                                                <option {{ Helper::custom_selected_option($menu->template,"tour-template")  }}
                                                        value="tour-template">Tour Template</option>
                                                <option {{ Helper::custom_selected_option($menu->template,"contact-template")  }}
                                                        value="contact-template">Contact</option>
                                                <option {{ Helper::custom_selected_option($menu->template,"blog-template")  }}
                                                        value="blog-template">Blog</option>
                                                {{--                                            <option {{ LanguageHelper::custom_selected_option($menu->template,"blog-template")  }}--}}
                                                {{--                                                    value="blog-template">Blog</option>--}}
                                                {{--                                            <option {{ LanguageHelper::custom_selected_option($menu->template,"homepage-template")  }}--}}
                                                {{--                                                    value="homepage-template">Anasayfa</option>--}}
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label" for="slug">URL Configuration
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text"  value="{{ $menu->slug ?? '' }}" id="slug" name="slug" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="page_title">Page Title<span
                                                        class="required">*</span>
                                            </label>
                                            <input type="text" id="page_title" name="page_title"
                                                   class="form-control" value="{{ $menu->seo->page_title ?? old('page_title') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="seo_title">Seo Title<span
                                                        class="required">*</span>
                                            </label>
                                            <input type="text" id="seo_title" name="seo_title"
                                                   class="form-control" value="{{ $menu->seo->seo_title ?? old('seo_title') }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label" for="seo_keyword">Seo Keywords<span
                                                        class="required">*</span>
                                            </label>
                                            <input type="text" id="seo_keyword" name="seo_keyword"
                                                   class="form-control" value="{{ $menu->seo->seo_keyword ?? old('seo_keyword') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label" for="seo_description">
                                            Seo Description<span class="required">*</span>
                                            </label>
                                            <textarea class="form-control" rows="2"
                                                      name="seo_description">{{ $menu->seo->seo_description ?? old('seo_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
{{--                                    <div class="form-group col-md-3">--}}
{{--                                        <label class="control-label" for="name">Menu Ranking<span--}}
{{--                                                class="required">*</span>--}}
{{--                                        </label>--}}
{{--                                        <input type="text" class="form-control"--}}
{{--                                               value="{{ $menu->rank }}" name="rank">--}}
{{--                                    </div>--}}

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
