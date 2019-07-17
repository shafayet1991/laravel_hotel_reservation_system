@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="{{ route('user_setting.create') }}" class="btn btn-success btn-md pull-right">
                    <i class="fa fa-plus"></i> Kullanıcı Ekle
                </a>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kullanıcılar
                            <small>({{ count($users) ?? 0 }})</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Fotoğraf</th>
                                <th>Adı Soyadı</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $row)
                                <tr>
                                    <td>
                                        <img src="{{ asset($row->file) }}" width="100">
                                    </td>
                                    <td>{{ $row->name ?? '' }}</td>
                                    <td>{{ $row->email ?? '' }}</td>
                                    <td>{{ $row->phone ?? '' }}</td>
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('user_setting.destroy',$row->id) }}">

{{--                                            @can('edit post')--}}
                                            <a href="{{ route('user_setting.edit',$row->id) }}"
                                               class="btn btn-info btn-xs"><i class="fa fa-edit" title="Edit"></i>
                                            </a>
{{--                                            @endcan--}}

                                            <a href="{{ route('user_setting.password',$row->id) }}"
                                               class="btn btn-warning btn-xs"><i class="fa fa-key" title="Password Change"></i>
                                            </a>

{{--                                            @role('writer')--}}
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
{{--                                            @endrole--}}
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
