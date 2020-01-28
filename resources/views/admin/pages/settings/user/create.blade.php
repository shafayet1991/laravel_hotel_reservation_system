@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create a New System User</h2>
                        <a href="{{ route('user_setting.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i>
                            Return to System Users List
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12">
                            <form action="{{ route('user_setting.store') }}"
                                  enctype="multipart/form-data" method="post">
                                @csrf

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Name and surname
                                            <span
                                                class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ old('name') }}" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="name">Email<span
                                                class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ old('email') }}" name="email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="name">
                                            Password<span
                                                class="required">*</span>
                                        </label>
                                        <input type="password" class="form-control"
                                               value="{{ old('password') }}" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="name">
                                            Confirm Password<span
                                                class="required">*</span>
                                        </label>
                                        <input type="password" class="form-control"
                                               value="{{ old('password_confirmation') }}" name="password_confirmation">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="name">
                                            Phone number<span
                                                class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ old('phone') }}" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">
                                            Rank<span
                                                    class="required">*</span>
                                        </label>
                                        <select class="form-control" name="role_id">
                                            @forelse($roles as $role)
                                                <option value="{{ $role->id ?? '' }}">{{ $role->name ?? '' }}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label" for="name">
                                            Photo<span class="required">*</span>
                                        </label>
                                        <input type="file" name="photo">
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
@endsection
@section('scripts')
    <script src="{{ asset('js/slug.js') }}"></script>
@endsection
