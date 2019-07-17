@extends('admin.templates.admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('hotel.transfer.update',[$hotel_id,$transfer->id]) }}" method="post">
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="hotel_id" value="{{ $hotel_id }}">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label" for="name">Nereden
                                <span class="required">*</span>
                            </label>
                            <input type="text" id="name" name="transfer_from_location"
                                    value="{{ $transfer->transfer_from_location ?? '' }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label" for="name">Nereye<span
                                        class="required">*</span>
                            </label>
                            <input type="text" id="name" name="transfer_to_location"
                                    value="{{ $transfer->transfer_to_location ?? '' }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label" for="name">Fiyat<span
                                        class="required">*</span>
                            </label>
                            <input type="text" id="name" value="{{ $transfer->transfer_price ?? '' }}" name="transfer_price"
                                    class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label" for="name">Tip<span
                                        class="required">*</span>
                            </label>
                            <input type="radio" value="1" {{ $transfer->transfer_type == 1 ? 'checked' : '' }} id="name" name="transfer_type"
                                   > Kişi Başı
                            <input type="radio" value="2" {{ $transfer->transfer_type == 2 ? 'checked' : '' }} id="name" name="transfer_type"
                                   > Toplu Taşıma
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-success" value="Kaydet"
                               style="margin-top: 26px;">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection