@extends('admin.templates.admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @include('admin.pages.blog.common.button')
                <a href="{{ route('blog.create') }}" class="btn btn-success btn-xs pull-right">
                    <i class="fa fa-plus"></i> Ekle
                </a>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Blog Listesi
                            <small>({{ count($rows) ?? 0 }})</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Resim</th>
                                <th>Blog Adı</th>
                                <th>Blog Yazarı</th>
{{--                                <th>Görüntülenme</th>--}}
                                <th>Blog Kategorileri</th>
                                <th>Blog Etiketleri</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($rows as $row)
                                <tr>
                                    <td>
                                        <img src="{{ asset($row->file ?? '') }}" width="100">
                                    </td>
                                    <td>{{ $row->name ?? '' }}</td>
                                    <td>{{ $row->author->name ?? '' }}</td>
{{--                                    <td>{{ $row->hit ?? '' }}</td>--}}
                                    <td>
                                        @forelse($row->categories as $category)
                                            {{ $category->name ?? 0 }},
                                        @empty
                                        @endforelse
                                    </td>
                                    <td>
                                        @forelse($row->tags as $tag)
                                            {{ $tag->name ?? '' }},
                                        @empty
                                        @endforelse
                                    </td>
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('blog.destroy',$row->id) }}">
                                            <a href="{{ route('blog.edit',$row->id) }}"
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
