@extends('base')

@section('page_title')
    Tambah Barang
@endsection

@section('page_head')
    
@endsection

@section('page_content')
<div class="row">
<form role="form" class="user" action="{{route('user_barang.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                  <div class="form-group">
                    <input type="text" class="form-control " id="namaBarang" name="namaBarang" placeholder="Nama Barang">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control " rows="3" name="deskripsiBarang" id="deskripsiBarang" placeholder="Deskripsi Barang" required></textarea>
                  </div>
                <div class="form-group">
                    <p class="help-block">Masukkan gambar barang</p>
                    <label for="gambar">Gambar Barang</label>
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