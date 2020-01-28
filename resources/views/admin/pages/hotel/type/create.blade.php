@extends('admin.templates.admin.layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Hotel Types</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('hotel_type.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label">Hotels We Choose For You</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="multi-select" style="height: 200px">
                                            <select multiple="multiple" multi-select="true" multi-select-id="7" multi-select-type="right" multi-select-move-id="8">
                                                @foreach($hotels as $hotel)
                                                    @if(!in_array($hotel,$se_hotels))
                                                        <option value="{{$hotel->id}}" multi-select-name="{{$hotel->name}}">{{$hotel->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <select name="selected_hotels[]" multiple="multiple" multi-select="true" multi-select-id="8" multi-select-type="left" multi-select-move-id="7">
                                                @foreach($se_hotels as $sh)
                                                    <option value="{{$sh->id}}" {{in_array($sh->id, $selected) ? "selected":""}} multi-select-name="{{$sh->name}}">{{$sh->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label">City Hotels</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="multi-select" style="height: 200px">
                                            <select multiple="multiple" multi-select="true" multi-select-id="1" multi-select-type="right" multi-select-move-id="2">
                                                @foreach($hotels as $hotel)
                                                    @if(!in_array($hotel,$city_hotels))
                                                        <option value="{{$hotel->id}}" multi-select-name="{{$hotel->name}}">{{$hotel->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <select name="city_hotels[]" multiple="multiple" multi-select="true" multi-select-id="2" multi-select-type="left" multi-select-move-id="1">
                                                @foreach($city_hotels as $ci)
                                                    <option value="{{$ci->id}}" {{in_array($ci->id, $city) ? "selected":""}} multi-select-name="{{$ci->name}}">{{$ci->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label">
                                        Thermal Hotels</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="multi-select" style="height: 200px">
                                            <select multiple="multiple" multi-select="true" multi-select-id="5" multi-select-type="right" multi-select-move-id="6">
                                                @foreach($hotels as $hotel)
                                                    @if(!in_array($hotel,$t_hotels))
                                                        <option value="{{$hotel->id}}" multi-select-name="{{$hotel->name}}">{{$hotel->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <select name="thermal_hotels[]" multiple="multiple" multi-select="true" multi-select-id="6" multi-select-type="left" multi-select-move-id="5">
                                                @foreach($t_hotels as $th)
                                                    <option value="{{$th->id}}" {{in_array($th->id, $thermal) ? "selected":""}} multi-select-name="{{$th->name}}">{{$th->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="control-label">villas</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="multi-select" style="height: 200px">
                                            <select multiple="multiple" multi-select="true" multi-select-id="3" multi-select-type="right" multi-select-move-id="4">
                                                @foreach($hotels as $hotel)
                                                    @if(!in_array($hotel,$villa_hotels))
                                                        <option value="{{$hotel->id}}" multi-select-name="{{$hotel->name}}">{{$hotel->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <select name="villas[]" multiple="multiple" multi-select="true" multi-select-id="4" multi-select-type="left" multi-select-move-id="3">
                                                @foreach($villa_hotels as $vi)
                                                    <option value="{{$vi->id}}" {{in_array($vi->id, $villa) ? "selected":""}} multi-select-name="{{$vi->name}}">{{$vi->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(".select2").select2({
            width: '100%'
        });
    </script>
@endsection