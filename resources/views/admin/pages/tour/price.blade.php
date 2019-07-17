@extends('admin.templates.admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('tour_price.update',$price->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <input type="hidden" value="{{ $price->tour_id }}" name="tour_id">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="start_date">Baslangic Tarihi <span class="required"></span>
                                </label>
                                <input type="text" value="{{ $price->start_date ?? '' }}" class="form-control date" id="start_date" name="start_date" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="end_date">Bitis Tarihi <span class="required"></span>
                                </label>
                                <input type="text" value="{{ $price->end_date ?? '' }}" class="form-control date" id="end_date" name="end_date" autocomplete="off">
                            </div>
                        </div>
                        <a href="{{ route('tour.edit',$price->tour_id) }}" class="btn btn-info pull-right">
                            <i class="fa fa-undo"></i> Turlara Dön
                        </a>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label" for="description">
                                Açıklama
                                <span class="required">*</span>
                            </label>
                            <textarea id="editor4" class="form-control" rows="2"
                                      name="description">{{ $price->description ?? '' }}</textarea>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label" for="adult_count">Kişi Sayısı<span
                                            class="required">*</span>
                                </label>
                                <input type="number" value="{{ $price->adult_count ?? '' }}" id="adult_count" name="adult_count"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label" for="extra_bed_price">İlave Yatak Ücreti<span
                                            class="required">*</span>
                                </label>
                                <input type="number" value="{{ $price->extra_bed_price ?? '' }}" id="extra_bed_price" name="extra_bed_price"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label" for="person_price">Tek Kişilik Ücret<span
                                            class="required">*</span>
                                </label>
                                <input type="number" value="{{ $price->person_price ?? '' }}" id="person_price" name="person_price"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label" for="free_child_price">0 - {{ $tour->free_child_age ?? '' }} Çoçuk<span
                                            class="required">*</span>
                                </label>
                                <input  type="number" value="{{ $price->free_child_price ?? '' }}" id="free_child_price" name="free_child_price"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label" for="maximum_child_price">{{ $price->tour->free_child_age ?? '' }} - {{ $price->tour->maximum_child_age ?? '' }} Çoçuk<span
                                            class="required">*</span>
                                </label>
                                <input type="number" value="{{ $price->maximum_child_price ?? '' }}" id="maximum_child_price" name="maximum_child_price"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label" for="profit">Kar<span
                                            class="required">*</span>
                                </label>
                                <input type="number" value="{{ $price->profit ?? '' }}" id="profit" name="profit"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success" style="margin-top: 26px;">
                                Kaydet
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor4');
    </script>
@endsection