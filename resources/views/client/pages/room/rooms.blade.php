@forelse($rooms as $index => $room)
    <div class="col-md-12 col-12 d-block mb-3">
        <div class="card hotel-room-card p-0 mb-3">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-4 col-12 d-inline-block pr-md-1">
                        <label class="hotel-room-campaign-price"><span class="text">Kampanyalı</span><span class="price">{{ Helper::custom_money($room['price']) ?? '' }} {{ session('localize.currency') }}</span></label>
                        <img src="{{ asset($room['info']->cover) }}" class="hotel-primary-image" alt="{{ $room['info']['name'] }}"/>
                    </div>
                    <div class="col-md-5 col-12 d-inline-block pl-4 pl-md-0">
                        <div class="mt-3 mt-md-2 ml-2 ml-md-3 mb-1 w-100">
                            <h5 class="text-muted font-weight-bolder">{{ $room['info']['name'] }}</h5>
                        </div>
                        <div class="mt-0 mt-md-1 mb-0 mb-md-2 pl-2 pl-md-0 ml-3 w-100">
                            @forelse($room['features'] as $feature)
                                <div class="badge first-badge-special text-wrap" style="width: auto;">
                                    {{ $feature->name ?? '' }}
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <div class="mb-2 pl-2 pl-md-0 ml-0 ml-md-3 w-100">
                            <label class="text-muted m-0 d-block">
                                <i class="fa fa-check-circle second-text-color"></i>
                                {{ $room['info']->room_type->name ?? '' }}
                            </label>
                            <label class="text-muted m-0 d-block">
                                <i class="fa fa-check-circle second-text-color"></i>
                                {{ $room['info']->hotel->board_type->name ?? '' }}
                            </label>
                            @if(Helper::custom_check_empty($room['info']->landscape ) !== false)
                                <label class="text-muted m-0 d-block">
                                    <i class="fa fa-check-circle second-text-color"></i>
                                    {{ $room['info']->landscape ?? '' }}
                                </label>
                            @endif
                        </div>
                        <div class="w-100 pt-0 pt-md-1 pb-0 text-center d-none d-md-block">
                            <h4><span class="hotel-room-features-view-button first-text-color"><i
                                            class="fa fa-chevron-down" onclick="hotelRoomFeatures({{ $index }});"
                                            hotel-room-features-button="{{ $index }}" hotel-room-features-status="close"
                                            data-toggle="popover" data-trigger="hover" data-placement="bottom"
                                            data-content="Oda Özellikleri"></i></span></h4>
                            <label class="text-muted text-center font-small">Oda Özellikleri</label>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 d-inline-block text-center p-1 pt-3">
                        <div class="mt-0 mt-md-4 mb-2 w-75 p-1 hotel-room-price-box">
                            <h4 class="font-weight-bolder first-text-color mb-0">
                                {{ Helper::custom_money($room['price']) ?? '' }} {{ session('localize.currency') }}
                            </h4>
                            <h6 class="text-muted">{{ $room['night'] ?? '' }} Gece</h6>
                        </div>
                        <div class="mb-0 mt-4 w-100">
                            <a href="{{ route('common.reservation.index',[
                                        $room['info']['id'],
                                        $room['start_date'],
                                        $room['end_date'],
                                        $room['adult_count'],
                                        $room['child_count'],
                                        implode('-',$room['child_ages'])
                                        ]) }}" class="hotel-room-buy">
                                Rezervasyon Yap
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-12 mt-1 mt-md-0 pl-4 pt-2 pb-1">
                        @forelse($room['seperated_days'] as $seperated_index => $seperated)
                            <div class="hotel-room-card-day-price-box">
                                <label class="hotel-room-price-day">{{ Helper::custom_carbon_full_date($seperated_index) }}</label>
                                <label class="hotel-room-day-price">{{ Helper::custom_money($seperated ?? 0)}} {{ session('localize.currency') }}</label>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="col-md-12 col-12 text-center d-block d-md-none">
                        <div class="w-100 pt-0 pt-md-1 pb-0 text-center d-block d-md-block">
                            <h4><span class="hotel-room-features-view-button first-text-color"><i
                                            class="fa fa-chevron-down" onclick="hotelRoomFeatures({{ $index }});"
                                            hotel-room-features-button="{{ $index }}" hotel-room-features-status="close"
                                            data-toggle="popover" data-trigger="hover" data-placement="bottom"
                                            data-content="Oda Özellikleri"></i></span></h4>
                            <label class="text-muted text-center font-small">Oda Özellikleri</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-12">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card hotel-room-features-card p-0 d-none" hotel-room-features="{{ $index }}">
                    <div class="card-body p-0">
                        <div class="row pt-2 pl-3">
                            @forelse($room['info']->possibilities as $possibility)
                                <div class="col-md-4 col-6">
                                    <tr>
                                        <td><label class="features-icon-alt">
                                                <i class="fas fa-certificate"></i>
                                                <i class="fa fa-check feature-icon-top"></i>
                                            </label>
                                        </td>
                                        <td><label class="feature-text">{{ $possibility->name ?? '' }}</label>
                                        </td>
                                    </tr>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
@endforelse