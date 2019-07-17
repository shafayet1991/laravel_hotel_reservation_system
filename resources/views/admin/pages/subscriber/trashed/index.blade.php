@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        @include('admin.pages.subscriber.common.button')
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="10%">Email</th>
                                <th width="10%">IP Adresi</th>
                                <th width="10%">Tarayıcı Bilgileri</th>
                                <th width="10%">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($rows as $row)
                                <tr>
                                    <td>{{$row->email ?? '' }}</td>
                                    <td>{{ $row->ip_address ?? '' }}</td>
                                    <td>{{ $row->user_agent ?? '' }}</td>
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('subscribe.forceDelete',$row->id) }}">
                                            <a href="{{ route('subscribe.show',$row->id) }}"
                                               class="btn btn-success btn-xs"><i class="fa fa-eye" title="Show"></i>
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
                            <tfoot>
                            </tfoot>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
