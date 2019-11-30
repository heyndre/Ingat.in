@extends('base')

@section('page_title')
    Pengajuan barang saya
@endsection

@section('page_head')
    
@endsection

@section('page_content')
    <div class="row">
        <div class="table-responsive">
                <?php $number=1?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Nama Pemilik</th>
                            <th>Status Pengajuan</th>
                            {{-- <th>Persetujuan</th> --}}
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                                <th>Nomor</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Nama Pemilik</th>
                                <th>Status Pengajuan</th>
                                {{-- <th>Persetujuan</th> --}}
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (count($data) > 0)
                            @foreach ($data as $value)   
                            <tr>         
                            <th>{{$number++}}</th>
                            <th> <a href="{{route('user_barang.show', ['user_barang' => $value->id_barang])}}" class="btn btn-primary">{{$value->nama_barang}}</a></th>
                            <th>{{$value->created_at_pinjaman}}</th>
                            <th>{{$value->name}}</th>
                            <th>
                                @if ($value->confirmed == 1)
                            <h6>Disetujui, tanggal {{$value->updated_at}}</h6>
                                @else
                                <h6>Belum Disetujui</h6>
                                @endif
                            </th>
                            </tr>
                            @endforeach
                        @else
                        <th>----</th>
                        <th>Tidak ada pengajuan yang belum disetujui</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        @endif
                    </tbody>
                </table>
        </div>
    </div>
@endsection