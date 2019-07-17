@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        @include('admin.pages.reservation.common.button')
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th width="10%">Durum</th>
                                <th width="10%">Rezervasyon Numarası</th>
                                <th width="10%">Giriş Tarihi</th>
                                <th width="10%">Çıkış Tarihi</th>
                                <th width="10%">Kişi</th>
                                <th width="10%">Telefon</th>
                                <th width="10%">Email</th>
                                <th width="10%">Toplam Ücret</th>
                                <th width="10%">Rezervasyon Kaydı</th>
                                <th width="10%">İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($rows as $row)
                                <tr>
                                    <td>{{$row->status ?? '' }}</td>
                                    <td>{{$row->order_number ?? '' }}</td>
                                    <td>{{$row->start_date ?? '' }}</td>
                                    <td>{{$row->end_date ?? '' }}</td>
                                    <td>{{ $row->person_name ?? ''}} {{ $row->person_surname ?? ''}}</td>
                                    <td>{{ $row->person_mobile ?? '' }}</td>
                                    <td>{{ $row->person_email ?? '' }}</td>
                                    <td>{{ Helper::custom_money($row->total_amount) ?? ''}} ₺</td>
                                    <td>{{ $row->created_at?? '' }}</td>
                                    <td>
                                        <form id="delete-form-{{$row->id}}" method="post"
                                              action="{{ route('reservation.destroy',$row->id) }}">
                                            <a href="{{ route('reservation.pdf',$row->id) }}"
                                               class="btn btn-primary btn-xs">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>
                                            <a href="{{ route('reservation.show',$row->id) }}"
                                               class="btn btn-success btn-xs"><i class="fa fa-eye" title="Show"></i>
                                            </a>
                                            {{--                                        <a href="{{ route('reservation.edit',$row->id) }}"--}}
                                            {{--                                           class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i>--}}
                                            {{--                                        </a>--}}
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
