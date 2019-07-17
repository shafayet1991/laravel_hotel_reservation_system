@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="{{ route('homepage_icon.create') }}" class="btn btn-success btn-md pull-right">
                    <i class="fa fa-plus"></i> Yeni Ekle
                </a>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Anasayfa İkonları
                            <small>({{ count($icons) ?? 0 }})</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>İkon Adı</th>
                                <th>İkon Başlığı</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($icons as $row)
                                <tr>
                                    <td>{{ $row->icon?? '' }} -> <i class="{{ $row->icon ?? '' }}"></i></td>
                                    <td>{{ $row->title ?? '' }}</td>
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('homepage_icon.destroy',$row->id) }}">
                                            <a href="{{ route('homepage_icon.edit',$row->id) }}"
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
