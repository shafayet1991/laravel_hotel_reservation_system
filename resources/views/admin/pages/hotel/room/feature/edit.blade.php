@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create Room Property</h2>
                        <a href="{{ route('room_feature.index') }}" class="btn btn-info pull-right">
                            <i class="fa fa-undo"></i> Return to Room Features List</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('room_feature.update',$feature->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="name">Room Feature Name
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" id="name" value="{{ $feature->name ?? old('name') }}" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
