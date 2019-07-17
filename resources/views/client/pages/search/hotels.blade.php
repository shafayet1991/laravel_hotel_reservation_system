@forelse($hotels as $hotel)
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-body pl-0 pt-0 pb-0 pr-0">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <a style="color: #000000;" href="{{ route('client.slug',$hotel->slug ?? '') }}">
                            <div class="view overlay zoom w-100">
                                <img src="{{asset('hotels/images')}}/{{$hotel->cover ?? ''}}"
                                     class=" first-special-img w-100" alt="">
                                <div class="mask flex-center waves-effect waves-light w-100">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 pt-2 pl-4 pr-4 pl-md-0 pr-md-0">
                        <a style="color: #000000;" href="{{ route('client.slug',$hotel->slug ?? '') }}"><h5
                                    class="font-weight-bolder mt-2 ml-3 ml-md-0">{{$hotel->name ?? ''}} <i
                                        class="fa fa-check-circle second-text-color"></i></h5></a>
                        <label class="text-muted mt-2 font-small ml-3 ml-md-0"><i
                                    class="fa fa-map-marker-alt"></i> {{$hotel->city?? '' ? $hotel->city->name : ""}}
                            / {{ $hotel->county ?? '' ? $hotel->county->name : ""}}, {{ $hotel->address ?? '' }}</label>
                        @if (count($hotel->themes) !== 0)
                            <label class="text-muted mt-2 font-small d-none d-md-block"><i class="fa fa-scroll"></i>
                                @foreach($hotel->themes as $index => $theme)
                                    @if ($index < 2)
                                        {{$theme->name}}
                                        @if ($index === 0)
                                            -
                                        @endif
                                    @endif
                                @endforeach
                            </label>
                        @endif
                        <div class="d-none d-md-block">
                            @foreach($hotel->features as $ind => $feature)
                                @if ($ind < 3)
                                    <span class="mt-2 text-muted font-small d-none d-md-inline-block"><i
                                                class="fa fa-check-circle"></i> {{$feature->name ?? ''}}</span> &nbsp;
                                @endif
                            @endforeach
                        </div>
                        <div class="card third-special-card col-md-12 mt-2 mt-md-3 mb-0 mb-md-3">
                            <div class="card-body col-auto p-1 font-small font-weight-bolder">
                                {{ $hotel->campaign ?? '' }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="text-center mt-3 mt-md-5 col-12">
                            <h5 class="first-text-color font-weight-bold d-inline-block">%
                                {{ $hotel->discount }}
                            </h5>
                            <label class="font-small d-inline-block text-body">'ye varan indirim</label>
                        </div>
                        <div class="text-center col-12">
                            <label class="text-muted mb-0" style="text-decoration: line-through;">
                                {{round(( $hotel->min_price * (100 + $hotel->discount)) / 100)}}
                                TL</label>
                            <h4 class="mt-0 first-text-color font-weight-bold">
                                {{ Helper::custom_money($hotel->min_price) }}
                                <span class="font-small">{{ session('localize.currency') ?? 'TL' }}</span></h4>
                        </div>
                        <div class="text-center col-md-12 col-12 mb-3 mb-md-0">
                            <a href="{{ route('client.slug',$hotel->slug ?? '') }}" class="btn third-special-button">
                                FIRSATI YAKALA
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
@endforelse