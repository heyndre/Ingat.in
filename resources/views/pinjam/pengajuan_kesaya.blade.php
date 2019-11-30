@extends('base')

@section('page_title')
    Pengajuan barang saya
@endsection

@section('page_head')
    
@endsection

@section('page_content')
    <div class="row">
            <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                      @if(Session::has('alert-' . $msg))
                      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                      @endif
                    @endforeach
                  </div>
        <div class="table-responsive">
                <?php $number=1?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Nama Pengguna</th>
                            <th>Foto Pengguna</th>
                            <th>Persetujuan</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                                <th>Nomor</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Nama Pengguna</th>
                                <th>Foto Pengguna</th>
                                <th>Persetujuan</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (count($data) > 0)
                            @foreach ($data as $value)   
                            <tr>         
                            <th>{{$number++}}</th>
                            <th>{{$value->nama_barang}}</th>
                            <th>{{$value->created_at_pinjaman}}</th>
                            <th>{{$value->name}}</th>
                            <th></th>
                            <th>
                                @if (Auth::user()->id == $value->id_pemilik)
                                <form method="POST" action="{{route('user_peminjaman.update', ['user_peminjaman' => $value->id_peminjaman])}}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="1" name="confirm">
                                    <button type="submit" class="btn btn-primary">Setujui Peminjaman</button>
                                </form>
                                @else
                                    @if ($value->confirmed == 1)
                                        <h6>Disetujui</h6>
                                    @else
                                        <h6>Belum Disetujui</h6>
                                    @endif
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