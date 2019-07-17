@extends('client.layouts.main')
@section('meta')
    {!! SEOMeta::generate() !!}
    {{--    {!! OpenGraph::generate() !!}--}}
    {{--    {!! Twitter::generate() !!}--}}
@endsection
@section('content')
    <div class="container mt-5 mb-5 pt-3 pb-3 pl-4 pr-4">
        <div class="row">
            <div class="card">
                <div class="card-body font-weight-normal">
                    @if(Helper::custom_check_empty($static) !== false)
                        {!! $static->textTrans('description') ?? '' !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection