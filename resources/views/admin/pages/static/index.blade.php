@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="{{ route('static_page.create') }}" class="btn btn-success btn-md pull-right">
                    <i class="fa fa-plus"></i> Sabit Sayfa Ekle
                </a>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sabit Sayfalar
                            <small>({{ count($statics) ?? 0 }})</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Ait Olduğu Türkçe Menü</th>
{{--                                <th>Ait Olduğu Üst Menü</th>--}}
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($statics as $row)
                                <tr>
                                    <td>{{ $row->menu->tr_name ?? '' }}</td>
{{--                                    <td>{{ $row->menu->getTopMenuName($row->menu->top_id ?? '') ?? '' }}</td>--}}
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('static_page.destroy',$row->id) }}">
                                            <a href="{{ route('static_page.edit',$row->id) }}"
                                               class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i>
                                            </a>

                                            @csrf
                                            @method("DELETE")
                                            <a onclick='if(confirm("{{ Helper::js_confirm_message('delete') }})")){
                                                event.preventDefault();document.getElementById("delete-form-{{$row->id}}").submit()
                                                }else{
                                                event.preventDefault();
                                                }'
                                               href="#"
                                               class="btn btn-danger btn-xs"><i class="fa fa-trash" title="Delete"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
