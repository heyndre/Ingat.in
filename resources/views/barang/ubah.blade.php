@extends('base')

@section('page_title')
    Tambah Barang
@endsection

@section('page_head')
    
@endsection

@section('page_content')
<div class="row">
<form role="form" class="user" action="{{route('user_barang.update', ['user_barang' => $item->id_barang])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                  <div class="form-group">
                  <input type="text" class="form-control " id="namaBarang" name="namaBarang" placeholder="Nama Barang" value="{{$item->nama_barang}}">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control " rows="3" name="deskripsiBarang" id="deskripsiBarang" placeholder="Deskripsi Barang" required>{{$item->deskripsi}}</textarea>
                  </div>
                <div class="form-group">
                    <p class="help-block">Masukkan gambar barang</p>
                    <img src="{{asset('barang/'.$item->image)}}" class="img-thumbnail">
                    <label for="gambar">Klik tombol untuk ubah gambar barang</label>
                    <input type="file" name="gambarBarang" id="gambarBarang">
                </div>
                <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategoriBarang" id="kategoriBarang" class="form-control">
                          @foreach ($kat as $key => $kcm)
                          <option value="{{$kcm->id}}">{{$kcm->nama}}</option>
                          @endforeach
                        </select>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-primary">
              </form>
</div>
    
@endsection