@extends('base')

@section('page_title')
    Detail Barang Saya
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
           <a href="{{route('user_barang.show', ['user_barang' => $item->id_barang])}}">
                Nama Barang : {{$item->nama_barang}}</a></h6>
                @if (count($item->image) > 0)
                <img src="{{asset('barang/'.$item->image)}}" class="img-thumbnail">
        @else
        <img src="{{asset('barang/404.jpg')}}" class="img-thumbnail">
        @endif
    </div>
       <div class="card-body">
           {{$item->deskripsi}}, <br>
        Kategori : {{$item->nama}}<br>
        <a href="{{route('user_barang.edit', ['user_barang' => $item->id_barang])}}" class="btn btn-primary">Ubah Detail Barang</a>

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
                                {{-- <td>{{$tran->waktu_kembali}}</td> --}}
                                <td>
                                        @if (count($tran->waktu_kembali) > 0)
                                        
                                        {{$tran->waktu_kembali}}
                                          @else
                                          <form method="POST" action="{{route('NotifyEmail', ['NotifyEmail' => $tran->id_peminjaman])}}">
                                            @csrf
                                                <input type="hidden" name="id_peminjam" value="{{$tran->peminjam_id}}">
                                                <button type="submit" class="btn btn-warning">Kirim Email Pengingat</button>
                                              </form>
                                          @endif
                                        </td>
                                        <td>{{$tran->name}}</td>
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