@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="{{ route('menu.create') }}" class="btn btn-success btn-md pull-right">
                    <i class="fa fa-plus"></i> Add Menu
                </a>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Menüler
                            <small>({{ count($menus) ?? 0 }})</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>URL Configuration</th>
                                <th>Menü Türkçe Adı</th>
                                <th>Menu Turkish Name</th>
{{--                                <th>Menu Location</th>--}}
{{--                                <th>Menu Order</th>--}}
                                <th>Transactions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($menus as $row)
                                <tr>
                                    <td>{{ $row->slug ?? '' }} => <a href="{{ url($row->slug ?? '') }}" target="_blank">Go to Pages</a></td>
                                    <td><a href="{{ url($row->slug ?? '') }}" target="_blank">{{ $row->tr_name ?? '' }}</a></td>
                                    <td>{{ $row->theme ?? '' }}</td>
{{--                                    <td>{{ $row->getTopMenuName($row->top_id) }}</td>--}}
{{--                                    <td>{{ $row->rank ?? '' }}</td>--}}
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('menu.destroy',$row->id) }}">
                                            <a href="{{ route('menu.edit',$row->id) }}"
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
