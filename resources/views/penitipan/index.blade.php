@extends('layouts.master') 
@section('content')
<section class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card mb-4">
            <div class="card-block">
                <h3 class="card-title">Kontrol Penitipan
                    <a href="{{route('kontrol-penitipan.create')}}" class="btn btn-md btn-default">Kontrol Penitipan</a>
                </h3>
                <div class="table-responsive">
                    @if(session('message')) {!!session('message')!!} @endif
                    <table class="table table-striped table-bordered zero-configuration" id="dataTable">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Waktu</th>
                          <th>Keterlambatan Jemput (Menit)</th>
                          {{-- <th>Action</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <td>{{ucwords($item->getSiswaById->nama)}}</td>
                          <td>{{ $item->waktu }}</td>
                          <td>{{$item->keterlambatan_jemput}}</td>
                          {{-- <td>
                            <a href="{{route('data-guru.edit',$item->id)}}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Lihat"
                              class="editor_view"><i class="fa fa-pencil"></i></a>
                            <a data-href="{{route('data-guru.delete',$item->id)}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm"
                              title="Hapus" class="editor_remove"><i class="fa fa-trash"></i></a>
                          </td> --}}
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Waktu</th>
                            <th>Keterlambatan Jemput (Menit)</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                      </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('assetcss')
<link href="{!!asset('css/dataTables.css')!!}" rel="stylesheet">
@endsection

@section('assetjs')
<script src="{!!asset('js/dataTables.js')!!}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
@endsection