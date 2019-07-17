@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        <div class="row">
            @isset($success)
                {{$success}}
            @endisset
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="{{ route('tour.create')}}" class="btn btn-success btn-md">
                            <i class="fa fa-plus"></i> Tur Ekle
                        </a>
                        <a href="{{ route('tour_type.index')}}" class="btn btn-info btn-md">
                            <i class="fa fa-table"></i> Tur Tipleri
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="90%">Name</th>
                                <th width="10%">Process</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tours as $row)
                                <tr>
                                    <td>
                                        {{$row->name}}
                                    </td>
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('tour.destroy',$row->id) }}">
                                        <a href="{{ route('tour.edit',$row->id) }}"
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
                            <tfoot>
                            {{ $tours->links() }}
                            </tfoot>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
