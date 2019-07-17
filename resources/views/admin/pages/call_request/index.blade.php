@extends('admin.templates.admin.layout')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        Arama Istekleri
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Ad Soyad</th>
                                <th>Telefon</th>
                                <th>Email</th>
                                <th>Aranacak Zaman</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($call_requests as $row)
                                <tr>
                                    <td>{{ $row->full_name ?? '' }}</td>
                                    <td>{{ $row->phone ?? '' }}</td>
                                    <td>{{ $row->email ?? '' }}</td>
                                    <td>{{ $row->call_time ?? '' }}</td>
                                    <td>{{ $row->created_at ?? '' }}</td>
                                    <td>
                                        Görüntüle | Sil
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
