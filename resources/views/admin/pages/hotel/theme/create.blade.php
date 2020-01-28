@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Create Hotel Theme</h2>
                        <a href="{{ route('hotel_theme.index') }}" class="btn btn-info pull-right">
                            <i class="fa fa-undo"></i>
                            Return to Hotel Themes List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('hotel_theme.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="slugconvert">
                                        Theme Name
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" id="slugconvert" name="name" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="slug">
                                        URL Configuration
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" id="slug" name="slug" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="photo">Theme Photo

                                        <span class="required">*</span>
                                    </label>
                                    <input type="file" id="photo" name="photo">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection

@section('scripts')
   <script src="{{ asset('js/slug.js') }}"></script>
@endsection