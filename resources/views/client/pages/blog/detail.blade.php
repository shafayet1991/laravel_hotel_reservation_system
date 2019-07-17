@extends('client.layouts.main')
@section('meta')
    {!! SEOMeta::generate() !!}
    {{--    {!! OpenGraph::generate() !!}--}}
    {{--    {!! Twitter::generate() !!}--}}
@endsection
@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-body p-0 blog-view-image">
                        <div class="view overlay">
                            <img src="{{ asset($blog->file ?? '' ) }}" class="img-fluid" alt="{{ $blog->name ?? '' }}"/>
                            <a>
                                <div class="mask waves-effect rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card blog-view-image-card">
                            <div class="card-body">
                                <div class="w-100 mb-2">
                                    @forelse($blog->categories as $category)
                                        <div class="badge first-special-badge text-wrap mr-2" style="width: 6rem;">
                                            {{ $category->name ?? '' }}
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <h3 class="text-muted font-weight-bolder">{{ $blog->name ?? '' }}</h3>
                                <div class="w-100 mt-2">
                                    <label class="text-muted d-block d-md-inline-block mr-2"><i class="fa fa-user"></i> {{ $blog->author->name ?? '' }}</label>
                                    <label class="text-muted d-block d-md-inline-block mr-2"><i class="fa fa-calendar"></i> {{ Helper::custom_date_replace($blog->created_at->toDateString() ?? '','-','.') }}</label>
{{--                                    <label class="text-muted d-block d-md-inline-block mr-2"><i class="fa fa-eye"></i> 342</label>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5 pt-2">
        <div class="row mt-5">
            <div class="col-md-9 col-12">
                <div class="w-100">
                    <a class="btn btn-fb mr-2">
                        <i class="fab fa-facebook"></i> &nbsp; Facebook
                    </a>
                    <a class="btn btn-tw">
                        <i class="fab fa-twitter"></i> &nbsp; Twitter
                    </a>
                </div>
                <div class="w-100 mt-2 pt-1">
                    {!! $blog->description ?? '' !!}
                </div>

                @if(Helper::custom_check_empty($interests) !== false && count($interests) > 0)
                    <div class="w-100">
                        <div class="row mt-2 mb-2">
                            <div class="col-md-12">
                                <h5 class="text-info w-100 border-bottom pb-2">Diğer İçerikler</h5>
                            </div>
                        </div>
                        <div class="row">
                            @forelse($interests as $interest)
                                <div class="col-md-4 col-12 mb-3">
                                    <div class="card blog-card-fifth">
                                        <img class="card-img-top" src="{{ asset($interest->file ?? '') }}" alt="{{ $interest->name ?? '' }}">
                                        <div class="card-body text-center">
                                            <label class="text-muted font-small mb-2"><i class="fa fa-user"></i> {{ $interest->author->name ?? '' }}/ 03.06.2019</label>
                                            <h5 class="card-title"><a>{{ $interest->name ?? '' }}</a></h5>
                                            <a href="{{ route('page.blog.detail',$interest->slug ?? '') }}" class="btn btn-danger btn-rounded btn-md" style="border-radius: 20px">Devamını Oku</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-3 col-12">
                <div class="row">
                    @forelse($random_sidebars as $sidebar)
                        <div class="col-md-12 col-12 mb-3">
                            <div class="card box-shadow-none">
                                <div class="card-body blog-card-secondary p-0">
                                    <div class="view overlay zoom">
                                        <img src="{{ asset($sidebar->file ?? '') }}" class="img-fluid" alt="{{ $sidebar->name ?? '' }}"/>
                                        <div class="mask flex-center waves-effect waves-light"></div>
                                    </div>
                                    <label class="blog-card-primary-title">{{ $sidebar->name ?? '' }}</label>
                                    <label class="blog-card-primary-writed">{{ $sidebar->author->name ?? '' }} - {{ Helper::custom_date_replace($blog->created_at->toDateString() ?? '','-','.') }}</label>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
    </div>

@endsection