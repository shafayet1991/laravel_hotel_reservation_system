@extends('admin.templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <a href="{{route('arrivals.index')}}" class="btn btn-info btn-md"><i class="fa fa-chevron-left"></i> Back </a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>Are you sure?</p>

                    <form method="POST" action="{{ route('arrivals.destroy', ['id' => $country]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop