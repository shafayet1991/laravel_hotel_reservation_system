@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @include('admin.pages.blog.common.button')
                <a href="{{ route('blog_author.create') }}" class="btn btn-success btn-md pull-right">
                    <i class="fa fa-plus"></i>
                    Add Blogger
                </a>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Blog Yazarları
                            <small>({{ count($authors ?? 0) }})</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th> Author Photo </th>
                                <th> Author Name Surname </th>
                                <th> Author Title </th>
                                <th> Author Email </th>
                                <th> Author Phone </th>
                                <Th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($authors as $row)
                                <tr>
                                    <td>
                                        <img src="{{ asset($row->file) }}" width="100">
                                    </td>
                                    <td>{{ $row->name ?? '' }}</td>
                                    <td>{{ $row->title ?? '' }}</td>
                                    <td>{{ $row->email ?? '' }}</td>
                                    <td>{{ $row->phone ?? '' }}</td>
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('blog_author.destroy',$row->id) }}">
                                            <a href="{{ route('blog_author.edit',$row->id) }}"
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
