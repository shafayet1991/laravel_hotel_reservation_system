{{--    <div class="container-fluid mt-5 mb-5 pt-5 pb-5"--}}
{{--         style="background-repeat: no-repeat; background-size: cover; background-position: center; background: url('https://wallpaperplay.com/walls/full/6/7/8/94394.jpg');">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12 col-12 text-center">--}}
{{--                <h1 class="text-center text-white font-weight-bolder">Türkiyeyi Bizimle Keşfedin</h1>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="container mt-5 mb-5">--}}
{{--        <div class="row">--}}
{{--            @forelse($blogs->take(3) as $blog)--}}
{{--                <div class="col-md-4 col-12 mb-3">--}}
{{--                    <div class="card blog-card-fourth">--}}
{{--                        <img class="card-img-top"--}}
{{--                             src="{{ $blog->file ?? '' }}"--}}
{{--                             alt="Card image cap">--}}
{{--                        <div class="card-body text-center">--}}
{{--                            <label class="text-muted font-small mb-2"><i class="fa fa-user"></i> {{ $blog->author->name ?? '' }}/--}}
{{--                                {{ LanguageHelper::custom_date_replace($blog->created_at->toDateString() ?? '','-','.') }}</label>--}}
{{--                            <h4 class="card-title"><a>{{ $blog->name ?? '' }}</a></h4>--}}
{{--                            <p class="card-text">{{ $blog->short_description ?? '' }}</p>--}}
{{--                            <a href="{{ route('page.blog.detail',$blog->slug ?? '') }}" class="btn btn-pink btn-rounded btn-md" style="border-radius: 20px">Devamını Oku</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @empty--}}
{{--            @endforelse--}}
{{--        </div>--}}
{{--    </div>--}}