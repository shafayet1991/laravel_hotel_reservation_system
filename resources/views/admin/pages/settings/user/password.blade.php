@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>
                            Change User Password</h2>
                        <a href="{{ route('user_setting.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Return to System Users List
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12">
                            <form action="{{ route('user_setting.password',$user->id) }}" method="post">
                                @csrf
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="name">
                                            Old password<span
                                                class="required">*</span>
                                        </label>
                                        <input type="password" class="form-control"
                                               value="{{ old('current_password') }}" name="current_password">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="name">
                                            new password<span
                                                class="required">*</span>
                                        </label>
                                        <input type="password" class="form-control"
                                               value="{{ old('password') }}" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="name">
                                            Confirm New Password<span
                                                class="required">*</span>
                                        </label>
                                        <input type="password" class="form-control"
                                               value="{{ old('password_confirmation') }}" name="password_confirmation">
                                    </div>

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
            @endsection
            @section('scripts')
                <script src="{{ asset('js/slug.js') }}"></script>
@endsection
