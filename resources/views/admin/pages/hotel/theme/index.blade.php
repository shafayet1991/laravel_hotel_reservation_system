@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        @include('admin.pages.hotel.common.button')
                        <a href="{{ route('hotel_theme.create')}}" class="pull-right btn btn-success btn-xs">
                            <i class="fa fa-plus"></i>
                            Add Theme
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Theme Name</th>
                                <th>Short version</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($themes as $row)
                                <tr>
                                    <td>
                                        <img width="100" src="{{ asset($row->file) }}" class="image"> <br>
                                    </td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->slug}}</td>
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('hotel_theme.destroy',$row->id) }}">
                                        <a href="{{ route('hotel_theme.edit',$row->id) }}"
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
