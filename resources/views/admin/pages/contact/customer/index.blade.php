@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="10%">Customer name</th>
                                <th width="10%">topic</th>
                                <th width="10%">Email</th>
                                <th width="10%">IP Address</th>
                                <th width="10%">Browser Information</th>
                                <th width="10%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($rows as $row)
                                <tr>
                                    <td>
                                        {{$row->name ?? '' }}
                                    </td>
                                    <td>
                                        {{$row->subject ?? '' }}
                                    </td>
                                    <td>
                                        {{$row->email ?? '' }}
                                    </td>
                                    <td>
                                        {{ $row->ip_address ?? '' }}
                                    </td>
                                    <td>
                                        {{ $row->user_agent ?? '' }}
                                    </td>
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('contact_customer.destroy',$row->id) }}">
                                            <a href="{{ route('contact_customer.show',$row->id) }}"
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
