@extends('client.layouts.main')
@section('meta')
    {!! SEOMeta::generate() !!}
    {{--    {!! OpenGraph::generate() !!}--}}
    {{--    {!! Twitter::generate() !!}--}}
@endsection
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            @forelse($randoms as $random)
                @if($loop->iteration < 3)
                    <div class="col-md-6 col-12 pr-1 mb-2">
                        <div class="card box-shadow-none">
                            <div class="card-body blog-card-primary p-0">
                                <div class="view overlay zoom" onclick='go("{{ route('page.blog.detail',$random->slug ?? '') }}")'>
                                    <img src="{{ asset($random->file ?? '') }}"
                                         class="img-fluid"
                                         alt="{{ $random->name ?? '' }}"/>
                                    <div class="mask waves-effect rgba-white-slight"></div>
                                    <div class="mask flex-center waves-effect waves-light"></div>
                                </div>
                                <label class="blog-card-primary-title">{{ $random->name ?? '' }}</label>
                                <label class="blog-card-primary-writed">{{ $random->author->name ?? '' }}
                                    - {{ Helper::custom_date_replace($random->created_at->toDateString() ?? '','-','.') }}</label>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-2 col-4 pl-1 pr-1">
                        <div class="card box-shadow-none">
                            <div class="card-body blog-card-secondary p-0">
                                <div class="view overlay zoom" onclick='go("{{ route('page.blog.detail',$random->slug ?? '') }}")'>
                                    <img src="{{ asset($random->file ?? '') }}"
                                         class="img-fluid"
                                         alt="{{ $random->name ?? '' }}"/>
                                    <div class="mask flex-center waves-effect waves-light"></div>
                                </div>
                                <label class="blog-card-primary-title">{{ $random->name ?? '' }}</label>
                                <label class="blog-card-primary-writed">{{ $random->author->name ?? '' }}
                                    <br> {{ Helper::custom_date_replace($random->created_at->toDateString() ?? '','-','.') }}
                                </label>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
            @endforelse
        </div>
    </div>
    <div class="container-fluid mt-5 mb-5 pt-5 pb-5"
         style="background-repeat: no-repeat; background-size: cover; background-position: center; background: url('https://wallpaperplay.com/walls/full/3/9/d/94391.jpg');">
        <div class="row">
            <div class="col-md-12 col-12 text-center">
                <h1 class="text-center text-white font-weight-bolder">Son Gönderiler</h1>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            @forelse($blogs as $blog)
                @if($loop->iteration % 2 != 0)
                    <div class="col-md-12 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row blog-card-third">
                                    <div class="col-md-4 col-12">
                                        <div class="view overlay">
                                            <img src="{{ asset($blog->file ?? '') }}"
                                                 class="img-fluid" alt="{{ $blog->name ?? '' }}">
                                            <a href="{{ route('page.blog.detail',$blog->slug ?? '') }}">
                                                <div class="mask waves-effect rgba-white-slight"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <h3 class="w-100 font-weight-bolder">{{ $blog->name ?? '' }}</h3>
                                        <label class="w-100 text-muted mt-2">
                                            {{ $blog->short_description ?? '' }}
                                        </label>
                                        <a href="{{ route('page.blog.detail',$blog->slug ?? '') }}"
                                           class="btn btn-primary" style="border-radius: 30px">Devamını Oku</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row blog-card-third">
                                    <div class="col-md-8 col-12">
                                        <h3 class="w-100 font-weight-bolder">{{ $blog->name ?? '' }}</h3>
                                        <label class="w-100 text-muted mt-2">{{ $blog->short_description ?? '' }}</label>
                                        <a href="{{ route('page.blog.detail',$blog->slug ?? '') }}"
                                           class="btn btn-secondary" style="border-radius: 30px">Devamını Oku</a>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="view overlay">
                                            <img src="{{ asset($blog->file ?? '') }}"
                                                 class="img-fluid" alt="Sample image with waves effect.">
                                            <a href="{{ route('page.blog.detail',$blog->slug ?? '') }}">
                                                <div class="mask waves-effect rgba-white-slight"></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
            @endforelse
        </div>
        @if(Helper::custom_check_empty($blogs) !== false && count($blogs))
            <div class="card">
                <div class="card-body">
                    <br>
                    {{ $blogs->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        function go(url){
            window.location = url;
        }
    </script>

@endsection