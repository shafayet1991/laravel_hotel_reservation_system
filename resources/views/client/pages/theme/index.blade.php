@extends('client.layouts.main')
@section('content')
    <div class="container second-special-container mt-5 mb-5 pt-3 pb-3 pl-4 pr-4">
        <div class="row">
            <div class="col-md-12">
                <h3>
                    <label class="text-left font-weight-bold mt-2">
                        Sizin İçin Seçtiğimiz Oteller
                    </label>
                </h3>
            </div>
            @foreach($theme->hotels->take(3)  as $hotel)
                <div class="col-md-4 mt-2 mt-md-0 d-inline-block">
                    <div class="card first-special-card">
                        <a href="{{url('/hotel/'.$hotel->id)}}"><img class="card-img-top"
                                                                     src="{{asset('hotels/images')}}/{{$hotel->cover}}"
                                                                     alt="Card image cap"></a>
                        <div class="card-body pb-1">
                            <h5 class="card-title p-0 m-0">
                                <a style="color: #000;" href="{{url('/hotel/'.$hotel->id)}}">
                                    {{$hotel->name}}
                                </a>
                            </h5>
                            <label class="card-text p-0 m-0"><i
                                        class="fa fa-map-marker-alt"></i> {{$hotel->city->name ?? ''}}
                                / {{$hotel->county->name ?? ''}}</label>
                            <hr/>
                            @foreach($hotel->features as $index => $feature)
                                @if ($index < 3)
                                    <label class="float-left d-inline-block mt-2"><i
                                                class="fa fa-check-circle second-text-color" id="popover"
                                                data-trigger="hover" data-toggle="popover" data-placemenet="right"
                                                data-content="{{$feature->name}}" style="font-size:25px"></i></label>
                                @endif
                            @endforeach
                            <a href="{{url('/hotel/'.$hotel->id)}}"
                               class="first-special-card-icon float-right d-inline-block"><i
                                        class="far fa-arrow-alt-circle-right"></i></a>
                            <label class="float-right d-inline-block mt-2 mr-2 font-weight-bolder">
                                <h4>{{ Helper::custom_money($hotel->price )}} TL</h4></label>
                            <label class="float-right text-muted d-inline-block mt-2 mr-1">1 GECE</label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection