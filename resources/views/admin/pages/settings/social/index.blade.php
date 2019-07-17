@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="{{ route('social_media_setting.create') }}" class="btn btn-success btn-md pull-right">
                    <i class="fa fa-plus"></i> Sosyal Medya Hesabı Ekle
                </a>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sosyal Medya Hesapları
                            <small>({{ count($socials) ?? 0 }})</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sosyal Medya Adı</th>
                                <th>Sosyal Medya URL</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($socials as $row)
                                <tr>
                                    <td>{{ $row->name ?? '' }}</td>
                                    <td>{{ $row->url ?? '' }}</td>
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('social_media_setting.destroy',$row->id) }}">
                                            <a href="{{ route('social_media_setting.edit',$row->id) }}"
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
