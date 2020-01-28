@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ Helper::custom_where_am_i($names) }} 
You are editing the icon now</h2>
                        <a href="{{ route('payment_type.index') }}" class="btn btn-info btn-md pull-right">
                            <i class="fa fa-undo"></i> Geri Dön
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12">
                            <form action="{{ route('payment_type.update',$payment->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="icon">Payment method<span
                                                    class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control"
                                               value="{{ $payment->name ?? old('name') }}" name="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="method">Metod</label>
                                        <select id="method" name="method" class="form-control">
                                            <option {{ Helper::custom_selected_option($payment->method,'agency_payment') }} value="agency_payment">Payment Method in Agency</option>
                                            <option {{ Helper::custom_selected_option($payment->method,'transfer_payment') }} value="transfer_payment">Bank Transfer Payment Method</option>
                                            <option {{ Helper::custom_selected_option($payment->method,'card_payment') }} value="card_payment">Credit Card Payment Method</option>
                                            <option {{ Helper::custom_selected_option($payment->method,'hotel_payment') }} value="hotel_payment">Payment Method at the Hotel</option>
                                            <option {{ Helper::custom_selected_option($payment->method,'mail_payment') }} value="mail_payment">Mail Sending Payment Method</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Save</button>
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