<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="created by Fasilkom UNEJ 2019">
  <meta name="author" content="Framework A">
 

  <title>{{ config('app.name', 'Laravel') }} - Pengingat Pengembalian Barang</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
            <div class="container">
                    <div class="row">
                      @foreach ($tran as $item)
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
                                                @foreach ($bor as $it)                                  
                                                <tr>
                                                  <td>{{$number++}}</td>
                                                  <td>{{$it->created_at}}</td>
                                                  <td>{{$it->waktu_kembali}}</td>
                                                  <td>{{$it->user->name}}</td>
                                                </tr>
                                                @endforeach                                  
                  
                          </div>
                      </div>
                    </div>
                    </div>
    </div>
</body>
</html>