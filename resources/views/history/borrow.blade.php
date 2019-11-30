@extends('base')

@section('page_title')
    Daftar Peminjaman Barang
@endsection

@section('page_head')
    
@endsection

@section('page_content')
    <div class="row">
        <?php $number=1?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Barang</th>
                    <th>Pemilik</th>
                    <th>Peminjam</th>
                    <th>Gambar</th>
                    <th>Kategori</th>
                    <th>Tanggal pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Durasi Pinjam</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                        <th>Nomor</th>
                        <th>Nama Barang</th>
                        <th>Pemilik</th>
                        <th>Peminjam</th>
                        <th>Gambar</th>
                        <th>Kategori</th>
                        <th>Tanggal pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Durasi Pinjam</th>
                </tr>
            </tfoot>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $value)   
                    <tr>         
                    <th>{{$number++}}</th>
                    <th><a href="{{route('user_barang.show', ['user_barang' => $value->id_barang])}}">{{$value->nama_barang}}</a></th>
                    <th>
                        @foreach ($data2 as $item)
                            @if ($item->id === $value->id)
                            {{$item->name}}
                            @endif
                        @endforeach
                    </th>
                    <th>
                        @foreach ($data2 as $item)
                            @if ($item->id === $value->id)
                            {{$item->name}}
                            @endif
                        @endforeach
                    </th>
                    <th>
                    @if ($value->image === 0)
                    <img src="{{asset('barang/'.$value->image)}}" class="img-thumbnail"></th>
                    @else
                    <img src="{{asset('barang/404.jpg')}}" class="img-thumbnail"></th>
                    @endif
                    <th>{{$value->nama}}</th>
                    <th>{{$value->created_at_pinjaman}}</th>
                    <th>{{$value->waktu_kembali}}</th>
                    @php
        $start_time = $value->created_at_pinjaman;
        $start_time_ob = new \Carbon\Carbon($start_time);
        $finish_time = $value->waktu_kembali;
        $finish_time_ob = new \Carbon\Carbon($finish_time);
        $diff =  $finish_time_ob->diffInDays($start_time_ob);
                    @endphp
                    <th>{{$diff}}</th>
                    </tr>
                    @endforeach
                @else
                <th>----</th>
                <th>Tidak ada data</th>
                @endif
            </tbody>
        </table>
    </div>
@endsection