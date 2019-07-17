@extends('admin.templates.admin.layout')
@section('styles')
    <style>
        .modal-dialog {
            width: 60%;
        }
    </style>
@endsection
@section('content')
    <div class="modal fade create-modal-lg modal-xl" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="{{url('adminpanel/room_contract')}}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Kontrat Oluştur</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="start_date">Baslangic Tarihi
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control date" id="start_date" name="start_date"
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="end_date">Bitis Tarihi <span
                                                class="required"></span>
                                    </label>
                                    <input type="text" class="form-control date" id="end_date" name="end_date"
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="pp_price_calc_price_create">PP Fiyatı<span
                                                class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="pp_price_calc_price_create"
                                           name="pp_price">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="pp_purchase_price">Extra Yatak
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="extra_bed_price" name="extra_bed_price">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="board_type_id">Pansiyon Tipi<span
                                                class="required">*</span>
                                    </label>
                                    <select class="form-control" name="board_type_id">
                                        @forelse($board_types as $board)
                                            <option value="{{ $board->id ?? '' }}">{{ $board->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="single_price_create">Single
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="single_price_create" name="single_price">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="double_price_create">Double
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="double_price_create" name="double_price"
                                    >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="triple_price_create">Triple
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="triple_price_create"
                                           name="triple_price">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="quad_price_create">Quad
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="quad_price_create" name="quad_price"
                                    >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="five_price_create">Five
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="five_price_create" name="five_price"
                                    >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="six_price_create">Six
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="six_price_create" name="six_price"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_single_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_single_create" name="baby_one_price_for_single">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_single_create" name="baby_more_price_for_single">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_double_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_double_create" name="baby_one_price_for_double">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_double_create" name="baby_more_price_for_double">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_triple_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_triple_create" name="baby_one_price_for_triple">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_triple_create" name="baby_more_price_for_triple">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_quad_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_quad_create" name="baby_one_price_for_quad">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_quad_create" name="baby_more_price_for_quad">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_five_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_five_create" name="baby_one_price_for_five">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_five_create" name="baby_more_price_for_five">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_five_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_five_create" name="baby_one_price_for_five">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_five_create" name="baby_more_price_for_five">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_single_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_single_create" name="child_one_price_for_single">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_single_create" name="child_more_price_for_single">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_double_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_double_create" name="child_one_price_for_double">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_double_create" name="child_more_price_for_double">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_triple_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_triple_create" name="child_one_price_for_triple">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_triple_create" name="child_more_price_for_triple">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_quad_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_quad_create" name="child_one_price_for_quad">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_quad_create" name="child_more_price_for_quad">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_five_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_five_create" name="child_one_price_for_five">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_five_create" name="child_more_price_for_five">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_six_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_six_create" name="child_one_price_for_six">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_six_create" name="child_more_price_for_six">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_single_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_single_create" name="young_one_price_for_single">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_single_create" name="young_more_price_for_single">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_double_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_double_create" name="young_one_price_for_double">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_double_create" name="young_more_price_for_double">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_triple_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_triple_create" name="young_one_price_for_triple">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_triple_create" name="young_more_price_for_triple">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_quad_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_quad_create" name="young_one_price_for_quad">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_quad_create" name="young_more_price_for_quad">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_five_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_five_create" name="young_one_price_for_five">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_five_create" name="young_more_price_for_five">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_quad_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_six_create" name="young_one_price_for_six">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_six_create" name="young_more_price_for_six">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade update-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="" id="update-form">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Kontrat Düzenle</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="start_date">Baslangic Tarihi
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control date" id="start_date" name="start_date"
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="end_date">Bitis Tarihi <span
                                                class="required"></span>
                                    </label>
                                    <input type="text" class="form-control date" id="end_date" name="end_date"
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="pp_price_calc_price_create">PP Fiyatı<span
                                                class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="pp_price_calc_price_update"
                                           name="pp_price">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="pp_purchase_price">Extra Yatak
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="extra_bed_price" name="extra_bed_price">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="room_type_id">Pansiyon Tipi<span
                                                class="required">*</span>
                                    </label>
                                    <select class="form-control" name="board_type_id">
                                        @forelse($board_types as $board)
                                            <option value="{{ $board->id ?? '' }}">{{ $board->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="single_price_create">Single
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="single_price_update" name="single_price">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="double_price_update">Double
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="double_price_update" name="double_price"
                                    >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="triple_price_update">Triple
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="triple_price_update"
                                           name="triple_price">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="quad_price_update">Quad
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="quad_price_update" name="quad_price"
                                    >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="five_price_update">Five
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="five_price_update" name="five_price"
                                    >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="six_price_update">Six
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control" id="six_price_update" name="six_price"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_single_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_single_create" name="baby_one_price_for_single">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_single_create" name="baby_more_price_for_single">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_double_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_double_create" name="baby_one_price_for_double">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_double_create" name="baby_more_price_for_double">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_triple_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_triple_create" name="baby_one_price_for_triple">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_triple_create" name="baby_more_price_for_triple">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_quad_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_quad_create" name="baby_one_price_for_quad">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_quad_create" name="baby_more_price_for_quad">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_five_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_five_create" name="baby_one_price_for_five">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_five_create" name="baby_more_price_for_five">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="baby_one_price_for_six_create">Bebek
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="baby_one_price_for_six_create" name="baby_one_price_for_six">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="baby_more_price_for_six_create" name="baby_more_price_for_six">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_single_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_single_create" name="child_one_price_for_single">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_single_create" name="child_more_price_for_single">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_double_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_double_create" name="child_one_price_for_double">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_double_create" name="child_more_price_for_double">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_triple_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_triple_create" name="child_one_price_for_triple">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_triple_create" name="child_more_price_for_triple">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_quad_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_quad_create" name="child_one_price_for_quad">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_quad_create" name="child_more_price_for_quad">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_quad_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_five_create" name="child_one_price_for_five">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_five_create" name="child_more_price_for_five">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="child_one_price_for_quad_create">Çocuk
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="child_one_price_for_six_create" name="child_one_price_for_six">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="child_more_price_for_six_create" name="child_more_price_for_six">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_single_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_single_create" name="young_one_price_for_single">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_single_create" name="young_more_price_for_single">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_double_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_double_create" name="young_one_price_for_double">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_double_create" name="young_more_price_for_double">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_triple_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_triple_create" name="young_one_price_for_triple">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_triple_create" name="young_more_price_for_triple">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_quad_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_quad_create" name="young_one_price_for_quad">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_quad_create" name="young_more_price_for_quad">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_quad_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_five_create" name="young_one_price_for_five">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_five_create" name="young_more_price_for_five">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label" for="young_one_price_for_quad_create">Genç
                                        <span class="required"></span>
                                    </label>
                                    <input type="text" placeholder="İlk" class="form-control" id="young_one_price_for_six_create" name="young_one_price_for_six">
                                    <input type="text" placeholder="Sonrası" class="form-control" id="young_more_price_for_six_create" name="young_more_price_for_six">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade copy-modal-lg modal-xl" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="{{ route('contract.copy')}}">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Kontrat Kopyasını Oluştur</h4>
                    </div>
                    <input type="hidden" id="contract_id" name="contract_id">
                    <div class="modal-body">
                            <p>Seçilen odalar için kontrat oluşturulacaktır.</p>
                        @forelse($room->hotel->rooms as $row)
                            <p>
                                <label for="room_{{ $row->id }}">
                                    <input type="checkbox" id="room_{{ $row->id }}" name="room_id[]" value="{{ $row->id }}" class="flat">
                                    &nbsp;{{ $row->name ?? '' }}
                                </label>
                            </p>
                        @empty
                            Kontrat kopyalabilmek için bu oda dışında, herhangi bir oda bulunması gerekir.
                        @endforelse
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade stop_create_modal" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="{{ route('contract.store_stop')}}">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Satış Durdur</h4>
                    </div>
                    <input type="hidden" id="contract_id" name="contract_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="start_date">
                                        Başlangıç Tarihi <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control date" id="start_date" name="start_date" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="end_date">
                                        Bitiş Tarihi <span class="required"></span>
                                    </label>
                                    <input type="text" class="form-control date" id="end_date" name="end_date" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger" style="margin-top: 25px;">Tarihleri Arası Satışları Durdur</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade room_features-modal-lg modal-xl" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="{{ route('room_feature.store')}}">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Oda Özellikleri Oluştur</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="name">Oda Özellik Adı<span
                                        class="required">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                   class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade room_possibilities-modal-lg modal-xl" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="{{ route('room_possibility.store')}}">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Oda Olanakları Oluştur</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="name">Oda Olanak Adı<span
                                        class="required">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                   class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <a href="{{url('/adminpanel/hotel/'.$room->hotel->id.'/edit?tab=rooms')}}"
                       class="btn btn-primary btn-md">
                        <i class="fa fa-arrow-circle-left"></i>
                        Geri
                    </a>
                    <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target=".create-modal-lg">Kontrat Oluştur
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target=".stop_create_modal">Satış Durdurma
                    </button>
                    {{--                        <a href="{{url('/adminpanel/'.$room->id.'/room_person_detail')}}"--}}
                    {{--                           class="btn btn-primary btn-md">--}}
                    {{--                            <i class="fa fa-plus-circle"></i>--}}
                    {{--                            Kişi Detayları--}}
                    {{--                        </a>--}}
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h4>
                        <strong style="font-size:17px">{{ Helper::custom_where_am_i($names) }}</strong> adlı yeri inceliyorsunuz şu anda.
                    </h4>
                    <div class="">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>
                                    <i class="fa fa-bars"></i> Oda Bilgileri <small> Güncelle </small>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content" style="display: none;">
                                <form class="form-horizontal" method="POST" action="{{url('adminpanel/hotel_room/'.$room->id)}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="room_type_id">Oda Tipi<span
                                                            class="required">*</span>
                                                </label>
                                                <select class="form-control" name="room_type_id" required>
                                                    <option disabled>Seçiniz</option>
                                                    @foreach($room_types as $room_type)
                                                        <option {{ $room_type->id === $room->room_type_id ? 'selected' : null  }} value="{{$room_type->id}}">{{$room_type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="name">Oda Adı
                                                    <span class="required">*</span>
                                                </label>
                                                <input value="{{ $room->name ?? '' }}" type="text" id="name" name="name"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">

                                                <label class="control-label" for="code">Oda Kodu<span
                                                            class="required">*</span>
                                                </label>
                                                <input value="{{ $room->code ?? '' }}" type="text" id="code" name="code"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="count">Oda Sayısı<span
                                                            class="required">*</span>
                                                </label>
                                                <input value="{{ $room->count ?? '' }}" type="text" id="count" name="count"
                                                       class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="min_adult_count">Minimum Yetişkin Sayısı<span
                                                            class="required">*</span>
                                                </label>

                                                <input value="{{ $room->min_adult_count ?? '' }}" type="text"
                                                       id="min_adult_count" name="min_adult_count"
                                                       class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="max_adult_count">Maximum Yetişkin Sayısı<span
                                                            class="required">*</span>
                                                </label>
                                                <input value="{{ $room->max_adult_count ?? '' }}" type="text"
                                                       id="max_adult_count" name="max_adult_count"
                                                       class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="min_baby_count">Minimum Bebek Sayısı<span
                                                            class="required">*</span>
                                                </label>

                                                <input value="{{ $room->min_baby_count ?? '' }}" type="text" id="min_baby_count"
                                                       name="min_baby_count"
                                                       class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="max_baby_count">Maximum Bebek Sayısı<span
                                                            class="required">*</span>
                                                </label>

                                                <input value="{{ $room->max_baby_count ?? '' }}" type="text" id="max_baby_count"
                                                       name="max_baby_count"
                                                       class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="min_child_count">Minimum Çocuk Sayısı
                                                    <span class="required">*</span>
                                                </label>

                                                <input value="{{ $room->min_child_count ?? '' }}" type="text"
                                                       id="min_child_count" name="min_child_count"
                                                       class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="max_child_count">Maximum Çocuk Sayısı
                                                    <span class="required">*</span>
                                                </label>

                                                <input value="{{ $room->max_child_count ?? '' }}" type="text"
                                                       id="max_child_count" name="max_child_count"
                                                       class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="min_young_count">Minimum Genç Sayısı
                                                    <span class="required">*</span>
                                                </label>
                                                <input value="{{ $room->min_young_count ?? '' }}" type="text"
                                                       id="min_young_count" name="min_young_count"
                                                       class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="max_young_count">Maximum Genç Sayısı
                                                    <span class="required">*</span>
                                                </label>
                                                <input value="{{ $room->max_young_count ?? '' }}" type="text"
                                                       id="max_young_count" name="max_young_count"
                                                       class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="single_factor">Single Çarpan
                                                    <span class="required">*</span>
                                                </label>
                                                <input value="{{ $room->single_factor ?? '' }}" type="text" id="single_factor" name="single_factor"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="double_factor">Double Çarpan
                                                    <span class="required">*</span>
                                                </label>
                                                <input value="{{ $room->double_factor ?? '' }}" type="text" id="double_factor" name="double_factor"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="triple_factor">Triple Çarpan
                                                    <span class="required">*</span>
                                                </label>
                                                <input value="{{ $room->triple_factor ?? '' }}" type="text" id="triple_factor" name="triple_factor"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="quad_factor">Quad Çarpan
                                                    <span class="required">*</span>
                                                </label>
                                                <input value="{{ $room->quad_factor ?? '' }}" type="text" id="quad_factor" name="quad_factor"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="five_factor">Five Çarpan
                                                    <span class="required">*</span>
                                                </label>
                                                <input value="{{ $room->five_factor ?? '' }}" type="text" id="five_factor" name="five_factor"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="six_factor">Six Çarpan
                                                    <span class="required">*</span>
                                                </label>
                                                <input value="{{ $room->six_factor ?? '' }}" type="text" id="six_factor" name="six_factor"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="max_bed_count">Maximum Yatak Sayısı
                                                    <span class="required">*</span>
                                                </label>
                                                <input value="{{ $room->max_bed_count ?? '' }}" type="text" id="max_bed_count"
                                                       name="max_bed_count"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="landscape">Manzara
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="text" value="{{ $room->landscape ?? old('landscape') }}" id="landscape" name="landscape"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="baby_count_limit_with_max_adult">Maximum Yetişkin Yanında Bebek Sayısı
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="text" id="baby_count_limit_with_max_adult" name="baby_count_limit_with_max_adult"
                                                       class="form-control" value="{{$room->baby_count_limit_with_max_adult}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="child_count_limit_with_max_adult">Maximum Yetişkin Yanında Çocuk Sayısı
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="text" id="child_count_limit_with_max_adult" name="child_count_limit_with_max_adult"
                                                       class="form-control" value="{{$room->child_count_limit_with_max_adult}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="young_count_limit_with_max_adult">Maximum Yetişkin Yanında Genç Sayısı
                                                    <span class="required">*</span>
                                                </label>
                                                <input type="text" id="young_count_limit_with_max_adult" name="young_count_limit_with_max_adult"
                                                       class="form-control" value="{{$room->young_count_limit_with_max_adult}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label float-left" for="young_count_limit_with_max_adult">Oda Özellikleri (Max 3)
                                                    <span class="required">
                                                        <a href="#"
                                                           class="btn btn-success btn-xs room_features">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                    </span>
                                                    <select class="select3" name="room_features[]" multiple="multiple">
                                                        @forelse($room_features as $room_feature)
                                                            <option value="{{ $room_feature->id ?? '' }}" {{ in_array($room_feature->id, $room_feature_ids) ? "selected" : null }}>
                                                                {{ $room_feature->name ?? '' }}
                                                            </option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label float-left"
                                                       for="young_count_limit_with_max_adult">Oda Olanakları
                                                    <span class="required">
                                                                <a href="#"
                                                                   class="btn btn-success btn-xs room_possibilities">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </span>
                                                    <select class="select4" name="room_possibilities[]"
                                                            multiple="multiple">
                                                        @forelse($room_possibilities as $room_possibility)
                                                            <option value="{{ $room_possibility->id ?? '' }}" {{ in_array($room_possibility->id, $room_possibility_ids) ? "selected" : null }}>{{ $room_possibility->name ?? '' }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success" style="margin-top: 25px;width: 100%;">
                                            Kaydet
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>
                                    <i class="fa fa-bars"></i> Kontrat Bilgileri <small> Liste </small>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
{{--                                    <li class="dropdown">--}}
{{--                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
{{--                                        <ul class="dropdown-menu" role="menu">--}}
{{--                                            <li><a href="#">Settings 1</a>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="#">Settings 2</a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Numara</th>
                                                <th>Başlangıç</th>
                                                <th>Bitiş</th>
                                                <th>PP Fiyat</th>
                                                <th>Pansiyon Tipi</th>
                                                <th>Extra Yatak</th>
                                                <th>İşlemler</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($room->contracts as $contract)
                                                <tr>
                                                    <th>{{$contract->id ?? ''}}</th>
                                                    <th>{{$contract->start_date ?? ''}}</th>
                                                    <th>{{$contract->end_date ?? ''}}</th>
                                                    <th>{{$contract->pp_price?? ''}}</th>
                                                    <th>{{$contract->board_type->name?? ''}}</th>
                                                    <th>{{$contract->extra_bed_price ?? ''}}</th>
                                                    <th>
                                                        <form id="delete-form-{{$contract->id}}" method="post"
                                                              action="{{ route('room_contract.destroy',$contract->id) }}">
                                                            @csrf
                                                            @method("DELETE")
                                                            <a class="btn btn-info btn-xs update" data-id="{{$contract->id}}">
                                                                <i class="fa fa-cogs" title="Kontrat Düzenle"></i>
                                                            </a>
                                                            <a data-id="{{$contract->id}}" class="btn btn-success btn-xs copy_contract">
                                                                <i class="fa fa-copy" title="Kontrat Kopyala"></i>
                                                            </a>
                                                            <a onclick='if(confirm("{{ Helper::js_confirm_message('delete') }})")){
                                                                    event.preventDefault();document.getElementById("delete-form-{{$contract->id}}").submit()
                                                                    }else{
                                                                    event.preventDefault();
                                                                    }'
                                                               href="#"
                                                               class="btn btn-danger btn-xs"><i class="fa fa-trash" title="Delete"></i>
                                                            </a>
                                                        </form>
                                                    </th>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-bars"></i> Satış Durdurma Emirleri <small> Liste </small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                {{--                                    <li class="dropdown">--}}
                                {{--                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                                {{--                                        <ul class="dropdown-menu" role="menu">--}}
                                {{--                                            <li><a href="#">Settings 1</a>--}}
                                {{--                                            </li>--}}
                                {{--                                            <li><a href="#">Settings 2</a>--}}
                                {{--                                            </li>--}}
                                {{--                                        </ul>--}}
                                {{--                                    </li>--}}
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th width="10%">Numara</th>
                                            <th>Tarih</th>

                                            <th width="10%">İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($stop_days as $day)
                                            <tr>
                                                <th>{{$day->id ?? ''}}</th>
                                                <th>{{$day->date ?? ''}}</th>
                                                <th>
                                                    <a href="{{route('contract.update_stop',$day->id)}}" class="btn btn-danger">
                                                        <i class="fa fa-remove" title="Kontrat Kopyala"></i>
                                                    </a>
                                                </th>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">

        $('.room_features').on('click', function () {
            $('.room_features-modal-lg').modal('show')
        });

        $('.room_possibilities').on('click', function () {
            $('.room_possibilities-modal-lg').modal('show')
        });

        $(".select3").select2({
            width: '100%',
            maximumSelectionLength: 3
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#pp_price_calc_price_create').on('change', function () {
            var pp_price = $('#pp_price_calc_price_create').val();
            $.ajax({
                url: "{{ url('/adminpanel/calc_contract')}}/" + "{{ $room->id }}",
                type: 'POST',
                data: { pp_price: pp_price },
                success: function (data) {
                    $("#single_price_create").val(data.single);
                    $("#double_price_create").val(data.double);
                    $("#triple_price_create").val(data.triple);
                    $("#quad_price_create").val(data.quad);
                    $("#five_price_create").val(data.five);
                    $("#six_price_create").val(data.six);
                }
            })
        });

        $('#pp_price_calc_price_update').on('change', function () {
            var pp_price = $('#pp_price_calc_price_update').val();
            $.ajax({
                url: "{{ url('/adminpanel/calc_contract')}}/" + "{{ $room->id }}",
                type: 'POST',
                data: { pp_price: pp_price },
                success: function (data) {
                    $("#single_price_update").val(data.single);
                    $("#double_price_update").val(data.double);
                    $("#triple_price_update").val(data.triple);
                    $("#quad_price_update").val(data.quad);
                    $("#five_price_update").val(data.five);
                    $("#six_price_update").val(data.six);
                }
            })
        });

        $(".select4").select2({
            width: '100%',
        });

        $('.copy_contract').on('click', function () {
            $('.copy-modal-lg').modal('show')
            var contract_id = $(this).data('id');
            $("#contract_id").val(contract_id);
        });

        $('.update').on('click', function () {
            $.ajax({
                url: '{{url('/adminpanel/room_contract')}}/' + $(this).data('id'),
                type: 'GET',
                data: '',
                success: function (data) {
                    $('.update-modal-lg').modal('show');
                    $('#update-form input[name="start_date"]').val(data.start_date);
                    $('#update-form input[name="end_date"]').val(data.end_date);
                    $('#update-form input[name="extra_bed_price"]').val(data.extra_bed_price);
                    $('#update-form input[name="pp_price"]').val(data.pp_price);
                    $('#update-form input[name="single_price"]').val(data.single_price);
                    $('#update-form input[name="double_price"]').val(data.double_price);
                    $('#update-form input[name="triple_price"]').val(data.triple_price);
                    $('#update-form input[name="quad_price"]').val(data.quad_price);
                    $('#update-form input[name="five_price"]').val(data.five_price);
                    $('#update-form input[name="six_price"]').val(data.six_price);
                    $('#update-form input[name="baby_one_price_for_single"]').val(data.baby_one_price_for_single);
                    $('#update-form input[name="baby_more_price_for_single"]').val(data.baby_more_price_for_single);
                    $('#update-form input[name="child_one_price_for_single"]').val(data.child_one_price_for_single);
                    $('#update-form input[name="child_more_price_for_single"]').val(data.child_more_price_for_single);
                    $('#update-form input[name="young_one_price_for_single"]').val(data.young_one_price_for_single);
                    $('#update-form input[name="young_more_price_for_single"]').val(data.young_more_price_for_single);
                    $('#update-form input[name="baby_one_price_for_double"]').val(data.baby_one_price_for_double);
                    $('#update-form input[name="baby_more_price_for_double"]').val(data.baby_more_price_for_double);
                    $('#update-form input[name="child_one_price_for_double"]').val(data.child_one_price_for_double);
                    $('#update-form input[name="child_more_price_for_double"]').val(data.child_more_price_for_double);
                    $('#update-form input[name="young_one_price_for_double"]').val(data.young_one_price_for_double);
                    $('#update-form input[name="young_more_price_for_double"]').val(data.young_more_price_for_double);
                    $('#update-form input[name="baby_one_price_for_triple"]').val(data.baby_one_price_for_triple);
                    $('#update-form input[name="baby_more_price_for_triple"]').val(data.baby_more_price_for_triple);
                    $('#update-form input[name="child_one_price_for_triple"]').val(data.child_one_price_for_triple);
                    $('#update-form input[name="child_more_price_for_triple"]').val(data.child_more_price_for_triple);
                    $('#update-form input[name="young_one_price_for_triple"]').val(data.young_one_price_for_triple);
                    $('#update-form input[name="young_more_price_for_triple"]').val(data.young_more_price_for_triple);
                    $('#update-form input[name="baby_one_price_for_quad"]').val(data.baby_one_price_for_quad);
                    $('#update-form input[name="baby_more_price_for_quad"]').val(data.baby_more_price_for_quad);
                    $('#update-form input[name="child_one_price_for_quad"]').val(data.child_one_price_for_quad);
                    $('#update-form input[name="child_more_price_for_quad"]').val(data.child_more_price_for_quad);
                    $('#update-form input[name="young_one_price_for_quad"]').val(data.young_one_price_for_quad);
                    $('#update-form input[name="young_more_price_for_quad"]').val(data.young_more_price_for_quad);
                    $('#update-form input[name="baby_one_price_for_five"]').val(data.baby_one_price_for_five);
                    $('#update-form input[name="baby_more_price_for_five"]').val(data.baby_more_price_for_five);
                    $('#update-form input[name="child_one_price_for_five"]').val(data.child_one_price_for_five);
                    $('#update-form input[name="child_more_price_for_five"]').val(data.child_more_price_for_five);
                    $('#update-form input[name="young_one_price_for_five"]').val(data.young_one_price_for_five);
                    $('#update-form input[name="young_more_price_for_five"]').val(data.young_more_price_for_five);
                    $('#update-form input[name="baby_one_price_for_six"]').val(data.baby_one_price_for_six);
                    $('#update-form input[name="baby_more_price_for_six"]').val(data.baby_more_price_for_six);
                    $('#update-form input[name="child_one_price_for_six"]').val(data.child_one_price_for_six);
                    $('#update-form input[name="child_more_price_for_six"]').val(data.child_more_price_for_six);
                    $('#update-form input[name="young_one_price_for_six"]').val(data.young_one_price_for_six);
                    $('#update-form input[name="young_more_price_for_six"]').val(data.young_more_price_for_six);
                    $('#update-form select[name="board_type_id"]').val(data.board_type_id);
                    $('#update-form').attr('action', "{{url('/adminpanel/room_contract')}}/" + data.id);
                }
            })
        });
    </script>
@endsection
