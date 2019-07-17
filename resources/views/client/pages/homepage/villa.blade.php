<div class="container second-special-container my-5 py-3 px-5">
    <div class="row">
        <div class="col-md-12">
            <h3>
                <label class="text-left font-weight-bold mt-2">Villalar</label>
            </h3>
        </div>
         @foreach($villa_hotels as $hotel)
            @if($hotel->price == "" || $hotel->price == 0)
                @continue
            @endif
            <div class="col-md-4 mb-4">
                <div class="card first-special-card">
                    @if(Helper::custom_check_numeric($hotel->star) !== false)
                        <div class="rating-stars first-rating-stars">
                            @for($i=0; $i<$hotel->star;$i++)
                                <span><i class="fa fa-star fa-fw"></i></span>
                            @endfor
                        </div>
                    @endif
                    <a href="{{ route('client.slug',$hotel->slug ?? '') }}">
                        @if($hotel->cover)
                            <img class="card-img-top" src="{{asset('hotels/images')}}/{{$hotel->cover}}" alt="">
                        @endif
                    </a>
                    <div class="card-body pb-1">
                        <h5 class="card-title p-0 m-0">
                            <a style="color: #000;" href="{{ route('client.slug',$hotel->slug ?? '') }}">
                                {{ Str::limit($hotel->name, 20, ' (...)') }}
                            </a>
                        </h5>
                        <label class="card-text p-0 m-0"><i
                                    class="fa fa-map-marker-alt"></i> {{$hotel->city->name ?? ''}}
                            / {{$hotel->county->name ?? ''}}</label>
                        <br>
                        <label class="card-text p-0 mt-0" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Sahur & İftar dahildir."><i class="fa fa-check second-text-color"></i>
                            {{ $hotel->board_type->name ?? '' }}
                        </label>
                        <label class="first-specil-card-campaign">{{ $hotel->campaign ?? '' }}</label>
                        <hr/>
                        <hr/>
                        @foreach($hotel->features as $index => $feature)
                            @if ($index < 3)
                                <label class="float-left d-inline-block mt-2"><i
                                            class="fa fa-check-circle second-text-color" id="popover"
                                            data-trigger="hover" data-toggle="popover" data-placemenet="right"
                                            data-content="{{$feature->name}}" style="font-size:25px"></i></label>
                            @endif
                        @endforeach
                        <a href="{{ route('client.slug',$hotel->slug ?? '') }}"
                           class="first-special-card-icon float-right d-inline-block"><i
                                    class="far fa-arrow-alt-circle-right"></i></a>
                        <label class="float-right d-inline-block mt-2 mr-2 font-weight-bolder">
                            <h4>{{ Helper::custom_money($hotel->price) }} {{ session('localize.currency') ?? 'TL' }}</h4></label>
                        <label class="float-right text-muted d-inline-block mt-2 mr-1">1 GECE</label>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12 col-12 mt-4 text-center">
            <a href="{{route('search',['type' => 'villas','search_label' => 'Villalar', 'adult_count' => 1 ,'child_count' => 1, 'child_ages' => [0,0,0,0], 'start_date' => \Carbon\Carbon::now()->format('d.m.Y'), 'end_date' => \Carbon\Carbon::now()->addDay(1)->format('d.m.Y')])}}"
               class="hotel-all-view-button">
                Tüm Villaları Gör
                <i class="fa fa-chevron-right"></i>
            </a>
        </div>
    </div>
</div>