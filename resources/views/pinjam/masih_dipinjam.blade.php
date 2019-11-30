@extends('base')

@section('page_title')
    Detail Peminjaman
@endsection

@section('page_head')
    
@endsection

@section('page_content')
<div class="container">
  <div class="row">
    @foreach ($item as $item)
    <!-- Basic Card Example -->
    <div class="card shadow md-5">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">
                Nama Barang : {{$item->nama_barang}}</h6>
                @foreach ($trx as $trx)    
                Peminjam : {{$trx->name}}<br>
                @endforeach
                @if (count($item->image) > 0)
                <img src="{{asset('barang/'.$item->image)}}" class="img-thumbnail">
        @else
        <img src="{{asset('barang/404.jpg')}}" class="img-thumbnail">
        @endif
    </div>
       <div class="card-body">
           {{$item->deskripsi}}, <br>
        Kategori : {{$item->nama}}<br>
        <form method="POST" action="{{route('user_peminjaman.store', ['user_peminjaman' => $item->id_barang])}}">
            @csrf
            <input type="hidden" value="{{$item->pemilik_id}}" name="owner" id="owner">
            <input type="hidden" value="{{Auth::user()->id}}" name="proposer" id="proposer">
            <input type="hidden" value="{{$item->id_barang}}" name="barang" id="barang">
            <input type="submit" class="btn btn-primary" value="Ajukan Peminjaman">
        </form>
        {{-- <a href="{{route('user_peminjaman.store', ['user_peminjaman' => $item->id_barang])}}" class="btn btn-primary">Pinjam Barang</a> --}}
    </div>
    </div>
    @endforeach
    <div class="card shadow md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Log Peminjaman</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <?php $number=1 ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                            <th>Nomor</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Nama Peminjam</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                            <th>Nomor</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Nama Peminjam</th>
                            </tr>
                          </tfoot>
                          <tbody>
                              @if ($usage->count() > 0)
                              @foreach ($usage as $tran)                                  
                              <tr>
                                <td>{{$number++}}</td>
                                <td>{{$tran->created_at}}</td>
                                <td>{{$tran->waktu_kembali}}</td>
                                <td>{{$tran->name}}</td>
                              </tr>
                              @endforeach                                  
                              @else
                              <tr>
                                    <td>---</td>
                                    <td>Tidak ada peminjaman</td>
                                    <td>Tidak ada peminjaman</td>
                                    <td>Tidak ada peminjam</td>
                                  </tr>                                  
                              @endif

        </div>
    </div>
  </div>
  </div>
</div>
  
@endsection